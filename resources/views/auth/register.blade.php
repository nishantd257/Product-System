<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Phone Number -->
        <div class="mt-4">
            <x-input-label for="phone" :value="__('Phone')" />
            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autocomplete="tel" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <!-- Address -->
        <div class="mt-4">
            <x-input-label for="address" :value="__('Address')" />
            <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autocomplete="address" />
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>

        <!-- Gender -->
        <div class="mt-4">
            <x-input-label for="gender" :value="__('Gender')" />
            <div class="flex items-center">
                <input type="radio" id="male" name="gender" value="male" class="mr-2" required {{ old('gender') == 'male' ? 'checked' : '' }}> 
                <label for="male" class="mr-4">{{ __('Male') }}</label>
                <input type="radio" id="female" name="gender" value="female" class="mr-2" required {{ old('gender') == 'female' ? 'checked' : '' }}> 
                <label for="female">{{ __('Female') }}</label>
            </div>
            <x-input-error :messages="$errors->get('gender')" class="mt-2" />
        </div>

        <!-- Language -->
        <div class="mt-4">
            <x-input-label for="language" :value="__('Language')" />
            <div class="flex items-center">
                <input type="checkbox" id="hindi" name="language[]" value="Hindi" class="mr-2" {{ is_array(old('language')) && in_array('Hindi', old('language')) ? 'checked' : '' }}>
                <label for="hindi" class="mr-4">{{ __('Hindi') }}</label>
                <input type="checkbox" id="english" name="language[]" value="English" class="mr-2" {{ is_array(old('language')) && in_array('English', old('language')) ? 'checked' : '' }}>
                <label for="english" class="mr-4">{{ __('English') }}</label>
                <input type="checkbox" id="german" name="language[]" value="German" class="mr-2" {{ is_array(old('language')) && in_array('German', old('language')) ? 'checked' : '' }}>
                <label for="german">{{ __('German') }}</label>
            </div>
            <x-input-error :messages="$errors->get('language')" class="mt-2" />
        </div>

        <!-- Profile Description -->
        <div class="mt-4">
            <x-input-label for="profile_description" :value="__('Profile Description')" />
            <textarea id="profile_description" name="profile_description" rows="4" class="block mt-1 w-full" maxlength="1500">{{ old('profile_description') }}</textarea>
            <x-input-error :messages="$errors->get('profile_description')" class="mt-2" />
        </div>

        <!-- Profile Photo -->
        <div class="mt-4">
            <x-input-label for="profile_photo" :value="__('Profile Photo')" />
            <x-text-input id="profile_photo" class="block mt-1 w-full" type="file" name="profile_photo" />
            <x-input-error :messages="$errors->get('profile_photo')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
