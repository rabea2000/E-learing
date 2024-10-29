@props(['device' , 'deny'])

@php
    
    $date = ($device->created_at) ??   "";
    if (isset($deny)){
        $class="bg-red-50 p-4 rounded-lg shadow-sm";
        $text= "text-red-500 font-semibold";
        $state = "حظر الوصول";
    }
  
    
  else{
    $class="bg-green-50 p-4 rounded-lg shadow-sm";
    $text= "text-green-500 font-semibold";
    $state ="السماح بالوصول";

  }
      
  
@endphp

<li class={{$class}}>
    <div class="flex justify-between">
      <span class="font-semibold">{{$device->device}}</span> <!-- Device name -->
      <span class{{$text}}>{{$state}}</span> <!-- Access Status -->
    </div>
    <p class="text-gray-600 text-sm">Last Accessed: <span class="font-semibold">{{$date}}</span></p>
    <p class="text-gray-600 text-sm">الموقع <span class="font-semibold">{{$device->location}}</span></p>
  </li>