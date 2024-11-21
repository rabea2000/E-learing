<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ReplyController extends Controller
{
    
    public function store(Request $request) {


        $request->validate([
            'comment_id' => ['required' , 'exists:comments,id'] ,
            'body' => ['required' , 'min:1' , 'max:2000']

        ]);
       
        Reply::create([
            "body" => $request->body ,
            "comment_id" => $request->comment_id ,
            "user_id"  => Auth::user()->id 
        ]);
        return redirect()->back() ;
    }
    public function destroy(Reply $reply) {
       



        // Gate::authorize('delete-reply' , $reply) ;

        $reply->delete() ; 
        return redirect()->back() ;
        }
   

}
