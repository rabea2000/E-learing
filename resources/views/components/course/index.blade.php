<x-layout>
<x-nav/>
<div class=" grid grid-cols-2 gap-y-7">
    @foreach ($courses as $course)
            <x-course.coursecarde :course="$course" />
        
    @endforeach
    
</div>
</x-layout>