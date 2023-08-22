
<footer class="bg-gray-900 py-8 mt-24">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex flex-col items-start space-y-4">
            <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                {{ __('Accueil') }}
            </x-nav-link>
            <x-nav-link :href="route('posts.index')" :active="request()->routeIs('posts.index')">
                {{ __('Parfums Acquis') }}
            </x-nav-link>
            {{-- <a href="{{ route('commentaires.index') }}" class="text-white hover:text-blue-500 flex items-center space-x-2"> --}}
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm2.47 16.97s-.16.05-.35.05c-1.58 0-2.85-1.3-2.85-2.9v-.06c0-.23.02-.45.06-.66H9.68v3.35c0 .21-.16.36-.36.36H7.35c-.2 0-.36-.16-.36-.36V9.5c0-.2.16-.36.36-.36h1.97c.2 0 .36.16.36.36v.34h-.01c.12-.2.3-.36.51-.47.22-.1.47-.15.72-.15 1.02 0 1.8.84 1.8 2.07v.12c0 .16-.02.33-.07.47h1.72c.2 0 .36.16.36.36v2.86a.37.37 0 01-.36.36h-1.47z"/>
                </svg>
                <span>{{ __('Nous Contacter') }}</span>
            </a>
            <!-- Ajoutez d'autres liens de navigation ici -->
        </div>
    </div>
</footer>

