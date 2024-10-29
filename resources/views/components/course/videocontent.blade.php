@props(['video'])
<li>
    <a href="/courses/{{$video->course->title}}/episode/{{ $video->episode}}" class="flex items-center p-2  mr-4 rounded-lg text-white  hover:bg-gray-700 group">

       <span class="ms-3 line-clamp-2">{{$video->title}}</span>
    </a>
 </li>

