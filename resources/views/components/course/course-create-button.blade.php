

{{-- <button>
<div class="flex items-center justify-center rounded-lg bg-white shadow-2xl h-40 w-40 p-4 hover:cursor-pointer relative group transform transition-transform duration-200 hover:scale-105">
    <div class="flex items-center justify-center border-dashed border-gray-800 border-2 h-36 w-36 rounded-lg">
        <p class="text-2xl text-gray-400">
            <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
            </svg>
        </p>
    </div>
    <!-- Tooltip for hover -->
    <div class="absolute bottom-full mb-2 hidden group-hover:block  text-black text-sm rounded-lg px-3 py-1">
        قم بانشاء الكورس
    </div>
</div>
</button> --}}

<!-- Include Alpine.js -->


 <div x-data="{ showModal: false }" >
    <!-- Button to trigger modal -->
    <div @click="showModal = true" class="flex items-center justify-center rounded-lg bg-white shadow-2xl h-60 w-60 p-4 hover:cursor-pointer relative group transform transition-transform duration-200 hover:scale-105">
        <div class="flex items-center justify-center border-dashed border-gray-800 border-2  w-11/12  rounded-lg" style="height:91.666667%">
            <p class="text-2xl text-gray-400">
                <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                </svg>
            </p>
        </div>
        <div class="absolute bottom-full mb-2 hidden group-hover:block  text-black text-sm rounded-lg px-3 py-1">
            قم بانشاء الكورس
        </div>
    </div>
    
   
    <div x-show="showModal" class=" fixed z-40 inset-0 flex items-center justify-center bg-gray-800  bg-opacity-75 ">
        <div class="bg-white rounded-lg p-8 w-full max-w-md " @click.away="showModal = false">

            <div class="flex items-center justify-between   rounded-t " dir="rtl" >
        
                <h3 class=" inline-block text-lg font-semibold text-gray-900 ">
                    إنشاء كورس جديد
                </h3>

                <button  @click="showModal = false"  class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center " >
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                  
                </button>
 
            </div>
            <hr class="h-px my-8  bg-gray-300 border-0 ">


            <!-- Form Content -->
   
            <form  action="/courses/upload" method="POST" dir="rtl" >
                @csrf 
                @method("POST")
                <div class="mt-4">
                    <x-forms.label for="title" :value="__('اسم الكورس')" />
                    <x-forms.input id="title" class="block mt-3 w-full"  name="title" required  />
                    <x-forms.input-error :messages="$errors->get('title')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-forms.label for="description"   class=" mb-3"  value="حول الكورس"/>
                    <x-forms.textarea id="description"  name="description"  required   placeholder="قم  بكتابة لمحة  عن الكورس  ووصف   له "   />
                    <x-forms.input-error class="mt-2" :messages="$errors->get('description')" />
                </div>

                <div class="mt-5 text-center ">
                <x-forms.button class=""> 
                  
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    أنشئ الكورس
                </x-forms.button>
                </div>

            </form>
        </div>
    </div> 

</div>

    

