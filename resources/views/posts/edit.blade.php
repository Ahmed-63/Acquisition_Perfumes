<x-app-layout>

    @section('title', 'Modifier mon Parfum')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class=" font-extrabold p-5 mb-10"> MODIFIER MON PARFUM</h1>

                    <!-- Si nous avons un Post $post -->
                    @if (isset($post))
                        <!-- Le formulaire est géré par la route "posts.update" -->
                        <form class="pl-10" method="POST" action="{{ route('posts.update', $post) }}"
                            enctype="multipart/form-data">

                            <!-- <input type="hidden" name="_method" value="PUT"> -->
                            @method('PUT')
                        @else
                            <!-- Le formulaire est géré par la route "posts.store" -->
                            <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                    @endif

                    <!-- Le token CSRF -->
                    @csrf

                    <p>
                        <!-- S'il y a un $post->title, on complète la valeur de l'input -->
                        <input class=" rounded-lg mb-5" type="text" name="title"
                            value="{{ isset($post->title) ? $post->title : old('title') }}" id="title"
                            placeholder="Nom du Parfum...">

                        <!-- Le message d'erreur pour "title" -->
                        @error('title')
                        <div>{{ $message }}</div>
                    @enderror
                    </p>

                    <!-- S'il y a une image $post->picture, on l'affiche -->
                    @if (isset($post->picture))
                        <p>
                            <span class=" text-xs">Parfum actuelle</span><br />
                            <img src="{{ asset('storage/' . $post->picture) }}" alt="image de couverture actuelle"
                                style="max-height: 200px;">
                        </p>
                    @endif
                    <div class="mb-5 mt-5">
                        <p>
                            <label class=" text-xs" for="picture">Ajouter nouvelle photo du Parfum</label><br />
                            <input type="file" name="picture" id="picture">

                            <!-- Le message d'erreur pour "picture" -->
                            @error('picture')
                            <div>{{ $message }}</div>
                        @enderror
                        </p>
                    </div>
                    <p>
                        <!-- S'il y a un $post->content, on complète la valeur du textarea -->
                        <textarea class=" rounded-lg" name="content" id="content" lang="fr" rows="10" cols="50"
                            placeholder="Description du Parfum...">{{ isset($post->content) ? $post->content : old('content') }}</textarea>

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
 
</x-app-layout>
