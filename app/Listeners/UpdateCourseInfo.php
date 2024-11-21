<?php

namespace App\Listeners;

use App\Events\UpdateCourse ;
use App\Models\Course;
use App\Models\video;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateCourseInfo
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UpdateCourse  $event): void
    {
        
        $count = video::where('Course_id' , '=' ,$event->course->id)->count() ; 
        $event->course->lessons_count = $count ; 
        $event->course->save() ; 
    }
}
