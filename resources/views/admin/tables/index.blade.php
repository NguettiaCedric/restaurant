<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex justify-end m-2 p-2">
                <a href="{{ route('admin.tables.create') }}"
                    class="px-4 py-2 text-white  bg-gray-500 hover:bg-indigo-700 rounded-lg">Créer</a>
            </div>

            <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-white-700 dark:text-gray-400">
                        <tr>
                            <th scope="col"
                                class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-dark">
                                #
                            </th>
                            <th scope="col"
                                class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-dark">
                                Nom
                            </th>
                            <th scope="col"
                                class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-dark">
                                Espace
                            </th>
                            <th scope="col"
                                class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-dark"">
                                Status
                            </th>
                            <th scope="col"
                                class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-dark">
                                Date
                            </th>

                            <th scope="col"
                                class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-dark">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($tables->count() > 0)
                            @foreach ($tables as $table)
                                <tr
                                    class="bg-white dark:bg-white-800 dark:border-gray-700 hover:bg-gray-500 dark:hover:bg-gray-100">

                                    <th scope="row"
                                        class="py-4 px-6 font-medium text-gray-500 whitespace-nowrap dark:text-dark">
                                        {{ $loop->index + 1 }}
                                    </th>
                                    <th scope="row"
                                        class="py-4 px-6 font-medium text-gray-500 whitespace-nowrap dark:text-dark">
                                        {{ $table->name }}
                                    </th>

                                    <td class=" py-4 px-6 font-medium text-gray-500 whitespace-nowrap dark:text-dark">
                                        {{ $table->location }}
                                    </td>

                                    <td class=" py-4 px-6 font-medium text-gray-500 whitespace-nowrap dark:text-dark">
                                        {{ $table->status }}
                                    </td>



                                    <td class=" py-4 px-6 font-medium text-gray-500 whitespace-nowrap dark:text-dark">
                                        {{ $table->created_at->diffForHumans() }}
                                    </td>

                                    <td class="py-4 px-6 text-right">
                                        <div class="flex space-x-2">
                                            <a href="{{ route('admin.tables.edit', $table->id) }}"
                                                class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-lg text-white">Edit
                                            </a>
                                            <form action="{{ route('admin.tables.destroy', $table->id) }}"
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
                        @else
                            <tr>
                                <td colspan="4">
                                    <small class="py-4 px-6 font-medium text-gray-500 whitespace-nowrap dark:text-dark">
                                        Pas de reservation enregistrée
                                    </small>
                                </td>
                            </tr>
                        @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-layout>
