<x-guest-layout>

    <div class="container w-full px-5 py-6 mx-auto">
        <div class="grid lg:grid-cols-4 gap-y-6">
            @foreach ($menus as $menu)
            <div class="max-w-xs mx-4 mb-2 rounded-lg shadow-lg">
                {{-- <img class="object-cover w-20 h-20 border-2 border-green-500 rounded-full"
                src="https://cdn.pixabay.com/photo/2016/11/18/14/39/beans-1834984_960_720.jpg"> --}}

                <img src="{{ $menu->getFirstMediaUrl('images', 'thumb') }}" width=""
                                    class="rounded">

                <div class="px-6 py-4">
                    <h4 class="mb-3 text-xl font-semibold tracking-tight text-green-600 uppercase">
                        {{ $menu->name }}
                    </h4>
                    <p class="leading-normal text-gray-700">{{ $menu->description }}</p>
                </div>
                <div class="flex items-center justify-between p-4">
                    <span class="text-xl text-green-600">{{ $menu->price }} Fcfa</span>
                </div>
            </div>
        @endforeach

        </div>
    </div>

</x-guest-layout>
