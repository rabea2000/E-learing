
<x-layout>
    <x-dashboard.sidebar/>

    <x-dashboard.mainsection>
        <div class=" mt-14">
        
            <div class=" text-center font-bold text-2xl leading-9 tracking-tight text-gray-900 mb-10">
                <p>رفع الملفات </p>
            </div>
        
           
        
        <div class=" w-1/3 mx-auto ">
             <form   method="post" action="/files/upload" enctype="multipart/form-data"> 
                @csrf 
                @method('post') 
                
                <div class="mt-4">
                    <x-forms.label for="title" :value="__('اسم المف')" />
                    <x-forms.input id="title" class="block mt-3 w-full"  name="title" required  />
                    <x-forms.input-error :messages="$errors->get('title')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-forms.label for="description"   class=" mb-3"  value="وصف الملف"/>
                    <x-forms.textarea id="description"  name="description"  required   placeholder="قم  بكتابة لمحة  عن الكورس  ووصف   له "   />
                    <x-forms.input-error class="mt-2" :messages="$errors->get('description')" />
                </div>

                <div class="mt-4">
                    <x-forms.label for="description"   class=" mb-3"  value="الصف"/>
                    <x-forms.selectinput name="class" />
                    <x-forms.input-error class="mt-2" :messages="$errors->get('class')" />
               
                </div>

                <input id="Document" type="file" />

                <button type="submit" class="flex mt-5 w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">ارفع الملف</button>
                
            </form>
        </div>
        
        
        </div>     
    </x-dashboard.mainsection>
        
    
    

    
    
    <script>
        // Get a reference to the file input element
        const inputElement = document.querySelector('input[id="Document"]');
    
        // Create a FilePond instance
        const pond = FilePond.create(inputElement);
    </script>

</x-layout>