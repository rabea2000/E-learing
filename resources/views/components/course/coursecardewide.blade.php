@props(['course'])
<div class="w-full bg-white border border-gray-200 rounded-lg shadow">

    
        <div class="p-4 bg-white rounded-lg md:p-8 " id="about" role="tabpanel" aria-labelledby="about-tab">
            <h2 class="my-10 text-3xl font-extrabold tracking-tight text-gray-900 ">{{$course->title}}</h2>
            <p class="mb-2 text-gray-500 "> {{$course->description}}</p>
            {{-- <div class=" flex justify-center items-center  "> --}}
                
                <p class=" font-extrabold text-gray-700 mx-10 " dir="ltr">Lessons: {{$course->lessons_count}}</p>
                <p class=" font-extrabold text-gray-700 mx-10" dir="ltr">Duration  :  {{$course->duration}}</p>
    
            {{-- </div> --}}
        </div>
    

    
</div>

