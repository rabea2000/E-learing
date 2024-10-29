@props(["lesson"]) 
<div class="bg-gray-200    grid-rows-2 w-full rounded-lg mt-6  ">
  <div class="  h-3  rounded-lg p-3  mb-3 text-base font-medium ">{{$lesson->name}}</div>
  <div class=" grid rounded-lg  mx-2 grid-cols-3 max-sm:grid-cols-1  ">
    <x-course.captionfield value="30:23" >المدة</x-course.captionfield>
    <x-course.captionfield value="{{date('Y-m-d' , $lesson->create_at) }}" >تاريخ</x-course.captionfield>
    <x-course.captionfield value="100k" >المشاهدات</x-course.captionfield>


  </div>

  <div class="  h-10  rounded-lg  ">
    {{-- {{$lesson->links()}} --}}
    <x-course.paginationbutton :lesson="$lesson" />

  </div>
</div>