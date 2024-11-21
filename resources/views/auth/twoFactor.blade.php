<x-layout>
    <section class="flex items-center justify-center min-h-screen">
        <div class="fixed flex justify-center items-center w-full max-w-xl py-6 bg-white rounded-xl border border-gray-400 shadow-lg text-center">
            <div class="p-5 sm:p-8 md:p-12">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" width="80"
                    height="80" stroke="currentColor"
                    class="hi-outline hi-lock-closed mb-5 inline-block size-1 opacity-75">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                </svg>
                <h1 class="mb-2 text-2xl font-bold">Two-Factor Authentication</h1>
                <h2 class="mb-8 text-sm text-zinc-600 ">
                    Please confirm your account by entering the verification code sent to
                    your mobile number ending in **147.
                </h2>

                <form method="POST" action="{{ route('verify.store') }}">
                    @csrf
                    <div>
                        <x-forms.label for="two_factor_code" :value="__('Code')" />
                        <x-forms.input id="two_factor_code" class="mt-1 block w-full" type="text" name="two_factor_code"
                            required autofocus />
                        <x-forms.input-error :messages="$errors->get('two_factor_code')" class="mt-2" />
                    </div>

                    <div class="mt-4 flex justify-center">
                        <x-forms.button>
                            {{ __('تحقق') }}
                        </x-forms.button>
                    </div>
                </form>

                <div class="mt-5 text-sm text-zinc-500">
                    Haven't received it?
                    <a href="{{ route('verify.resend') }}"
                        class="font-medium text-teal-700 underline decoration-teal-500/50 underline-offset-2 hover:text-teal-900">
                        Resend a new one
                    </a>
                </div>
            </div>
        </div>
    </section>
</x-layout>
