@props(['course'])




<div x-data="{ showEditModal:  @json($errors->hasAny("edit_course_form.*")) , 
               showAddModal:   @json($errors->hasAny("add_video_form.*")) , 
                 showDeleteModal: false }"
    class="w-full bg-white border border-gray-200 rounded-lg shadow">
    <div class="p-4 bg-white rounded-lg md:p-8 " id="about" role="tabpanel" aria-labelledby="about-tab">
        <h2 class="my-10 text-3xl font-extrabold tracking-tight text-gray-900 ">{{$course->title}}</h2>
        <p class="mb-2 text-gray-500 "> {{$course->description}}</p>


        <p class=" font-extrabold text-gray-700 mx-10 " dir="ltr">Lessons: {{$course->lessons_count}}</p>
        <p class=" font-extrabold text-gray-700 mx-10" dir="ltr">Duration : {{$course->duration}}</p>


    </div>

    <div class="flex flex-row-reverse space-x-3 m-4">

        @if ($course->video->count() == 0 )
        <x-delete-button @click="showDeleteModal = true">
            حذف الكورس
        </x-delete-button>
        @endif


        <x-edit-button @click="showEditModal = true">

            تعديل معلومات الكورس
        </x-edit-button>

        <x-add-button @click="showAddModal = true">

            أضافة فيديو للكورس
        </x-add-button>


    </div>

    <!-- Edit Modal -->
    <div x-show="showEditModal" x-cloak
        class="fixed  z-50 inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center">
        <div class=" relative bg-white p-6 rounded-lg shadow-lg max-w-lg w-full">
            <h2 class="text-lg font-bold mb-4">تعديل معلومات الكورس </h2>

            <hr class="h-px my-8  bg-gray-300 border-0 ">
            <form action="/admin/courses/{{$course->id}}"  method="POST">
                @csrf
                @method('PUT')
               
                <div class="mt-4">
                    <x.forms.label>عنوان الكورس</x.forms.label>
                    <x-forms.input name="edit_course_form[title]" type="text" placeholder="Title" value="{{$course->title}}" />
                    <x-forms.input-error :messages="$errors->get('edit_course_form.title')" class="mt-2" />


                </div>



                <div class="mt-4">
                    <x.forms.label>وصف الكورس</x.forms.label>
                    <x-forms.textarea name='edit_course_form[description]'>{{$course->description}}</x-forms.textarea>
                    <x-forms.input-error :messages="$errors->get('edit_course_form.description')" class="mt-2" />
                </div>

                <div class="my-4">
                    <x.forms.label> مخصص للصف </x.forms.label>
                    <x-forms.selectinput name="edit_course_form[class]" />
                    <x-forms.input-error :messages="$errors->get('edit_course_form.class')" class="mt-2" />
                </div>


                <div class="flex flex-row-reverse space-x-3 mt-4">
                    <x-forms.button class="bg-blue-600 ml-2">حفظ</x-forms.button>
                    <a href="">
                        <x-forms.button type="button" @click="showEditModal = false">إلغاء</x-forms.button>
                    </a>

                </div>
            </form>

            <button @click="showEditModal = false"
                class=" absolute top-2 left-2 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center ">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>

            </button>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div x-show="showAddModal" x-cloak
        class="fixed z-50 inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center">
        <div class=" relative bg-white p-6 rounded-lg shadow-lg max-w-lg w-full">
            <h2 class="text-lg font-bold mb-4"> أضافة فيديو للكورس  {{$course->title}} </h2>

            <hr class="h-px my-8  bg-gray-300 border-0 ">
            <form action="/admin/videos" method="POST" enctype="multipart/form-data">
                @csrf
                @method('Post')
                <input type="hidden" name="add_video_form[course_id]" value="{{$course->id}}">
                <div class="mt-4">
                    <x.forms.label>عنوان الفيديو</x.forms.label>
                    <x-forms.input name="add_video_form[title]" type="text" placeholder="Title" />
                    <x-forms.input-error :messages="$errors->get('add_video_form.title')" class="mt-2" />


                </div>

                <div class="mt-4">
                    <x.forms.label>وصف الفيديو</x.forms.label>
                    <x-forms.textarea name='add_video_form[description]' placeholder="وصف الفيديو"></x-forms.textarea>
                    <x-forms.input-error :messages="$errors->get('add_video_form.description')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-forms.label>رقم الفيديو </x-forms.label>
                    <x-forms.input type="number" name='add_video_form[episode]' placeholder="episode number" />
                    <x-forms.input-error :messages="$errors->get('add_video_form.episode')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x.forms.label>رابط الفيديو</x.forms.label>
                    <x-forms.input name="add_video_form[url]" type="file" placeholder="URL" />
                    <x-forms.input-error :messages="$errors->get('add_video_form.url')" class="mt-2" />

                </div>

                <div class="flex flex-row-reverse space-x-3 mt-4">
                    <x-add-button class="bg-blue-600 ml-2">أضافة</x-add-button>
                    <a href="">
                        <x-forms.button type="button" @click="showAddModal = false">إلغاء</x-forms.button>
                    </a>

                </div>
            </form>

            <button @click="showAddModal = false"
                class=" absolute top-2 left-2 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center ">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>

            </button>
        </div>
    </div>



    <div x-show="showDeleteModal" x-cloak
        class="fixed z-50 inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center">
        <div @click.away="showDeleteModal = false" class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full">
            <h2 class="text-lg font-bold mb-4">تأكيد الحذف</h2>
            <p>هل أنت متأكد من حذف الكورس ؟ </p>
            <div class="flex flex-row-reverse space-x-3 mt-4 ">
                <form action="/admin/courses/{{$course->id}}" method="POST">
                    @csrf
                    @method("delete")

                    <a href="">
                        <x-forms.button @click="showDeleteModal = false" type="button">إلغاء</x-forms.button>
                    </a>
                    <x-forms.button @click="showDeleteModal = false"
                        class="bg-red-700 hover:bg-red-800 focus:ring-red-300">حذف</x-forms.button>

                </form>
            </div>
        </div>
    </div>
</div>