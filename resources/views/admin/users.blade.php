@php
    $columns_name = collect(['الأسم' ,  ' الصف' ,' تاريخ التسجيل' , 'Action']) ; 
@endphp

<x-layout>
    <x-dashboard.sidebar/>
    <x-dashboard.mainsection > 

        <form action="/admin/users" method="get">
    
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <div class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-white ">
            
                    
                      
                    <x-dashboard.filter/>
            
            
                    
           
                </div>
                {{-- <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">بحث</button> --}}
                        
                    
                </form>
        
        
                <x-dashboard.table :columns_name="$columns_name" >
                    @foreach ($users as $user)
                             <x-dashboard.users.row :user="$user"/>
                    @endforeach
                </x-dashboard.table>
        
            </div>
            



        <div class=" flex justify-center  mb-96 mt-5  ">
                     {{$users->links()}}      

        </div>


          
          


    </x-dashboard.mainsection>


</x-layout>



















{{-- <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <div class="flex items-center justify-center w-full flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 dark:bg-gray-800 bg-white ">

        <label for="table-search" class="sr-only">Search</label>
         <div >
            
            <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 ">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input type="text" id="table-search-users" class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for users">
        </div>
    </div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">

       <x-table.thead/>
        <tbody>
            <x-table.row name lastname class  statu susername'/>
            <x-table.row/>
            <x-table.row/>
            <x-table.row/>
   
     
        </tbody>
    </table>
</div> --}}


        

        
       
