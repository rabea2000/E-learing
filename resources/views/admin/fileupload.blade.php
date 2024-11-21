<x-layout>
    <x-dashboard.sidebar />

    <x-dashboard.mainsection>
        <div class="mt-14">
            <!-- Title Section -->
            <div class="text-center font-bold text-2xl leading-9 tracking-tight mb-5 text-gray-900">
                <p>رفع الملفات</p>
            </div>

            <!-- Status Messages -->
            @if (session('status'))
                <p class="text-center text-sm my-10 text-red-500">{{ session('status')['error'] ?? "" }}</p>
                <p class="text-center text-sm my-10 text-green-400">{{ session('status')['success'] ?? "" }}</p>
            @endif

            <!-- Form Section -->
            <div class="flex items-center justify-center lg:max-w-4xl mx-auto">
                <form action="/admin/files" method="POST" enctype="multipart/form-data" 
                      class="w-full max-w-3xl p-8 border border-gray-200 shadow-lg rounded-lg bg-white">
                    @csrf
                    @method('post')

                    <!-- Form Fields in Grid Layout -->
                    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                        <!-- Title Field -->
                        <div>
                            <x-forms.label for="title" :value="__('اسم الملف')" />
                            <x-forms.input id="title" class="block mt-3 w-full" name="title" required />
                            <x-forms.input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <!-- Class Field -->
                        <div>
                            <x-forms.label for="class" :value="__('الصف')" />
                            <x-forms.selectinput name="class" class="block mt-3 w-full"  required />
                            <x-forms.input-error :messages="$errors->get('class')" class="mt-2" />
                        </div>

                        <!-- Description Field -->
                        <div class="lg:col-span-2">
                            <x-forms.label for="description" :value="__('وصف الملف')" />
                            <x-forms.textarea id="description" name="description" required 
                                              placeholder="قم بكتابة لمحة عن الكورس ووصف له" 
                                              class="mt-3 w-full" />
                            <x-forms.input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <!-- File Upload Field -->
                        <div class="lg:col-span-2">
                            <x-forms.label for="fileurl" :value="__('رفع الملف')" />
                            <input id="dropzone-file" type="file" name="fileurl" required 
                                   class="block w-full text-sm text-gray-500 bg-gray-100 border rounded-lg cursor-pointer mt-3"/>
                            <x-forms.input-error :messages="$errors->get('fileurl')" class="mt-2" />
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex items-center justify-center mt-8">
                        <x-forms.button class="w-full lg:w-1/2">رفع الملف</x-forms.button>
                    </div>
                </form>
            </div>
        </div>
    </x-dashboard.mainsection>
</x-layout>



           <!-- Drag and Drop Section -->
                            {{-- <div
                                class="flex items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer my-auto bg-gray-50">
                                <label for="dropzone-file"
                                    class="flex flex-col items-center justify-center w-full h-full">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                        </svg>
                                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                                class="font-semibold">Click to upload</span> or drag and drop</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">PDF</p>
                                    </div>
                                    <input id="dropzone-file" type="file" class="hidden" name="file" required />
                                </label>
                            </div> --}}