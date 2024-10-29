{{-- @props(['course'])
<div class="flex items-center justify-center rounded-lg bg-white shadow-2xl h-40 w-40 p-4 hover:cursor-pointer relative group transform transition-transform duration-200 hover:scale-105">
    <div >
        <img class="rounded-t-lg" src="{{asset("images/desk.jpg")}}" alt="" />
    </div>
    <div>
        <h5 class="mb-2  font-bold tracking-tight text-gray-900 ">{{$course->title}}</h5>
    </div>
    <div>
        <div class=" flex justify-between ">
            <p class="mb-3 font-normal text-gray-700 ">Lessons  <br>{{$course->lessons_count}}</p>
            <p class="mb-3 font-normal text-gray-700 ">Duration <br>{{$course->duration}}</p>

        </div>
    </div>

</div> --}}

@props(['course'])

<div class=" h-60 w-60 bg-white border shadow-2xl border-gray-200 rounded-lg hover:cursor-pointer relative group transform transition-transform duration-200 hover:scale-105 ">
    <div>
        <a href="/courses/{{$course->title}}">
            <img class="rounded-t-lg h-28  w-full " src="{{asset("images/desk.jpg")}}" alt="" />
        </a>
    </div>
    <div class="  text-right   p-2">
        <a href="/courses/{{$course->title}}">
            <p class="  font-bold text-sm tracking-tight text-gray-900 line-clamp-3 " dir="rtl">{{$course->title}}</p>
        </a>
       
    </div>

        <div class=" flex justify-around w-full  absolute bottom-0 p-2 ">
            <p class=" text-xs text-gray-700 ">Lessons  : <span class=" font-bold">{{$course->lessons_count}}</span></p>
            <p class="  text-xs text-gray-700 ">Duration : <span class=" font-bold">{{$course->duration}}</span></p>

        </div>

   
</div>