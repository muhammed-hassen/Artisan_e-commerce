<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

      
        <!-- First Name -->
        <div>
            <x-input-label for="first_name" :value="__('First Name')" />
            <x-text-input id="first_name" name="first_name" class="block mt-1 w-full" type="text" :value="old('first_name')" required autofocus />
            <x-input-error :messages="$errors->get('first_name')" />
        </div>

        <!-- Last Name -->
        <div class="mt-4">
            <x-input-label for="last_name" :value="__('Last Name')" />
            <x-text-input id="last_name" name="last_name" class="block mt-1 w-full" type="text" :value="old('last_name')" required />
            <x-input-error :messages="$errors->get('last_name')" />
        </div>

        <!-- Gender -->
        <div class="mt-4">
            <x-input-label for="gender" :value="__('Gender')" />
            <select id="gender" name="gender" required class="block mt-1 w-full">
                <option value="1" {{ old('gender') == '1' ? 'selected' : '' }}>Male</option>
                <option value="0" {{ old('gender') == '0' ? 'selected' : '' }}>Female</option>
            </select>
            <x-input-error :messages="$errors->get('gender')" />
        </div>

        <!-- Address -->
        <div class="mt-4">
            <x-input-label for="address" :value="__('Address')" />
            <x-text-input id="address" name="address" class="block mt-1 w-full" type="text" :value="old('address')" required />
            <x-input-error :messages="$errors->get('address')" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <!-- Address -->
        <div class="mt-4">
            <x-input-label for="address" :value="__('Username')" />
            <x-text-input id="username" name="username" class="block mt-1 w-full" type="text" :value="old('username')" required />
            <x-input-error :messages="$errors->get('username')" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

         <!-- Gender -->
         <div class="mt-4">
            <x-input-label for="role" :value="__('Role')" />
            <select id="role" name="role" required class="block mt-1 w-full">
                <option value="1" {{ old('role') == '1' ? 'selected' : '' }}>Buyer</option>
                <option value="2" {{ old('role') == '0' ? 'selected' : '' }}>Seller</option>
            </select>
            <x-input-error :messages="$errors->get('role')" />
        </div>


        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
