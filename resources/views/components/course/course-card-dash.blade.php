
@props(['course'])

<div class=" relative h-60 w-60 bg-white border shadow-2xl border-gray-200 rounded-lg hover:cursor-pointer  transform transition-transform duration-200 hover:scale-105 ">
    <div>
        
            <img class="rounded-t-lg h-28  w-full " src="{{asset("images/desk.jpg")}}" alt="" />
       
    </div>
    <div class="  text-right   p-2">
       
            <p class="  font-bold text-sm tracking-tight text-gray-900 line-clamp-3 " dir="rtl">{{$course->title}}</p>
      
       
    </div>

        <div class=" flex justify-around w-full  absolute bottom-0 p-2 ">
            <p class=" text-xs text-gray-700 ">Lessons  : <span class=" font-bold">{{$course->lessons_count}}</span></p>
            <p class="  text-xs text-gray-700 ">Duration : <span class=" font-bold">{{$course->duration}}</span></p>

        </div>

        <a href="/admin/courses/{{$course->id}}/edit">
            <div class="absolute top-1 left-1 group"> 
                <svg class="  hover:text-black hover:scale-105   " fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
               <span class=" hidden text-xs group-hover:block " >تعديل  </span> 
            </div>
        </a>
   
</div>

