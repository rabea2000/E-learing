
@props(['col_names'])

    <thead class="text-xs w-full text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            @foreach ($col_names as $col_name)
            <th scope="col" class="px-6 py-3">
                {{$col_name}}
                
            </th>
                
            @endforeach



        </tr>


    
    </thead>
