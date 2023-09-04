<x-app-layout>
    @section('title', 'Accueil')
    @section('meta_description', "Acquisition Perfumes, Collection de parfum de niche")



    <div class="py-12">
        <h1 class="text-xl font-semibold mb-4 text-center mt-10 ">Acquisition Perfumes</h1>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                            <div class="swiper-slide flex flex-col sm:flex-row">
                                <div class="w-full sm:w-1/2">
                                    <img src="{{url('/img/boisdargent.png')}}" alt="image du parfum bois d'argent" class=" h-48 w-60 object-cover mx-auto sm:ml-0 sm:mr-auto rounded-xl " />
                                </div>
                                <div class="w-full sm:w-1/2 p-4">
                                    <p class="font-bold text-center sm:text-left">Bienvenue dans mon univers passionné dédié aux parfums de niche et aux collections privées. Je suis Ahmed, un amoureux des fragrances raffinées, âgé de 30 ans. Mon voyage dans le monde des parfums d'exception a commencé en 2014, lorsque j'ai acquis mon tout premier trésor olfactif, le légendaire Bois d'Argent de Dior. Cet instant a marqué le début d'une quête envoûtante.</p>
                                </div>
                            </div>
                            <div class="swiper-slide flex flex-col sm:flex-row">
                                <div class="w-full sm:w-1/2 sm:order-2">
                                    <img src="{{url('/img/baldafrique.png')}}" alt="logo" class="h-48 w-60 object-cover mx-auto sm:mx-0 sm:ml-auto sm:mr-0 rounded-xl" />
                                </div>
                                <div class="w-full sm:w-1/2 sm:order-1 p-4">
                                    <p class="font-bold text-center sm:text-left">En 2017, mon exploration s'est intensifiée avec l'ajout du Bal d'Afrique de Byredo et du somptueux Les Sables Roses de Louis Vuitton à ma collection. Ces parfums ont ouvert la voie à une aventure olfactive fascinante. Aujourd'hui, ma collection compte fièrement une quarantaine de flacons soigneusement sélectionnés, chacun contant une histoire unique.</p>
                                </div>
                            </div>
                            <div class="swiper-slide flex flex-col sm:flex-row">
                                <div class="w-full sm:w-1/2">
                                    <img src="{{url('/img/lessablesroses.jpg')}}" alt="logo" class="h-48 w-60 object-cover mt-10 mx-auto sm:ml-0 sm:mr-auto rounded-xl" />
                                </div>
                                <div class="w-full sm:w-1/2 p-4">
                                    <p class="font-bold text-center sm:text-left">Chaque fragrance que j'acquiers est le résultat d'une recherche minutieuse, d'une quête incessante de rareté et de qualité. Chaque note olfactive m'emporte vers des horizons sensoriels inexplorés, évoquant des souvenirs et des émotions profondes. Je vous invite à explorer ce site dédié, un espace où les passionnés peuvent découvrir des trésors méconnus et partager la magie intemporelle des parfums d'exception.</p>
                                </div>
                            </div>
                            <div class="swiper-slide flex flex-col sm:flex-row">
                                <div class="w-full sm:w-1/2 sm:order-2">
                                    <img src="{{url('/img/collection.png')}}" alt="logo" class="h-48 w-60 object-cover sm:h-60 mx-auto sm:mx-0 sm:ml-auto sm:mr-0 rounded-xl" />
                                </div>
                                <div class="w-full sm:w-1/2 sm:order-1 p-4">
                                    <p class="font-bold text-center sm:text-left">Rejoignez-moi dans cette aventure olfactive, où chaque flacon est une invitation à un voyage sensoriel unique, où chaque note est une symphonie d'émotions et où ma passion pour l'art de la parfumerie prend vie. Bienvenue dans mon monde parfumé, où l'élégance olfactive rencontre la quête incessante de l'exquis.</p>
                                </div>
                            </div>
                </div>
            </div>
        </div>
    </div>
    
    @if ($latestPosts->isNotEmpty())
        <h2 class="text-xl font-semibold mb-4 text-center mt-10 ">Les Dernières Acquisitions</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
            @foreach ($latestPosts as $latestPost)
                <div class="bg-white p-4 shadow-md rounded-lg">
                    <img src="{{ asset('storage/' . $latestPost->picture) }}" alt="miniature article" class="w-32 h-32 object-cover rounded-lg mx-auto mb-2">
                    <h3 class="text-lg font-semibold">{{ Str::limit($latestPost->title, 30) }}</h3>
                    <div class="text-center mt-2">
                        <a href="{{ route('posts.show', $latestPost) }}" class="text-blue-500 hover:underline"><x-primary-button class="mt-4">{{ __('Voir le Parfum') }}</x-primary-button></a>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <div class="py-12">
        <h3 class="text-xl font-semibold mb-4 text-center mt-10">Mes Recommandations</h3>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg w-full sm:w-3/4">
                    <div class="p-6 text-gray-900 flex flex-col sm:flex-row">
                        <div class="w-full h-44 sm:w-1/2 sm:pr-4">
                            <div class=" p-4 rounded-md shadow-md">
                                <h4 class="font-semibold mb-2 text-emerald-600">Boutique</h4>
                                <a href="https://www.jovoyparis.com/fr/" class="block hover:scale-100">
                                    <img src="{{url('/img/jovoy-logo.png')}}" alt="logo" class=" h-24 " />
                                </a>
                            </div>
                        </div>
                        <div class="w-full h-44 sm:w-1/2 sm:pr-4">
                            <div class=" p-4 rounded-md shadow-md">
                                <h4 class="font-semibold mb-2 text-orange-600">Collectionneur Instagram</h4>
                                <a href="https://www.instagram.com/maxforti/" class="block mb-2">@maxforti</a>
                                <a href="https://www.instagram.com/olivierparfumerie/" class="block mb-2">@olivierparfumerie</a>
                                <a href="https://www.instagram.com/voyageur.olfactif/" class="block mb-2">@voyageurolfactif</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    var swiper = new Swiper('.swiper-container', {
        loop: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
    });
</script>

