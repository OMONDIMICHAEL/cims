<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <!-- Retailer Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Retailer Phone -->
        <div class="mt-4">
            <x-input-label for="RetailPhone" :value="__('Phone')" />
            <x-text-input id="RetailPhone" class="block mt-1 w-full" name="RetailPhone" :value="old('RetailPhone')" required autofocus autocomplete="RetailPhone" />
            <x-input-error :messages="$errors->get('RetailPhone')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- RetailLogo -->
        <div class="mt-4">
            <x-input-label for="RetailLogo" :value="__('Logo')" />
            <input id="RetailLogo" class="block mt-1 w-full" type="file" name="RetailLogo" :value="old('RetailLogo')" required />
            <x-input-error :messages="$errors->get('RetailLogo')" class="mt-2" />
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
        <div class="mt-4">
            <x-input-label for="role" :value="__('Register As:')"/>
            <select id="role" name="role" required>
                <option value="customer">Customer</option>
                <option value="supplier">Supplier</option>
                <option value="wholesaler">Wholesaler</option>
            </select>
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
