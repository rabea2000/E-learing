<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\filesController;
use App\Http\Controllers\PaidUser;
use App\Http\Controllers\PaidUserController;
use App\Http\Controllers\PlateFormeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoController;
use App\Mail\StudenMail;
use App\Models\AccessDenied;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Route;
use Stevebauman\Location\Facades\Location;



Route::get('/',   fn() => view('welcome'));
// Route::get('/about',   fn() => view('welcome'));
// Route::get('/contact', fn() => view('welcome'));

Route::get('/about',   function (Request $request) {
    

    return view('welcome');
});
Route::get('/contact',   function () {
    
    return view('welcome');
})->middleware(['auth' , 'verified']);


// Route::get('/admin',   fn() => view('admin.index'))->middleware('admin');




// Route::get('/admin/users', function () {
//     return view('admin.index');
// })->middleware("admin");

Route::get('/admin/files', function () {
    return view('admin.index');
})->middleware("admin");

Route::get('/admin',PlateFormeController::class)->middleware(["auth" , "admin"]);


Route::get('/admin/users',[UserController::class , 'index'])->middleware(["auth" , "admin"]);



Route::get('/files',        [filesController::class, 'index'])->middleware(["auth" , "admin"]);
Route::get('/files/create', [filesController::class, 'create'])->middleware(["auth" , "admin"]);
Route::post('/files/upload', [filesController::class, 'store'])->middleware(["auth" , "admin"]);
Route::get('/files/{id}',   [filesController::class, 'show']);


Route::get('/courses', [CourseController::class, "index"]);
Route::get('/courses/create', [CourseController::class, "create"]);
Route::post('/courses/upload', [CourseController::class, "store"]);
Route::get('/courses/{title}', [CourseController::class, "show"]);


Route::get('/videos', [VideoController::class, 'index'])->name("video");
Route::post('/videos/upload', [VideoController::class, "store"]);
Route::get('/courses/{title}/episode/{id}', [VideoController::class, "show"])->middleware('auth');
Route::get('/videos/{filename}', [VideoController::class, 'stream'])->name("video.stream");





Route::post('/comment/upload', [CommentController::class, "store"])->middleware('auth');
Route::delete('/comment/{comment}', [CommentController::class, "destroy"])
    ->middleware('auth')
    ->can('delete', 'comment');

Route::post('/reply/upload', [ReplyController::class, "store"])->middleware('auth');
Route::delete('/reply/{reply}', [ReplyController::class, "destroy"])
    ->middleware('auth')
    ->can('delete', 'reply');


Route::get('/users', [UserController::class , 'index'])->middleware(["auth" , "admin"]);
Route::get('/users/{user}', [UserController::class , 'show'])->middleware(["auth" , "admin"]);
Route::post('/users/{id}', [UserController::class , 'alloweDevice'])->middleware(["auth" , "admin"]);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::patch('/profile', function(Request $request){
    //     dd($request) ;
    // })->name('picture.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// $a = AccessDenied::create([

//     'user_id' =>4 ,
//     'device'  => request()->userAgent() ,
//     'location' => "syria" ,
//     "created_at" => Carbon::now()
// ]);

// $a->created_at =  Carbon::now(); 
// $a->save() ;

// dd(AccessDenied::first()  ) ; 
Route::post('/paid_user/{id}' , [PaidUserController::class , 'store'])->middleware(["auth" , "admin"]); 
Route::delete('/paid_user/{id}' , [PaidUserController::class , 'destroy'])->middleware(["auth" , "admin"]) ; 

Route::get('test' , function(){

 Mail::to("abd@gmail")->send(new StudenMail());
 return "Done" ; 
});


require __DIR__.'/auth.php';