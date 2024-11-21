<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;

class FilesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $search = $request->input("search");
        $filequery = File::query();


        $files = $filequery
            ->where("classes_id", '=', Auth::user()->classes_id)
            ->search()
            ->get();

        return view("files-show", ['files' =>   $files]);
    }


    public function show($id)
    {


        $files =  File::find($id);

        $file_path = storage_path("app/" . $files->url);


        return response()->file($file_path);
    }



    public function edit(Request $request)
    {

        $files =  File::orderBy("classes_id")
            ->search()
            ->get();

        return view('admin.files', ['files' => $files]);
    }



    public function update(string $id , Request $request) {

        $file  = File::find($id) ;
        
       $formKey = 'edit_file_' . $file->id . '_form';
      
        $request->validate([

            "$formKey.name" => 'required|string|min:5|max:255',
            "$formKey.description" => 'string|max:1000',
            "$formKey.class" => ["required", 'integer',   'in:10,11,12']
        ]);


            
        $file->name= $request->input("$formKey.name") ; 
        if ($request->has("$formKey.description")) {
            $file->description = $request->input("$formKey.description");
        }
      
        $file->classes_id = $request->input("$formKey.class") ;
        $file->save() ; 

        return redirect()->back() ;




    }



    public function create()
    {

        return view('admin.fileupload');
    }

    public function store(Request $request)
    {
        $request->validate([

            'title' => 'required|string|min:5|max:255',
            'description' => 'string|max:1000',
            'fileurl' => 'required|file|mimes:pdf,ppt,pptx,doc,docx|max:20240' , // 20MB limit
            "class" => ["required", 'integer',   'in:10,11,12']
        ]);

        if ($request->hasFile('fileurl')) {
            $file = $request->file('fileurl');
            $filename = $file->getClientOriginalName();
            $fileurl =  Storage::disk('local')->put('/files', $file);
        }
        if (!isset($fileurl)) {

            return redirect()->back()->with("status", ["error" => "the file was not uploade "]);
        }


        File::create([
            'name' =>  $request->title,
            'description' => $request->description,
            "url" =>  $fileurl,
            "classes_id" => $request->class
        ]);


        return redirect()->back()->with("status", ["success" => "the file was uploaded successfully "]);
    }


    public function destroy(string $id){
        
            $file  = File::find($id) ;
            $deleted =  Storage::disk('local')->delete( $file->url) ; 

            if ($deleted) {
                    File::destroy($id) ;
                    return redirect()->back()->with("status", ["success" =>  "the file was deleted successfully "]);
            }

            return redirect()->back()->with("status", ["error" => "the file was not deleted "]);
            
        

    }
}
