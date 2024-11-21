<x-layout>
    <x-dashboard.sidebar />
    <x-dashboard.mainsection>
        <div class=" mt-14">


            <div class="  mx-4  lg:mx-6  ">
                <x-course.course-card-edit :course="$course" />
                @foreach ($course->video as $video)
                <x-course.video-card-edit :video="$video" course_title="{{$course->title}}" />

                @endforeach




            </div>



            <x-breakline />



        </div>
    </x-dashboard.mainsection>




</x-layout>