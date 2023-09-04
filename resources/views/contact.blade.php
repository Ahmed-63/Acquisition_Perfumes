<x-app-layout>

    @section('title', 'Contact')
    @section('meta_description', "")

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="font-extrabold p-5 mb-10">CONTACTEZ-NOUS POUR UN PARTENARIAT</h1>

                    <form class="pl-10" method="post" action="#" wire:submit.prevent="submit">

                        <div class="mb-5">
                            <label class="text-xs" for="name">Nom</label>
                            <input type="text" id="name" wire:model.defer="name" class="rounded-lg mb-2 px-3 py-2 w-full @error('name') border-red-500 @enderror" placeholder="Votre nom...">
                            @error("name")
                            <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-5">
                            <label class="text-xs" for="name">Société</label>
                            <input type="text" id="name" wire:model.defer="name" class="rounded-lg mb-2 px-3 py-2 w-full @error('name') border-red-500 @enderror" placeholder="Votre société...">
                            @error("name")
                            <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-5">
                            <label class="text-xs" for="email">Adresse email</label>
                            <input type="email" id="email" wire:model.defer="email" class="rounded-lg mb-2 px-3 py-2 w-full @error('email') border-red-500 @enderror" placeholder="Votre adresse email...">
                            @error("email")
                            <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-5">
                            <label class="text-xs" for="msg">Message</label>
                            <textarea id="msg" wire:model.defer="msg" class="rounded-lg mb-2 px-3 py-2 w-full @error('msg') border-red-500 @enderror" rows="4" placeholder="Votre message ici..."></textarea>
                            @error("msg")
                            <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="bg-blue-900 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Envoyer le message</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
