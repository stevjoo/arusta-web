<nav x-data="{ open: false }" class="bg-darkgray border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-100" />
                    </a>
                </div>

                <!-- Navigation Links (Visible on md and larger screens) -->
                <div class="hidden md:flex space-x-8 sm:-my-px sm:ms-10">
                    @auth
                        @if(auth()->user()->isAdmin())
                            <!-- Admin Links -->
                            <x-nav-link :href="route('admin')" :active="request()->routeIs('admin')">
                                {{ __('Admin Dashboard') }}
                            </x-nav-link>
                            <x-nav-link :href="route('admin-behind-the-lense.index')" :active="request()->routeIs('admin-behind-the-lense.*')">
                                {{ __('Admin Behind the Lense') }}
                            </x-nav-link>
                            <x-nav-link :href="route('admin-photography.index')" :active="request()->routeIs('admin-photography.*')">
                                {{ __('Admin Photography') }}
                            </x-nav-link>
                            <x-nav-link :href="route('admin-graphic-design.index')" :active="request()->routeIs('admin-graphic-design.*')">
                                {{ __('Admin Graphic Design') }}
                            </x-nav-link>
                            <!-- User View Dropdown -->
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button class="mt-4 inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                        <h1>User</h1>
                                        <div class="ml-1">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </button>
                                </x-slot>
                                <x-slot name="content">
                                    <x-dropdown-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                        {{ __('User Dashboard') }}
                                    </x-dropdown-link>
                                    <x-dropdown-link :href="route('behind-the-lense.index')" :active="request()->routeIs('behind-the-lense.*')">
                                        {{ __('User Behind the Lense') }}
                                    </x-dropdown-link>
                                    <x-dropdown-link :href="route('portfolio')" :active="request()->routeIs('portfolio')">
                                        {{ __('User Portfolio') }}
                                    </x-dropdown-link>
                                    <x-dropdown-link :href="route('review.view')" :active="request()->routeIs('review.view')">
                                        {{ __('User Review') }}
                                    </x-dropdown-link>
                                    <x-dropdown-link :href="route('price')" :active="request()->routeIs('price')">
                                        {{ __('User Price') }}
                                    </x-dropdown-link>
                                    <x-dropdown-link :href="route('schedule')" :active="request()->routeIs('schedule')">
                                        {{ __('User Schedule') }}
                                    </x-dropdown-link>
                                </x-slot>
                            </x-dropdown>
                        @else
                            <!-- User Links -->
                            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                {{ __('Dashboard') }}
                            </x-nav-link>
                            <x-nav-link :href="route('behind-the-lense.index')" :active="request()->routeIs('behind-the-lense.*')">
                                {{ __('Behind the Lense') }}
                            </x-nav-link>
                            <x-nav-link :href="route('portfolio')" :active="request()->routeIs('portfolio')">
                                {{ __('Portfolio') }}
                            </x-nav-link>
                            <x-nav-link :href="route('price')" :active="request()->routeIs('price')">
                                {{ __('Price') }}
                            </x-nav-link>
                            <x-nav-link :href="route('review.view')" :active="request()->routeIs('review.view')">
                                {{ __('Review') }}
                            </x-nav-link>
                            <x-nav-link :href="route('schedule')" :active="request()->routeIs('schedule')">
                                {{ __('Schedule') }}
                            </x-nav-link>
                        @endif
                    @endauth

                    @guest
                        <!-- Guest Links -->
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                        <x-nav-link :href="route('behind-the-lense.index')" :active="request()->routeIs('behind-the-lense.*')">
                            {{ __('Behind the Lense') }}
                        </x-nav-link>
                        <x-nav-link :href="route('portfolio')" :active="request()->routeIs('portfolio')">
                            {{ __('Portfolio') }}
                        </x-nav-link>
                        <x-nav-link :href="route('price')" :active="request()->routeIs('price')">
                            {{ __('Price') }}
                        </x-nav-link>
                        <x-nav-link :href="route('review.view')" :active="request()->routeIs('review.view')">
                            {{ __('Review') }}
                        </x-nav-link>
                        <x-nav-link :href="route('schedule')" :active="request()->routeIs('schedule')">
                            {{ __('Schedule') }}
                        </x-nav-link>
                    @endguest
                </div>
            </div>

            <!-- Settings Dropdown (visible on md and larger screens) -->
            @auth
            <div class="hidden md:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                             onclick="event.preventDefault();
                                                      this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        @endauth

        <!-- Guest Links (Visible on md and larger screens) -->
        @guest
            <div class="hidden md:flex sm:items-center sm:ml-6">
                <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
                    {{ __('Login') }}
                </x-nav-link>
            </div>
        @endguest

        <!-- Hamburger Icon (Visible on screens smaller than md) -->
        <div class="-me-2 flex items-center md:hidden">
            <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>
</div>

<!-- Responsive Navigation Menu -->
<div :class="{'block': open, 'hidden': ! open}" class="hidden md:hidden">
    <div class="pt-2 pb-3 space-y-1">
        @auth
            @if(auth()->user()->isAdmin())
                <!-- Admin Responsive Links -->
                <x-responsive-nav-link :href="route('admin')" :active="request()->routeIs('admin')">
                    {{ __('Admin Dashboard') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('admin-behind-the-lense.index')" :active="request()->routeIs('admin-behind-the-lense.*')">
                    {{ __('Admin Behind the Lense') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('admin-photography.index')" :active="request()->routeIs('admin-photography.*')">
                    {{ __('Admin Photography') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('admin-graphic-design.index')" :active="request()->routeIs('admin-graphic-design.*')">
                    {{ __('Admin Graphic Design') }}
                </x-responsive-nav-link>
                                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('User Dashboard') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('behind-the-lense.index')" :active="request()->routeIs('behind-the-lense.index')">
                    {{ __('User Behind the Lense') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('portfolio')" :active="request()->routeIs('portfolio')">
                    {{ __('User Portfolio') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('review.view')" :active="request()->routeIs('review.view')">
                    {{ __('User Review') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('price')" :active="request()->routeIs('price')">
                    {{ __('User Price') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('schedule')" :active="request()->routeIs('schedule')">
                    {{ __('User Schedule') }}
                </x-responsive-nav-link>
            @else
                <!-- User Responsive Links -->
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('behind-the-lense.index')" :active="request()->routeIs('behind-the-lense.index')">
                    {{ __('Behind the Lense') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('portfolio')" :active="request()->routeIs('portfolio')">
                    {{ __('Portfolio') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('review.view')" :active="request()->routeIs('review.view')">
                    {{ __('Review') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('price')" :active="request()->routeIs('price')">
                    {{ __('Price') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('schedule')" :active="request()->routeIs('schedule')">
                    {{ __('Schedule') }}
                </x-responsive-nav-link>
            @endif
        @endauth
        @guest
            <!-- Guest Responsive Links -->
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('behind-the-lense.index')" :active="request()->routeIs('behind-the-lense.index')">
                    {{ __('Behind the Lense') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('portfolio')" :active="request()->routeIs('portfolio')">
                    {{ __('Portfolio') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('review.view')" :active="request()->routeIs('review.view')">
                    {{ __('Review') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('price')" :active="request()->routeIs('price')">
                    {{ __('Price') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('schedule')" :active="request()->routeIs('schedule')">
                    {{ __('Schedule') }}
                </x-responsive-nav-link>
        @endguest
    </div>

    <!-- Responsive Settings Options -->
    @auth
    <div class="pt-4 pb-4 border-t border-gray-200">
        <div class="px-4">
            <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
            <div class="font-medium text-sm text-gray-300">{{ Auth::user()->email }}</div>
        </div>

        <div class="mt-3 space-y-1">
            <x-responsive-nav-link :href="route('profile.edit')">
                {{ __('Profile') }}
            </x-responsive-nav-link>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-responsive-nav-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                  this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-responsive-nav-link>
            </form>
        </div>
    </div>
    @else
    <div class="pt-4 pb-4 border-t border-gray-200">
        <div class="px-4">
            <a href="{{ route('login') }}" class="text-sm text-gray-100 underline">Log in</a>
        </div>
    </div>
    @endauth
</div>
</nav>
