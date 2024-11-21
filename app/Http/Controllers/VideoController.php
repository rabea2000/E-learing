<?php

namespace App\Http\Controllers;

use App\Events\UpdateCourse;

use App\file\FileAnalyze;
use App\Http\Requests\VideoRequest;
use App\Models\comment;
use App\Models\Course;
use App\Models\video;
use Illuminate\Contracts\Pagination\Paginator as PaginationPaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Events\EventServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Validation\ValidationException;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $course_id = Course::first()->id;
        $query =  $request->query();
        if (isset($query['course'])) {
            $course = Course::find($query['course']);
            if (isset($course)) {
                $course_id = Course::find($query['course'])->id;
            }
        }

        $videos =  video::where("course_id", "=", $course_id)
            ->orderBy("episode")
            ->get();


        return $videos;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VideoRequest $request)
     {  
          $validatedData = $request->validate([
        'add_video_form.course_id' => 'required|exists:courses,id',  // Must be a valid course ID in the 'courses' table
        'add_video_form.title' => 'required|string|min:5|max:255',
        'add_video_form.description' => 'required|string|min:15|max:1000',  // Optional description
        'add_video_form.episode' => 'required|integer|min:1',         // Episode must be a positive integer
        'add_video_form.url' => 'required|file|mimes:mp4,avi,mkv',  // File upload, max 20MB, only specific formats
    ]);
        
        $episodeexist = video::where('Course_id' , '=' ,$request->add_video_form["course_id"] )
        ->where("episode" ,"=" ,$request->add_video_form["episode"] )  
        ->get(); 

        if ($episodeexist->count() > 0 ) {

          
            throw ValidationException::withMessages([
                'add_video_form.episode' => 'the number of episode is exist'
            ]);
        }

        if ($request->hasFile("add_video_form.url")) {
            $file = $request->file("add_video_form.url");

            $filename = $file->getClientOriginalName();

            $fileurl =  Storage::disk('local')->put('/videos', $file);
        }

       $video = video::create([
            "title" =>     $request->add_video_form["title"],
            'description' =>  $request->add_video_form["description"],
            'url' =>      $fileurl,
            "episode" => $request->add_video_form["episode"],
            "Course_id"  =>  $request->add_video_form["course_id"],
        ]);


        event(new UpdateCourse(Course::find($request->add_video_form["course_id"]))) ;

        return redirect('/admin/courses/'.$request->add_video_form["course_id"].'/edit');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $title, int $id)
    {

        $course = Course::where("title" ,$title)->firstOrFail() ; 
    
        $video = video::with(
            [
                "comment" => ['reply.user:id,first_name,last_name,img_url', 'user:id,first_name,last_name,img_url'],
                "course"
            ]
        )   
          
            ->where("course_id" ,'=' ,$course->id)
            ->where("episode", "=", $id)
            ->firstOrFail();


        // return $video->toArray(); 
        $videos        = video::where("course_id" ,'=' ,$course->id)->orderBy("episode")->get();
        $nextvideo     = video::where("course_id" ,'=' ,$course->id)->where("episode", ">", $id)->orderBy("episode", 'asc')->first('episode');
        $privousevideo = video::where("course_id" ,'=' ,$course->id)->where("episode", "<", $id)->orderBy("episode", 'desc')->first('episode');

        $video->setAttribute("next", $nextvideo);
        $video->setAttribute("privouse", $privousevideo);


        $signedUrl = URL::temporarySignedRoute(
            'video.stream',
            now()->addSeconds(10),
            ['filename' => basename($video->url)]
        );
        



        return view("components.course.lesson", [
            'lesson'        => $video,
            'signe_url'     => $signedUrl,
            'videos' => $videos
        ]);
    }


    public function  stream($filename, Request $request)
    {
        if (!$request->hasValidSignature()) {

            abort(403);
        }

        $filePath = storage_path('app/' . $filename);

        if (!file_exists($filePath)) {
            abort(404);
        }

        // Return the file as a response (with streaming headers)
        return response()->file($filePath, [
            'Content-Type' => 'video/mp4',
        ]);
    }



 
    public function update(string $id, Request $request)
    {
        $video = Video::findOrFail($id);
         
        // Build dynamic field names based on video ID
        $formKey = 'edit_video_' . $video->id . '_form';
    
        // Define the validation rules using dynamic field names
        $validatedData = $request->validate([
            "$formKey.title" => 'required|string|min:5|max:255',
            "$formKey.description" => 'required|string|min:8|max:1000',  // Optional description
            "$formKey.episode" => 'required|integer|min:1',               // Episode must be a positive integer
        ]);
       
       
        // Check if the episode number already exists for the same course but different video
        $episodeExist = Video::where('course_id', $video->course_id)
            ->where('episode', $request->input("$formKey.episode"))
            ->where('id', '!=', $video->id)
            ->exists();
    
        if ($episodeExist) {
            throw ValidationException::withMessages([
                "$formKey.episode" => 'The episode number already exists.',
            ]);
        }
        
    
        // Update the video with the dynamically accessed data
        $video->title = $request->input("$formKey.title");
        $video->description = $request->input("$formKey.description");
        $video->episode = $request->input("$formKey.episode");
        $video->save();
    
        return redirect('/admin/courses/' . $video->course_id . '/edit');
    }



    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $video = video::find($id) ; 
       $course_id = $video->course_id  ; 
      
       Storage::disk('local')->delete( $video->url) ;
        video::destroy($id) ;
        event(new UpdateCourse(Course::find( $course_id))) ;
        return redirect()->back() ; 

    }
}



