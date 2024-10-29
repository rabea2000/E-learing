
<x-layout>
    <x-nav/>
    <div class="max-w-screen-lg mx-auto mt-3 max-lg:mx-6  ">
 <x-course.coursecardewide :course="$course"/>
       @foreach ($course->video as $video)
              <x-course.lessoncardewide :video="$video" course_title="{{$course->title}}" /> 
       
       @endforeach




       </div>



</x-layout>






