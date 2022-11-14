<x-guest-layout>

    <div class="container w-full px-5 py-6 mx-auto">
        <div class="grid lg:grid-cols-4 gap-y-6">
            @foreach ($category->menus as $menu)
                <div class="max-w-xs mx-4 mb-2 rounded-lg shadow-lg">
                    <img src="{{ $menu->getFirstMediaUrl('images', 'thumb') }}" width="" class=" rounded">
                    <div class="px-6 py-4">
                        <a href="{{ route('categories.show', $menu->id) }}">
                            <h4
                                class="mb-3 text-xl font-semibold tracking-tight text-green-600 hover:text-green-400 uppercase">
                                {{ $menu->name }}</h4>
                        </a>
                        <p class="leading-normal text-gray-700">
                            {{ $menu->description }}
                        </p>
                    </div>
                    <div class="flex items-center justify-between p-4">
                        <span class="text-sm text-green-600">{{ $menu->price }} FCFA</span>
                    </div>


                </div>
            @endforeach

        </div>
    </div>


</x-guest-layout>



