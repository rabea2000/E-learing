<x-layout>
    <x-nav/>
    <div class=" mx-auto mt-4  lg:mx-10  shadow items-center  rounded-lg bg-white py-4 ">
            <h1 class="  text-center  text-2xl "> ملفات </h1>
            <div class=" flex items-center justify-center my-8 ">
            <div class="  mx-auto   ">
                <div class="relative ">
                   <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                      <svg class="w-4 h-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                         <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                      </svg>
                   </div>
                   <form action="/files" method="get">
                           <input type="text" name="search" id="table-search-users" class="block  p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-96 h-14 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 " placeholder="أبحث">
                    </form>
                </div>
          
           </div>
        </div>
         @if (request()->input("search"))
                <h1 class="  text-center  text-xl "> نتائج البحث عن   <span class=" text-lg">" {{request()->input("search")}} " </span></h1>
         @endif
        
    </div>

    @if ($files->count() == 0 )
         <div class=" w-full  h-10 my-10  text-center lg:mx-10 lg:w-full rounded-lg bg-white p-8 ">

                     <p> لايوجد ملفات بعد </p>
           
        </div>

    @else
        <div class="my-10 flex items-center">
            <div class=" grid grid-cols-1 gap-4 mx-auto md:grid-cols-2 lg:grid-cols-3  ">

                    
            
                    @foreach ( $files as $file)
                        <x-file.file-card :file="$file"/>
                        <x-file.file-card :file="$file"/>
                        <x-file.file-card :file="$file"/>
                        <x-file.file-card :file="$file"/>
                        
                    @endforeach

    

        </div>
    </div>
 @endif  


</x-layout>