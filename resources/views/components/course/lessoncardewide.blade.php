

@props(['video' ,  "course_title"])
<a href="/courses/{{$course_title}}/episode/{{$video->episode}}" >
    <div class="w-full flex  bg-white border border-gray-200 rounded-lg shadow mt-5 p-4 hover:bg-gray-300 transition-colors duration-500 ">
        <div class=" flex justify-center items-center ml-2  ">
            <div class=" w-12 h-12 inline-flex justify-center items-center text-white rounded-full  bg-gray-600 ">{{$video->episode}}</div>
        </div>
            
        <div class="p-2  rounded-lg  md:p-8 " >

            <h2 class="mb-2 text-2xl font-extrabold tracking-tight text-gray-900  max-md:text-lg  ">{{$video->title}}</h2>
            <p class=" text-gray-500 line-clamp-2 ">{{$video->description}}</p>

        </div>

        
    </div>

</a>

