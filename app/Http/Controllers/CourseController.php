<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class CourseController extends Controller
{
    /**
     * Display a listing f the resource.
     */
    public function index()
    {
        $courses = Course::all();
        return view("components.course.index" , ["courses" => $courses]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $courses = Course::all(); 
        return view("admin.coursecreate", ["courses" =>$courses]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     "title"  => ["required" ,"max:50"],
        //     "description" => ["required" ],
        //     "classes_id" => ["required" ]
            
        // ]);
        Course::create([

            "title"  => $request->title,
            "description" => $request->description,
            "classes_id" =>  $request->class,

        ]);

        return redirect('/courses/upload');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $title)
    {
        //  dd(Course::find($id)) ;
        $course = Course::with(["video" =>function( $query){
            $query->orderBy("episode" , 'asc'); 
        }])
        ->where("title" , $title)
        ->firstOrFail() ;
        
        return view("components.course.showcourse" ,
         ['course' =>  $course ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
