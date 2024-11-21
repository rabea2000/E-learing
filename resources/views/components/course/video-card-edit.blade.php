@props(['video' , "course_title"])

@php
    $fromkey =  "edit_video_".$video->id."_form";
@endphp
<div x-data="{ showEditModal:@json($errors->hasAny("$fromkey.*")), showDeleteModal: false }"
    class="bg-white border border-gray-200 rounded-lg shadow mt-5 p-4 hover:bg-gray-300 transition-colors duration-500">
    <div class="w-full flex">
        <div class="flex justify-center items-center ml-2">
            <div class="w-12 h-12 inline-flex justify-center items-center text-white rounded-full bg-gray-600">
                {{$video->episode}}
            </div>
        </div>

        <div class="p-2 rounded-lg md:p-8">
            <h2 class="mb-2 text-2xl font-extrabold tracking-tight text-gray-900 max-md:text-lg">
                {{$video->title}}
            </h2>
            <p class="text-gray-500 line-clamp-2">{{$video->description}}</p>
        </div>
    </div>

    <div class="flex flex-row-reverse space-x-3 mt-4">
        <x-edit-button @click="showEditModal = true">تعديل</x-edit-button>

        <x-delete-button @click="showDeleteModal = true">حذف</x-delete-button>
    </div>

    <!-- Edit Modal -->
    <div x-show="showEditModal" x-cloak
        class="fixed  z-50 inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center">
        <div class=" relative bg-white p-6 rounded-lg shadow-lg max-w-lg w-full">
            <h2 class="text-lg font-bold mb-4">تعديل معلومات الفيديو </h2>
                

            <hr class="h-px my-8  bg-gray-300 border-0 ">
            <form action="/admin/videos/{{$video->id}}" method="POST">
                @csrf
                @method('PUT')

                <div class="mt-4">
                    <x.forms.label>عنوان الفيديو</x.forms.label>
                    <x-forms.input name="{{$fromkey}}[title]" type="text" placeholder="Title"
                        value="{{$video->title}}" />

                        <x-forms.input-error :messages="$errors->get($fromkey . '.title')" class="mt-2" />
              


                </div>

                <div class="mt-4">
                    <x.forms.label>وصف الفيديو</x.forms.label>
                    <x-forms.textarea name="{{$fromkey}}[description]" >{{$video->description}}</x-forms.textarea>
                    <x-forms.input-error :messages="$errors->get($fromkey . '.description')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-forms.label>رقم الفيديو </x-forms.label>
                    <x-forms.input type="number" name="{{$fromkey}}[episode]" placeholder="episode number"
                        value="{{$video->episode}}" />

                        <x-forms.input-error :messages="$errors->get($fromkey . '.episode')" class="mt-2" />
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
    <div x-show="showDeleteModal" x-cloak
        class="fixed z-50 inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center">
        <div @click.away="showDeleteModal = false" class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full">
            <h2 class="text-lg font-bold mb-4">تأكيد الحذف</h2>
            <p>هل أنت متأكد من حذف الفيديو ؟ </p>
            <div class="flex flex-row-reverse space-x-3 mt-4 ">
                <form action="/admin/videos/{{$video->id}}" method="POST">
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