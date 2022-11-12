<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex justify-end m-2 p-2">
                <a href="{{ route('admin.menus.create') }}"
                    class="px-4 py-2 text-white  bg-gray-500 hover:bg-indigo-700 rounded-lg">Créer</a>
            </div>


            <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-white-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-dark">
                                Nom
                            </th>
                            <th scope="col" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-dark">
                                Image
                            </th>
                            <th scope="col" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-dark"">
                                prix
                            </th>
                            <th scope="col" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-dark"">
                                Description
                            </th>

                            <th scope="col" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-dark"">
                                Date
                            </th>

                            <th scope="col" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-dark"">
                                Actions
                            </th>

                            {{-- <th scope="col" class="py-3 px-6">
                                <span class="sr-only">Edit</span>
                            </th>
                            <th scope="col" class="py-3 px-6">
                                <span class="sr-only">Edit</span>
                            </th> --}}
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($menus as $menu)
                            <tr
                                class="bg-white dark:bg-white-800 dark:border-gray-700 hover:bg-gray-500 dark:hover:bg-gray-100">
                                <th scope="row"
                                    class="py-4 px-6 font-medium text-gray-500 whitespace-nowrap dark:text-dark">
                                    {{$menu->name}}
                                </th>

                                <td class="py-4 px-6">
                                    {{-- {{$menu->image}} --}}
                                    <img src="{{$menu->getFirstMediaUrl('images', 'thumb')}}"  width="120px" class="w-16 h-16 rounded">
                                </td>
                                <td class=" py-4 px-6 font-medium text-gray-500 whitespace-nowrap dark:text-dark">
                                    {{$menu->price}}
                                </td>
                                <td class=" py-4 px-6 font-medium text-gray-500 whitespace-nowrap dark:text-dark">
                                    {{-- {{$menu->description}} --}}
                                    {{-- {!! Str::substr(strip_tags($menu->description),0, 27) !!} --}}
                                    {!! Str::words(strip_tags($menu->description), 7, '...') !!}
                                </td>

                                <td class=" py-4 px-6 font-medium text-gray-500 whitespace-nowrap dark:text-dark">
                                    {{$menu->created_at->diffForHumans()}}
                                </td>

                                <td class="py-4 px-6 text-right">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('admin.menus.edit', $menu->id)}}"
                                            class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-lg text-white">Edit
                                        </a>
                                        <form action="{{ route('admin.menus.destroy', $menu->id)}}"
                                            method="POST"
                                            class="px-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-white"
                                            onsubmit="return confirm('Etre vous sûre ?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">Supprimer</button>
                                       </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-admin-layout>
