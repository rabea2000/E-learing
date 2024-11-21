<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;

class CourseController extends Controller
{
    /**
     * Display a listing f the resource.
     */
    public function index()
    {
        $courses = Course::all();
        return view("components.course.index", ["courses" => $courses]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $courses = Course::all();
        return view("admin.coursecreate", ["courses" => $courses]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $request->validate([
            "title"  => ['required', 'unique:courses,title', 'string', 'min:5', 'max:100'],
            "description" => ['required', 'string', 'min:15', 'max:1000'],
            "class" => ["required", 'integer',   'in:10,11,12']

        ]);


        Course::create([
            "title"  => $request->title,
            "description" => $request->description,
            "classes_id" =>  $request->class,

        ]);

        return redirect('admin/courses/create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $title)
    {
        //  dd(Course::find($id)) ;
        $course = Course::with(["video" => function ($query) {
            $query->orderBy("episode", 'asc');
        }])
            ->where("title", $title)
            ->firstOrFail();

        return view(
            "components.course.showcourse",
            ['course' =>  $course]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $course = Course::with(["video" => function ($query) {
            $query->orderBy("episode", 'asc');
        }])
            ->where("id", "=", $id)
            ->firstOrFail();
        return view("admin.course-show", ["course" => $course]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $course = Course::findOrFail($id);
        
      
        $request->validate([
            "edit_course_form.title"  => ['required', 'string', 'min:5', 'max:100' , Rule::unique('courses' ,'title')->ignore($id) ],
            "edit_course_form.description" => ['required', 'string', 'min:15', 'max:1000'],
            "edit_course_form.class" => ["required", 'integer',   'in:10,11,12']

        ]);
    
     

        $course->title  = $request->edit_course_form["title"];
        $course->description = $request->edit_course_form["description"];
        $course->classes_id =  $request->edit_course_form['class'];
        $course->save() ;

        return redirect('admin/courses/'.$id.'/edit');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       
        Course::destroy($id);
        return redirect('/admin/courses/create');
    }
}
