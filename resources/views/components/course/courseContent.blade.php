@props(['videos'])
<aside id="default-sidebar" class="fixed top-20 left-0 z-5  w-3/12 h-screen transition-transform -translate-x-full sm:translate-x-0 " aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 ">
       <ul class="space-y-2 font-medium">

            @foreach ($videos as $video)
            <x-course.videocontent :video="$video"/>
                
            @endforeach
         
    
       </ul>
    </div>
 </aside>