<!-- resources/views/auth/otp-verify.blade.php -->
<x-guest-layout>
    <form method="POST" action="{{ route('otp.verify') }}">
        @csrf

        <!-- OTP Input -->
        <div>
            <x-input-label for="otp" :value="__('Enter OTP')" />
            <x-text-input id="otp" class="block mt-1 w-full" type="text" name="otp" required autofocus autocomplete="one-time-code" />
            <x-input-error :messages="$errors->get('otp')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-4">
                {{ __('Verify OTP') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
