<x-app-layout>

    @section('title', 'Nouveau Parfum')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class=" font-extrabold p-5 mb-10">AJOUTER UN NOUVEAU PARFUM</h1>
                    <!-- Le formulaire est géré par la route "posts.store" -->
                    <form class="pl-10" method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                        <!-- Le token CSRF -->
                        @csrf
                        <p>
                            <input class=" rounded-lg mb-5" type="text" name="title" value="{{ old('title') }}"
                                id="title" placeholder="Nom du Parfum...">
                            <!-- Le message d'erreur pour "title" -->
                            @error('title')
                            <div>{{ $message }}</div>
                        @enderror
                        </p>
                        <div class="mb-5">
                            <p>
                                <label class=" text-xs" for="picture">Ajouter photo du Parfum</label><br />
                                <input type="file" name="picture" id="picture">
                                <!-- Le message d'erreur pour "picture" -->
                                @error('picture')
                                <div>{{ $message }}</div>
                            @enderror
                            </p>
                        </div>
                        <p>
                            <textarea class=" rounded-lg" name="content" id="content" lang="fr" rows="10" cols="50"
                                placeholder="Description du Parfum...">{{ old('content') }}</textarea>
                            <!-- Le message d'erreur pour "content" -->
                            @error('content')
                            <div>{{ $message }}</div>
                        @enderror
                        </p>
                        <x-primary-button class="mt-4">{{ __('Valider') }}</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    < </x-app-layout>
