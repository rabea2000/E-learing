@props(['access_dendied'])
{{-- @php
     dd($access_dendied->user);
@endphp --}}
<tr class="bg-white border-b">
    
    <td class="w-4 p-4">
        <div class="flex items-center">
            <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 ">
            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
        </div>
    </td>
    
    
    <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap ">
        
        <img class="w-10 h-10 rounded-full"  src="{{ asset('storage/'. $access_dendied->user->img_url) }}"  alt="Jese image">
        <a href="/users/{{$access_dendied->user->id}}" class=" hover:underline" >
        <div class="ps-3">
            <div class="text-base font-semibold">
                {{$access_dendied->user->full_name}} 
                
            </div>
            <div class="font-normal text-gray-500">{{$access_dendied->user->email}}</div>
        </div>
    </a>  
    </th>



    <td class="px-6 py-4">
        <div class="flex items-center">

             {{$access_dendied->device_info}}
        </div>
    </td>

    <td class="px-6 py-4">
        {{$access_dendied->created_at}}
    </td>
    

    {{-- <td class="px-6 py-4">
        <a href="/users/{{$access_dendied->user->id}}" class="font-medium text-blue-600 hover:underline"> مزيد  حول الطالب  </a>
    </td> --}}


</tr>