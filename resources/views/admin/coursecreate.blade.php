<x-layout>
    <x-dashboard.sidebar/>
<x-dashboard.mainsection>
    <div class=" mt-14">
    
        <div class=" text-center font-bold text-2xl leading-9 tracking-tight text-gray-900 mb-10">
            <p>اولاً قم بإنشاء الكورس </p>
        </div>

           <div class="grid grid-cols-4 gap-5 max-md:grid-cols-2 max-sm:grid-cols-1 : " dir="ltr">
            
            <x-course.course-card-dash :course="$courses->first()"/>
            <x-course.course-card-dash :course="$courses->first()" />
            <x-course.course-card-dash :course="$courses->first()" />
                <x-course.course-create-button/> 
             </div>
    


         <x-breakline/>



    </div>     
</x-dashboard.mainsection>
    



</x-layout>


        {{-- <x-forms.formlayout _method="post"  method="post" action="/courses/upload" >
     
            <x-forms.input label="title" type="input" name="اسم الكورس"/>

            {{-- <label for="description" class="block text-sm font-medium leading-6 text-gray-900 ">وصف الكورس </label> --}}
             {{-- <textarea label="description" name="description" rows="4" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 " placeholder="حول الكورس" required ></textarea> --}}
            {{-- <x-forms.textarea label="وصف الكورس" name="description" placeholder="حول الكورس" />
            <x-forms.selectinput  name="class"/> 
            

           
    
            <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">حمل معلومات الكورس</button>
            
        
        </x-forms.formlayout>  --}}



        {{-- 

         <div class=" text-center font-bold text-2xl leading-9 tracking-tight text-gray-900 mb-10">
            <p>ثانياً قم برفع فيديوهات  الكورس </p>
        </div>

        

        @if (!empty($courses))
            <x-forms.formlayout _method="post"  method="post" action="/videos/upload" enctype="multipart/form-data" >

                <x-course.selectcourse :courses="$courses" label="قم بتحديد الكورس الذي تود رفع الدرس عليه " name="course_id" />  --}}
                {{-- <x-forms.input label="title" type="input" name=" اسم  الدرس "/> --}}
                {{-- <x-forms.textarea label="تفاصيل الدرس" name="description" placeholder="حول الدرس "/>

                <x-forms.input label="episode" type="input" name="رقم الدرس "/>
                
                <x-forms.input label="lessonurl" type="file"  name="ارفع  الدرس"/>
    
                <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">ارفع الدرس</button>
                
            
            </x-forms.formlayout>

            
        @else
                <p  class=" text-center">لايوجد كورسات لرفع  الفيديوهات عليها قم  بإنشاء الكورس بالأول</p>
            
        @endif --}}