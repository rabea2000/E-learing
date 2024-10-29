
@props(['columns_name'])


    <table class="w-full text-sm text-left rtl:text-right text-gray-500 mt-10 ">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
            <tr>
                <th scope="col" class="p-4">
                    <div class="flex items-center">
                        حدد 
                    </div>
                </th>
                @foreach ($columns_name as $column_name)
                <th scope="col" class="px-6 py-3">
                   {{ $column_name}}
                </th>
                @endforeach

            </tr>
        </thead>
        <tbody>

               {{$slot}}
   

        </tbody>
    </table>

