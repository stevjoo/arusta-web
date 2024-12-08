<title>Confirm Password</title>

<x-guest-layout>
    <div class="mb-4 mt-16 text-sm text-gray-200">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" class="text-white"/>

            <x-text-input id="password" class="block mt-1 w-full bg-[#2c2c2c] text-white"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex justify-end mt-4">
            <x-primary-button class="bg-[#212121] hover:border hover:border-white hover:bg-[#212121]">
                {{ __('Confirm') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
