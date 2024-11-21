<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Course;
use App\Models\User;
use Faker\Provider\UserAgent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'video_id' => ['required' , 'exists:videos,id'] ,
            'body' => ['required' , 'min:1' , 'max:2000']

        ]);
        
       comment::create([

        "body" => $request->body ,
        "video_id" => $request->video_id ,
        "user_id" => Auth::user()->id


       ]);
       return redirect()->back() ;
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {


        // Gate::authorize('delete-comment' , $comment) ;
    //    if( request()->user()->cannot("delete-comment" , $comment)){

    //             abort(401);
    //    }
       
        $comment->delete();
        return redirect()->back() ;
    }
}
