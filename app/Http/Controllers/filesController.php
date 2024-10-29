<?php

namespace App\Http\Controllers;

use App\Http\Requests\uplodaFileRequest;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class filesController extends Controller
{

    public function index()
    {
     
        
        $files =  File::orderBy("classes_id")->get();
      
        // dd($files) ; 
        // $collect = collect()
        
        return view('admin.files', ['files'=>$files]);
    }

    public function show($id)
    {
 
       
        $files =  File::find($id);
        
        $file_path = storage_path("app"."/". $files->url);
      

        return response()->file($file_path);
    }

    public function create()
    {
        
        return view('admin.fileupload');
    }

    public function store(uplodaFileRequest $request)
    {

        if ($request->hasFile('fileurl')) {
            $file = $request->file('fileurl');
            // $filename = $file->getClientOriginalName();
            $fileurl =  Storage::disk('local')->put('/', $request->file('fileurl'));
        }



        File::create([
            'name' =>  $request->filename,
            'description' => $request->description,
            "url" =>  $fileurl,
            "classes_id" => $request->class
        ]);

        return redirect('/files');
    }
}
