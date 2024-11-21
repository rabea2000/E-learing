<?php

namespace App\Http\Controllers;

use App\Http\Requests\uplodaFileRequest;
use App\Models\File;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminFilesController extends Controller
{

    public function index(Request $request)
    {

        $files =  File::orderBy("classes_id")
            ->search()
            ->get();

        return view('admin.files', ['files' => $files]);
    }



    public function create()
    {

        return view('admin.fileupload');
    }

    public function store(Request $request)
    {

        // Validate the file to ensure it's present and meets requirements

        
        // Store the uploaded file in a public directory
        if ($request->file('fileInput')) {
            $path = $request->file('file')->store('uploads', 'public'); // Save in storage/app/public/uploads
            return response()->json(['message' => 'File uploaded successfully', 'path' => $path], 200);
        }

        return response()->json(['message' => 'File not uploaded'], 400);

        // if ($request->hasFile('fileurl')) {
        // $file = $request->file('fileurl');
        // $filename = $file->getClientOriginalName();
        // $fileurl =  Storage::disk('local')->put('/', $request->file('fileurl'));
        // }


        // File::create([
        //     'name' =>  $request->filename,
        //     'description' => $request->description,
        //     "url" =>  $fileurl,
        //     "classes_id" => $request->class
        // ]);


        // return redirect('/files');
    }
}
