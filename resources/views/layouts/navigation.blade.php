<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                        {{ __('Accueil') }}
                    </x-nav-link>
                    <x-nav-link :href="route('posts.index')" :active="request()->routeIs('posts.index')">
                        {{ __('Parfums Acquis') }}
                    </x-nav-link>
                    @auth
                        @if (auth()->user()->Admin == 1)
                            <x-nav-link :href="route('posts.create')" :active="request()->routeIs('posts.create')">
                                {{ __('Ajouter une acquisition') }}
                            </x-nav-link>
                        @endif
                    @endauth
                    <x-nav-link :href="url('contact')" :active="request()->routeIs('contact')">
                        {{ __('Contact') }}
                    </x-nav-link>

                </div>
            </div>
            <div></div>
            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            @auth
                                <div>{{ Auth::user()->name }}</div>
                            @endauth
                            <div class="ml-1 flex">                       
                                <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M12 14C8.13401 14 5 17.134 5 21H19C19 17.134 15.866 14 12 14Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>                        
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        @auth
                            <x-dropdown-link :href="route('profile.edit')" aria-label="">
                                {{ __('Mon compte') }}
                            </x-dropdown-link>
                        @endauth
                        @guest
                        <x-dropdown-link aria-label="onglet inscription">
                            <a href="{{ route('register') }}"
                                class="bg-indigo-500 ml-2 text-white p-1 pr-4 pl-4 rounded-lg font-bold">{{ __('Inscription') }}</a>
                        </x-dropdown-link>
                        @endguest

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            @guest
                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();"
                                    aria-label="Se Connecter" class="">
                                    {{ __('Se connecter') }}
                                </x-dropdown-link>
                            </form>
                        @endguest


                        @auth
                            <form method="POST" action="{{ route('logout') }}" aria-label="Se Deconnecter">
                                @csrf
                                <button class="bg-red-500 hover:text-red-400 ml-2 text-white p-1 pr-4 pl-4 rounded-lg font-bold" type="submit">{{ __('Se deconnecter') }}</button>
                            </form>
                        @endauth
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger (Mobile) - Placé à droite -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = !open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu (Displayed when the burger button is clicked) -->
<div :class="{ 'block': open, 'hidden': !open }" class="sm:hidden">
    <div class="pt-2 pb-3 space-y-1 flex flex-col items-start"> <!-- Menu vertical aligné à droite -->
        <!-- Navigation Links -->
        <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
            {{ __('Accueil') }}
        </x-nav-link>
        <x-nav-link :href="route('posts.index')" :active="request()->routeIs('posts.index')">
            {{ __('Parfums Acquis') }}
        </x-nav-link>
        @auth
            @if (auth()->user()->Admin == 1)
                <x-nav-link :href="route('posts.create')" :active="request()->routeIs('posts.create')">
                    {{ __('Ajouter une acquisition') }}
                </x-nav-link>
            @endif
        @endauth
        <x-nav-link :href="url('contact')" :active="request()->routeIs('contact')">
            {{ __('Contact') }}
        </x-nav-link>


        <!-- Authentication Links -->
        @guest
            <x-nav-link aria-label="onglet inscription">
                <a href="{{ route('register') }}" class="bg-indigo-500 ml-2 text-white p-1 pr-4 pl-4 rounded-lg font-bold">Inscription</a>
            </x-nav-link>
        @endguest

        <form method="POST" action="{{ route('logout') }}" aria-label="">
            @csrf
            @guest
                <x-nav-link :href="route('logout')"
                    onclick="event.preventDefault();
                                this.closest('form').submit();"
                    aria-label="" class="bg-indigo-900 ml-2 text-white p-1 pr-4 pl-4 rounded-lg font-bold">
                    {{ __('Se connecter') }}
                </x-nav-link>
            @endguest

            @auth
                <button class=" bg-red-500 hover:text-red-300 ml-2 text-white p-1 pr-4 pl-4 rounded-lg font-bold " type="submit">{{ __('Se deconnecter') }}</button>
            @endauth
        </form>
    </div>
</div>



</nav>
