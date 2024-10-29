<section >
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('معلومات الحساب') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("قم  بتحديث معلومات حسابك  .") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>



    <form id="profileForm" action="{{ route('profile.update') }}"  method="POST" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <!-- Hidden file input -->
        <input type="file" name="profilePic" id="fileInput" class="hidden">

        <!-- Hidden input for deleting picture -->
        <input type="hidden" name="action" id="deleteInput" value="">

        <!-- Submit button (hidden, will be triggered by JS) -->
        <button type="submit" id="submitButton" class="hidden"></button>
    </form>

   
        <div class="flex flex-col items-center space-y-5 sm:flex-row sm:space-y-0 my-5">
 
           @if (isset($user->img_url)) 
           <img class="object-cover w-40 h-40 p-1 rounded-full ring-2 ring-indigo-300"
               src="{{ asset('storage/'.$user->img_url) }}"
              alt="Bordered avatar">

              <div class="flex flex-col space-y-5 sm:ml-8">
                <button type="button" form="change-picture" id='changePictureBtn'
                    class="py-3.5 px-7 text-base font-medium text-indigo-100 focus:outline-none bg-[#202142] rounded-lg border border-indigo-200 hover:bg-indigo-900 focus:z-10 focus:ring-4 focus:ring-indigo-200 ">
                    Change picture
                </button>
                <button type="button" form="delete-picture" id='deletePictureBtn'
                    class="py-3.5 px-7 text-base font-medium text-indigo-900 focus:outline-none bg-white rounded-lg border border-indigo-200 hover:bg-indigo-100 hover:text-[#202142] focus:z-10 focus:ring-4 focus:ring-indigo-200 ">
                    Delete picture
                </button>
            </div>
           @else
           <div class=" flex justify-center items-center   bg-gray-600 w-40 h-40 p-1 rounded-full ring-2 ring-indigo-300">
              <span class=" font-medium text-4xl text-white  "> {!! $user->place_holder !!}</span>
            </div>
            <div class="flex flex-col space-y-5 sm:ml-8">
                <button type="button" form="change-picture" id='changePictureBtn'
                    class="py-3.5 px-7 text-base font-medium text-indigo-100 focus:outline-none bg-[#202142] rounded-lg border border-indigo-200 hover:bg-indigo-900 focus:z-10 focus:ring-4 focus:ring-indigo-200 ">
                    upload picture
                </button>
                <button type="button" form="delete-picture" id='deletePictureBtn'
                class=" hidden py-3.5 px-7 text-base font-medium text-indigo-900 focus:outline-none bg-white rounded-lg border border-indigo-200 hover:bg-indigo-100 hover:text-[#202142] focus:z-10 focus:ring-4 focus:ring-indigo-200 ">
                Delete picture
                    </button>
    
            </div>
           @endif


    
        </div>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-forms.label for="first_name"  :value="__('الاسم')" />
            <x-forms.input id="first_name" name="first_name" type="text" class="mt-1 block w-full" :value="old('first_name', $user->first_name)" required autofocus autocomplete="name" />
            <x-forms.input-error class="mt-2" :messages="$errors->get('first_name')" />
        </div>
        <div>
            <x-forms.label for="last_name"   :value="__('الكنية')"/>
            <x-forms.input id="last_name" name="last_name" type="text" class="mt-1 block w-full" :value="old('last_name', $user->last_name)" required autofocus autocomplete="name" />
            <x-forms.input-error class="mt-2" :messages="$errors->get('last_name')" />
        </div>

        <div>
            <x-forms.label for="user_name" :value="__('اسم المستخدم')" />
            <p class="block w-full rounded-md border-0 bg-gray-200 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    {{$user->user_name}}
            </p>
        </div>
        <div>
            <x-forms.label for="user_name" :value="__('الايميل')" />
            <p class="block w-full rounded-md border-0 py-1.5 px-2 bg-gray-200 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    {{$user->email}}
            </p>
        </div>


{{--         
        <div>
            <x-forms.label for="email" :value="__('Email')" />
            <x-forms.input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-forms.input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div> --}}

        <div class="flex items-center gap-4">
            <x-forms.button>{{ __('Save') }}</x-forms.button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>


<script>
    // Get the buttons and form elements
    const changePictureBtn = document.getElementById('changePictureBtn');
    const deletePictureBtn = document.getElementById('deletePictureBtn');
    const fileInput = document.getElementById('fileInput');
    const actionInput = document.getElementById('deleteInput');
    const submitButton = document.getElementById('submitButton');
    const profileForm = document.getElementById('profileForm');

    // Add event listener for "Change Picture"
    changePictureBtn.addEventListener('click', () => {
        // Set action to "upload"
        actionInput.value = 'upload';
        // Trigger file input to select a file
        fileInput.click();
    });

    // Add event listener for "Delete Picture"
    deletePictureBtn.addEventListener('click', () => {
        // Set action to "delete"
        actionInput.value = 'delete';
        // Confirm deletion
        if (confirm("Are you sure you want to delete the picture?")) {
            // Submit the form with the delete action
            submitButton.click();
        }
    });

    // Submit the form when a file is selected for upload
    fileInput.addEventListener('change', () => {
        if (fileInput.files.length > 0) {
            // Automatically submit the form when a file is selected
            submitButton.click();
        }
    });
</script>