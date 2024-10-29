
@props(['course'])

<div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <a href="/courses/{{$course->title}}">
        <img class="rounded-t-lg" src="{{asset("images/desk.jpg")}}" alt="" />
    </a>
    <div class="p-5">
        <a href="/courses/{{$course->title}}">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$course->title}}</h5>
        </a>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$course->description}}</p>

        <div class=" flex justify-between ">
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Lessons  <br>{{$course->lessons_count}}</p>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Duration <br>{{$course->duration}}</p>

        </div>
        <a href="/courses/{{$course->title}}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            معرفة المزيد 
            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
            </svg>
        </a>
    </div>
</div>