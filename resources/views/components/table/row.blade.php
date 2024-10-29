@props(['rows_data'])

<tr class="bg-white border-b  dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

    @foreach ($rows_data as $row_data)
    <td class="px-6 py-4 w-full">
        {{$row_data}}
    </td>

        
    @endforeach

</tr>


{{-- bg-red-500 --}}
{{-- bg-green-500 --}}