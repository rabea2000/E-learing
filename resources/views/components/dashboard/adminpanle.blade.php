@props(['access_denied' , "info"])

    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg ">
       <div class="grid grid-cols-3 grid-rows-2 gap-4 mb-4">

            <x-dashboard.info-card title="المستخدمين" :value="$info->users_count" />
            <x-dashboard.info-card title="حسابات مدفوعة" :value="$info->paid_user_count" />
            <x-dashboard.info-card title=" المستخدمين النشطين حالياً" :value="$info->online_user_count" />
            <x-dashboard.info-card title="الكورسات" :value="$info->course_count "/>
            <x-dashboard.info-card title="الفيديوهات" :value="$info->video_count" />
               <div class="relative flex flex-col justify-center h-24 rounded bg-white shadow-2xl w-full p-4" x-data="{ open: false }">
                  <!-- Title and Access Count -->
                  <p class=" text-sm text-black text-center font-black sm:text-xl">
                     <span class="block font-bold text-center text-sm sm:text-xl">
                        {{$info->access_denied_count}}
                    </span>
                     محاولات الدخول المحظورة
              
                  </p>
              
                  <!-- Filter Button -->
                  <div>
                      <span class="block text-left text-gray-600 text-xs font-bold cursor-pointer" @click="open = !open" >
                        <svg class=" inline w-4 h-4 " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                       </svg> 
                        
                        @if(request('days') == 1)
                           اليوم
                          @elseif(request('days') == 3)
                          منذ ثلاث إيام
                          @elseif(request('days') ==7)
                          منذ اسبوع
                          @elseif(request('days') == 30)
                          منذ شهر 
                          @else
                              @if (request('days')!= null)
                                  أيام {{request('days')}}  منذ
                              @else
                                    اليوم           
                              @endif
                    
                          @endif
                          <!-- Downward Arrow SVG -->
                 
                      </span>
              
                      <!-- Filter Links (Initially Hidden) -->
                      <div class="absolute left-0 mt-2 z-10 w-36 bg-white shadow-lg rounded-lg" x-show="open" @click.away="open = false" x-transition>
                          <a href="{{ url('/admin?days=1') }}" class="block bg-white text-black px-4 py-2 rounded-t-lg hover:bg-gray-200 text-xs sm:text-sm">
                          اليوم
                          </a>
                          <a href="{{ url('/admin?days=3') }}" class="block bg-white text-black px-4 py-2 hover:bg-gray-200 text-xs sm:text-sm">
                                منذ ثلاث إيام
                          </a>
                          <a href="{{ url('/admin?days=7') }}" class="block bg-white text-black px-4 py-2 hover:bg-gray-200 text-xs sm:text-sm">
                              منذ أسبوع
                          </a>
                          <a href="{{ url('/admin?days=30') }}" class="block bg-white text-black px-4 py-2 rounded-b-lg hover:bg-gray-200 text-xs sm:text-sm">
                              منذ شهر 
                          </a>
                      </div>
                  </div>
              </div>
              
          
              
      

            </div>
              
              
  


       <div class="flex items-center justify-center h-24 rounded bg-gray-200">
         <p class="text-2xl text-black ">
                     محاولات الدخول المحظورة  
         </p>
      </div>

       <div class="mb-4 rounded bg-white  ">
         @php
              $columns_name = collect(['المستخدم' , 'الجهاز' , 'التاريخ' ])
         @endphp
         <x-dashboard.table :columns_name="$columns_name" >
          
         @foreach ($access_denied  as $access )
                <x-dashboard.users.access-denied-row   :access_dendied="$access" />
         @endforeach
         
         
               
            
        </x-dashboard.table>
 
       </div>


   

       {{-- <div class="flex items-center justify-center h-48 mb-4 rounded bg-gray-50 dark:bg-gray-800">
          <p class="text-2xl text-gray-400 dark:text-gray-500">
             <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
             </svg>
          </p>
       </div> --}}
       {{-- <div class="grid grid-cols-2 gap-4">
          <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
             <p class="text-2xl text-gray-400 dark:text-gray-500">
                <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                   <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                </svg>
             </p>
          </div>
          <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
             <p class="text-2xl text-gray-400 dark:text-gray-500">
                <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                   <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                </svg>
             </p>
          </div>
          <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
             <p class="text-2xl text-gray-400 dark:text-gray-500">
                <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                   <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                </svg>
             </p>
          </div>
          <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
             <p class="text-2xl text-gray-400 dark:text-gray-500">
                <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                   <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                </svg>
             </p>
          </div>
       </div> --}}
    </div>


