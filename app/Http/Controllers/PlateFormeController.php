<?php

namespace App\Http\Controllers;

use App\file\Visitor;
use App\Models\AccessDenied;
use App\Models\Course;
use App\Models\User;
use App\Models\video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Schema;
use Karmendra\LaravelAgentDetector\AgentDetector;
use Nette\Utils\Strings;
use PhpParser\Node\Expr\AssignOp\Concat;

class PlateFormeController extends Controller
{

    /**
     * this controller get 
     * the number paid student 
     * the number of  online user 
     * the number of access denied 
     * the number all register user 
     * the number course 
     * the number of video 
        
     *@return view
     */



    public function __invoke(Request $request)
    {
        $days = 1;

        if ($request->has('days')) {
            $days = $request->query("days");
        }


        $paid_user_count = DB::table("paid_users")
            ->count();

        $users_count = User::count();
        $online_user_count = Visitor::getOnlineUser()->count();
   

   
        $course_count = Course::count();

        $video_count = video::count();


        $access_denied = AccessDenied::with("user")->get() ; 
        $access_denied_count = AccessDenied::count();
        



        $data = collect([
            "users_count" => $users_count,
            "paid_user_count" => $paid_user_count,
            "online_user_count" => $online_user_count,
            "course_count" => $course_count,
            "video_count" => $video_count,
            "access_denied_count" => $access_denied_count,
        ]);

        $info = json_decode(json_encode($data));

        return view('admin.index', [
            "info" => $info ,
            "access_denied" => $access_denied
        
        ]);
    }





    
}
