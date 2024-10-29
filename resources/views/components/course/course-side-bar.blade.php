  @props(["videos"])
  <div class=" sticky top-0 z-10 border-b-2 border-gray-300">
    <nav class= "  bg-white text-white h-16 shadow-gray-600 flex items-center justify-between w-full mr-auto lg:max-w-[calc(100%-20rem)]" dir="rtl">
       <div class="flex items-center">
          <button   id="menuBtn"  aria-controls="default-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
             <span class="sr-only">Open sidebar</span>
             <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
             </svg>
          </button>
          
                <h1 class="inline text-black font-bold mr-5 text-lg">Dashboard</h1>

             {{-- <div class="inline-block mr-4  max-md:hidden">
                   <div class="relative ">
                      <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                         <svg class="w-4 h-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                         </svg>
                      </div>
                      <input type="text" name="search" id="table-search-users" class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 " placeholder="أبحث">
                </div>
             
              </div> --}}

       
    </div>

       <div class="flex items-center mx-10">
          <img class="inline w-9 h-9 rounded-full border-gray-800 border-2 p-1" src="{{ asset('storage/'. Auth::user()->img_url) }}" alt="Jese image">
          <h1 class="inline text-black font-bold mr-5 text-lg">{{Auth::user()->full_name}}</h1>
       </div>
    </nav>
 </div>

 <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 hidden lg:hidden z-10">


 </div>


 <aside id="sidebar" class="fixed top-0 right-0 z-40 w-80 h-screen  inset-y-0  lg:translate-x-0 transform translate-x-full transition-transform duration-300 lg:block "
  aria-label="Sidebar"
  > 
     <div class="h-full  py-4 overflow-y-auto bg-gray-50 relative    dark:bg-gray-800">
         <ul class="space-y-2 font-medium">

          <button id="closeBtn"  class="absolute top-0 left-0  text-white w-10 h-10  lg:hidden  rounded   hover:bg-gray-600">
             <span  class="fa fa-close" style="font-size:20px   " ></span>
           </button>
     
     
           <li>              
             <a href="/">
                <img class=" w-16 h-16  mx-auto mix-blend-multiply "  src="{{asset("images/physicsLogo.png")}}"  alt="physicslogo">
              </a>
           </li>


             <li class="flex items-center  p-2 text-gray-500  rounded-lg  hover:bg-gray-700 group">

                 <span> الدروس</span>
             </li>
   
             @foreach ($videos as $video)
             <x-course.videocontent :video="$video"/>
                 
             @endforeach



          


       
 
 
         </ul>
         
         <hr class=" block h-px my-10  bg-gray-600 border-0 ">
         <ul>
         <li>
          <a href="/" class="flex items-center p-2   rounded-lg text-white  hover:bg-gray-700 group">
             <svg class="w-5 h-5  transition duration-75 text-gray-400  group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
             </svg>
             <span class="ms-3">أعدادات الحساب</span>
          </a>
       </li>
         <li>
          <a href="/" class="flex items-center p-2  rounded-lg text-white  hover:bg-gray-700 group">
             <svg class="w-5 h-5  transition duration-75 text-gray-400  group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.96 2.96 0 0 0 .13 5H5Z"/>
                <path d="M6.737 11.061a2.961 2.961 0 0 1 .81-1.515l6.117-6.116A4.839 4.839 0 0 1 16 2.141V2a1.97 1.97 0 0 0-1.933-2H7v5a2 2 0 0 1-2 2H0v11a1.969 1.969 0 0 0 1.933 2h12.134A1.97 1.97 0 0 0 16 18v-3.093l-1.546 1.546c-.413.413-.94.695-1.513.81l-3.4.679a2.947 2.947 0 0 1-1.85-.227 2.96 2.96 0 0 1-1.635-3.257l.681-3.397Z"/>
                <path d="M8.961 16a.93.93 0 0 0 .189-.019l3.4-.679a.961.961 0 0 0 .49-.263l6.118-6.117a2.884 2.884 0 0 0-4.079-4.078l-6.117 6.117a.96.96 0 0 0-.263.491l-.679 3.4A.961.961 0 0 0 8.961 16Zm7.477-9.8a.958.958 0 0 1 .68-.281.961.961 0 0 1 .682 1.644l-.315.315-1.36-1.36.313-.318Zm-5.911 5.911 4.236-4.236 1.359 1.359-4.236 4.237-1.7.339.341-1.699Z"/>
               
             </svg>
             <span class="ms-3">تسجيل خروج</span>
          </a>
       </li>
    </ul>
             
     </div>
 </aside>







<script>
 const sidebar = document.getElementById('sidebar');
 const menuBtn = document.getElementById('menuBtn');
 const closeBtn = document.getElementById('closeBtn');
 const overlay = document.getElementById('overlay');

 // Show sidebar when menu button is clicked
 menuBtn.addEventListener('click', () => {
    sidebar.classList.remove('translate-x-full');
    overlay.classList.remove('hidden');

    // body.classList.add('no-scroll'); 
  });

 // Hide sidebar when close button is clicked
 closeBtn.addEventListener('click', hideSidebar);
  overlay.addEventListener('click', hideSidebar); // Clicking overlay also hides sidebar

  function hideSidebar() {
    sidebar.classList.add('translate-x-full');
    overlay.classList.add('hidden');

    // body.classList.remove('no-scroll'); 
  }
</script>
