<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\AdminFilesController;
use App\Http\Controllers\FilesController;
use App\Http\Controllers\PaidUser;
use App\Http\Controllers\PaidUserController;
use App\Http\Controllers\PlateFormeController;

use App\Http\Controllers\ReplyController;
use App\Http\Controllers\TwoFactorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoController;
use App\Http\Middleware\TwoFactorMiddleware;
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
Route::get('/about',   fn() =>view('welcome') ) ;

Route::get('/contact',   function () {
    return view('welcome');
});


Route::middleware(['auth' ,'verified' , 'twofactor'])->group(function () {

    Route::get('verify/resend', [TwoFactorController::class, 'resend'])->name('verify.resend');
    Route::resource('verify', TwoFactorController::class)->only(['index', 'store']);

    Route::get('/videos', [VideoController::class, 'index'])->name("video");
    Route::get('/videos/{filename}', [VideoController::class, 'stream'])->name("video.stream");
    Route::get('/courses/{title}/episode/{id}', [VideoController::class, "show"]);

    Route::get('/courses', [CourseController::class, "index"]);
    Route::get('/courses/{title}', [CourseController::class, "show"]);


    Route::post('/comment', [CommentController::class, "store"]);
    Route::delete('/comment/{comment}', [CommentController::class, "destroy"])
        ->can('delete', 'comment');

    Route::post('/reply', [ReplyController::class, "store"]);
    Route::delete('/reply/{reply}', [ReplyController::class, "destroy"])
        ->can('delete', 'reply');




    Route::get('/files',        [FilesController::class, 'index']);
    Route::get('/files/{id}',   [FilesController::class, 'show']);
});

Route::middleware(['auth', 'admin' , 'twofactor'])->group(function () {

    Route::get('/admin/files', fn() =>   view('admin.index'));

    Route::get('/admin', PlateFormeController::class);

    Route::get('/admin/users', [UserController::class, 'index']);


    Route::get('admin/files',        [FilesController::class, 'edit']);
    Route::put('admin/files/{id}',        [FilesController::class, 'update']);
    Route::get('admin/files/create', [FilesController::class, 'create']);
    Route::post('admin/files', [FilesController::class, 'store']);
    Route::delete('admin/files/{id}', [FilesController::class, 'destroy']);


    Route::get('admin/courses/create', [CourseController::class, "create"]);
    Route::post('admin/courses', [CourseController::class, "store"]);
    Route::get('admin/courses/{id}/edit', [CourseController::class, "edit"]);
    Route::put('admin/courses/{id}', [CourseController::class, "update"]);
    Route::delete('admin/courses/{id}', [CourseController::class, "destroy"]);




    Route::post('admin/videos', [VideoController::class, "store"]);
    Route::put('admin/videos/{id}', [VideoController::class, "update"]);
    Route::delete('admin/videos/{id}', [VideoController::class, "destroy"]);

    Route::get('admin/users', [UserController::class, 'index']);
    Route::get('admin/users/{user}', [UserController::class, 'show']);
    Route::post('admin/users/{id}', [UserController::class, 'alloweDevice']);




    Route::post('admin/paid_user/{id}', [PaidUserController::class, 'store']);
    Route::delete('admin/paid_user/{id}', [PaidUserController::class, 'destroy']);
});


Route::get('test', function () {

    Mail::to("abd@gmail")->send(new StudenMail());
    return "Done";
});


require __DIR__ . '/auth.php';
