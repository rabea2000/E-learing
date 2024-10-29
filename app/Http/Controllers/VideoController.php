<?php

namespace App\Http\Controllers;

use App\file\FileAnalyze;
use App\Http\Requests\VideoRequest;
use App\Models\comment;
use App\Models\Course;
use App\Models\video;
use Illuminate\Contracts\Pagination\Paginator as PaginationPaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

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


        if ($request->hasFile("lessonurl")) {
            $file = $request->file("lessonurl");

            $filename = $file->getClientOriginalName();

            $fileurl =  Storage::disk('local')->put('/videos', $file);
        }

        video::create([
            "title" =>    $filename,
            'description' =>  $request->description,
            'url' =>      $fileurl,
            "episode" => $request->episode,
            "Course_id"  =>  $request->course_id,
        ]);

        return redirect('/courses/upload');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $title, int $id)
    {
        // $video = video::with(
        //     ["comment" => function($query){

        //         $query->paginate(2);
        //     } , 
        //     "comment.user" , 
        //     "course" ])
        //     ->where("episode", "=", $id)
        //     ->firstOrFail();
        //     return  $video->toArray() ;
        $video = video::with(
            [
                "comment" => ['reply.user:id,first_name,last_name,img_url', 'user:id,first_name,last_name,img_url'],
                "course"
            ]
        )
            ->where("episode", "=", $id)
            ->firstOrFail();


        // return $video->toArray(); 
        $videos = video::with('course')->orderBy("episode")->get();
        $nextvideo    = video::where("episode", ">", $id)->orderBy("episode", 'asc')->first('episode');
        $privousevideo = video::where("episode", "<", $id)->orderBy("episode", 'desc')->first('episode');

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

        $filePath = storage_path('app/videos/' . $filename);

        if (!file_exists($filePath)) {
            abort(404);
        }

        // Return the file as a response (with streaming headers)
        return response()->file($filePath, [
            'Content-Type' => 'video/mp4',
        ]);
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

