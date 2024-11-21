@props(['user'])
@php
    
    $name =  $user->first_name .' ' . $user->last_name ; 


    $date = isset($user->created_at) ? $user->created_at->format('h-m-s Y-m-d ') : "";
 
     
@endphp


<tr class="bg-white border-b ">
    
    <td class="w-4 p-4">
        <div class="flex items-center">
            <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 ">
            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
        </div>
    </td>
    <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap ">
        <img class="w-10 h-10 rounded-full"  src="{{ asset('storage/'. $user->img_url) }}"  alt="Jese image">
        <div class="ps-3">
            <div class="text-base font-semibold">{{$user->full_name}}</div>
            <div class="font-normal text-gray-500">{{$user->email}}</div>
        </div>  
    </th>
    <td class="px-6 py-4">
        {{$user->classes_id}}
    </td>
    <td class="px-6 py-4">
        <div class="flex items-center">
            @if (  isset( $user->is_online ))
                    <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div>
            @else
                     <div class="h-2.5 w-2.5 rounded-full bg-red-500 me-2"></div>
            @endif
             {{$date}}
        </div>
    </td>
    <td class="px-6 py-4">
        <a href="/admin/users/{{$user->id}}" class="font-medium text-blue-600 hover:underline"> More.. </a>
    </td>


</tr>