<x-layout>
    <x-nav/>

        {{-- <h2 class=" text-gray-800 py-5 sm:px-6 lg:px-16 text-lg font-medium bg-white leading-tight" dir="ltr">
            {{ __('Profile') }}
        </h2> --}}
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight" dir="ltr">
                    Profile
                </h2>
            </div>
        </header>

    <div class="py-12" dir="ltr">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>


        </div>
    </div>
</x-layout>
