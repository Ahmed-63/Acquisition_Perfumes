<x-app-layout>

    @section('title', 'Parfums')
    @section('meta_description', "")
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-center font-extrabold">Liste des Parfums</h1>
                    @auth
                    @if(auth()->user()->Admin==1)
                    <div class="m-2 mb-10">
                        <!-- Lien pour créer un nouvel article : "posts.create" -->
                        <a href="{{ route('posts.create') }}" title="Créer un article"><x-primary-button class="mt-4">{{ __('Nouvelle Acquisition') }}</x-primary-button></a>
                    </div>
                    @endif
                    @endauth
                    <!-- La liste des articles sous forme de cartes -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        <!-- On parcourt la collection de Post -->
                        @foreach ($posts as $post)
                            <div class="bg-white rounded-lg shadow-md p-4">
                                <img src="{{ asset('storage/'.$post->picture) }}" alt="Image de parfum"
                                    class="mx-auto max-h-40 mb-2">
                                <h2 class="text-lg font-semibold">{{ $post->title }}</h2>
                                <div class="mt-2">
                                    <a href="{{ route('posts.show', $post) }}" class="text-blue-500"
                                        title="Lire l'article"><x-primary-button class="mt-4">{{ __('Voir') }}</x-primary-button></a>
                                @auth
                                @if(auth()->user()->Admin==1)
                                    <a href="{{ route('posts.edit', $post) }}" class="text-yellow-500 ml-2"
                                        title="Modifier l'article"><x-primary-button class="mt-4">{{ __('Modifier') }}</x-primary-button></a>
                                    <form method="POST" action="{{ route('posts.destroy', $post) }}"
                                        class="inline-block ml-2">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500"
                                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?')">Supprimer</button>
                                @endif
                                @endauth
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
