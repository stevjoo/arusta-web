<title>Login</title>

<x-guest-layout>
    <!-- Session Status -->
    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="text-white"/>
            <x-text-input id="email" class="block mt-1 w-full bg-[#2c2c2c] text-white" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" class="text-white"/>
            <x-text-input id="password" class="block mt-1 w-full bg-[#2c2c2c] text-white"
                          type="password"
                          name="password"
                          required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
                        
        <!-- Remember Me -->
        <div class="flex mt-4 justify-between">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-darkgray shadow-sm focus:ring-white" name="remember">
                <span class="ms-2 text-sm text-white">{{ __('Remember me') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a class="underline text-sm text-white hover:text-gray-200" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif            
        </div>

        <div class="flex items-center justify-end mt-4">
            <div class="flex items-center">
                <a class="me-4 underline text-sm text-white hover:text-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-white" href="{{ route('register') }}">
                        {{ __('Register Here') }}
                </a>
                
                <x-primary-button class="ms-3 bg-[#212121] hover:border hover:border-white hover:bg-[#212121]">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </div>
    </form>
</x-guest-layout>
