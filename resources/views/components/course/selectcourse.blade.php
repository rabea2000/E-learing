

@props(['courses' ,'label' , 'name'])
<label for={{$name}} class="block text-sm font-medium text-gray-900 ">{{$label}}</label>
<select name={{$name}} class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">

  @foreach($courses as $course)
       <option value="{{$course->id}}">{{$course->title}}</option>
  @endforeach
  

  
</select>



