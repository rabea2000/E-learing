@props(['file'])

@php
    $formkey = 'edit_file_' . $file->id . '_form';
@endphp
<div x-data="{ showEditModal: @json($errors->hasAny("$formkey.*"))
    , showDeleteModal: false }"
    class=" relative p-4 bg-white my-4 rounded-xl flex justify-between  border  border-transparent hover:border-blue-600 group transition-colors duration-500">
    <div class="flex justify-between gap-3">

        <div>
            <img src="{{  asset(" images/". "pdflogo.png" ) }} "  class=" rounded-xl" width=90>

        </div>

        <div class="flex flex-col  ">
            <div class="flex-1">
                <p class="text-sm self-start text-gray-400">{{$file->name}}</p>
                <h3 class="fond-bold text-lg mt-1 group-hover:text-blue-600 transition-colors duration-500 ">
                    <a href="/files/{{$file->id}}">
                        {{$file->description}}
                    </a>
                </h3>
            </div>
            <p class="text-sm text-gray-400 "> class :{{ $file->classes_id}}</p>


        </div>
    </div>

    <div class="absolute top-2 left-2  flex   hover:cursor-pointer  ">

        <div @click="showEditModal = true" class="group ">
            <svg class="  hover:text-black  duration-300 hover:scale-105    " fill="none" height="20"
                stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                viewBox="0 0 24 24" width="20" xmlns="http://www.w3.org/2000/svg">
                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
            </svg>

            {{-- <span class=" hidden text-xs group-hover:block ">تعديل </span> --}}
        </div>

        <div @click="showDeleteModal = true" class=" group ">
            <svg class="   hover:scale-105  mx-2 " fill="none" height="20" stroke="currentColor" stroke-linecap="round"
                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="20">
                <path
                    d="M 10 2 L 9 3 L 5 3 C 4.4 3 4 3.4 4 4 C 4 4.6 4.4 5 5 5 L 7 5 L 17 5 L 19 5 C 19.6 5 20 4.6 20 4 C 20 3.4 19.6 3 19 3 L 15 3 L 14 2 L 10 2 z M 5 7 L 5 20 C 5 21.1 5.9 22 7 22 L 17 22 C 18.1 22 19 21.1 19 20 L 19 7 L 5 7 z M 9 9 C 9.6 9 10 9.4 10 10 L 10 19 C 10 19.6 9.6 20 9 20 C 8.4 20 8 19.6 8 19 L 8 10 C 8 9.4 8.4 9 9 9 z M 15 9 C 15.6 9 16 9.4 16 10 L 16 19 C 16 19.6 15.6 20 15 20 C 14.4 20 14 19.6 14 19 L 14 10 C 14 9.4 14.4 9 15 9 z">
                </path>
            </svg>
            {{-- <span class=" hidden text-xs group-hover:block ">حذف</span> --}}
        </div>
    </div>



    <div x-show="showEditModal" x-cloak
        class="fixed  z-50 inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center">
        <div class=" relative bg-white p-6 rounded-lg shadow-lg max-w-lg w-full">
            <h2 class="text-lg font-bold mb-4">تعديل معلومات الملف </h2>

            <hr class="h-px my-8  bg-gray-300 border-0 ">
            <form action="/admin/files/{{$file->id}}" method="POST">
                @csrf
                @method('PUT')

                <div class="mt-4">
                    <x.forms.label> اسم الملف</x.forms.label>
                    <x-forms.input placeholder="اسم الملف " type="text" name="{{$formkey}}[name]"  value="{{$file->name}}" />
                    <x-forms.input-error :messages="$errors->get($formkey .'.name')" class="mt-2" />


                </div>

                <div class="mt-4">
                    <x.forms.label>وصف الملف</x.forms.label>
                    <x-forms.textarea name="{{$formkey}}[description]">{{$file->description}}</x-forms.textarea>
                    <x-forms.input-error :messages="$errors->get($formkey .'.description')" class="mt-2" />
                </div>

                <div class="my-4">
                    <x.forms.label> مخصص للصف </x.forms.label>
                    <x-forms.selectinput name="{{$formkey}}[class]" />
                    <x-forms.input-error :messages="$errors->get($formkey .'.class')" class="mt-2" />
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


    <div x-show="showDeleteModal" x-cloak
        class="fixed z-50 inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center">
        <div @click.away="showDeleteModal = false" class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full">
            <h2 class="text-lg font-bold mb-4">تأكيد الحذف</h2>
            <p>هل أنت متأكد من حذف الملف ؟ </p>
            <div class="flex flex-row-reverse space-x-3 mt-4 ">
                <form action="/admin/files/{{$file->id}}" method="POST">
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