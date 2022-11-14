<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="">

            <div class="flex justify-end m-2 p-2">
                <a href="{{ route('admin.reservation.create') }}"
                    class="px-4 py-2 text-white  bg-gray-500 hover:bg-indigo-700 rounded-lg">Créer</a>
            </div>

            <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 ">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-white-700 dark:text-gray-400">
                        <tr>
                            <th scope="col"
                                class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-dark">
                                #
                            </th>
                            <th scope="col"
                                class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-dark">
                                Nom & prenom
                            </th>
                            <th scope="col"
                                class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-dark">
                                Numero
                            </th>
                            {{-- <th scope="col" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-dark"">
                                Email
                            </th> --}}
                            <th scope="col"
                                class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-dark">
                                Table
                            </th>
                            <th scope="col"
                                class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-dark">
                                Personnes
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
                        @if ($reservations->count() > 0)
                            @foreach ($reservations as $reservation)
                                <tr
                                    class="bg-white dark:bg-white-800 dark:border-gray-700 hover:bg-gray-500 dark:hover:bg-gray-100">

                                    <th scope="row"
                                        class="py-4 px-6 font-medium text-gray-500 whitespace-nowrap dark:text-dark">
                                        {{ $loop->index + 1 }}
                                    </th>
                                    <th scope="row"
                                        class="py-4 px-6 font-medium text-gray-500 whitespace-nowrap dark:text-dark">
                                        {{ $reservation->first_name }} {{ $reservation->last_name }}
                                    </th>

                                    <td class=" py-4 px-6 font-medium text-gray-500 whitespace-nowrap dark:text-dark">
                                        {{ $reservation->tel_number }}
                                    </td>

                                    {{-- <td class=" py-4 px-6 font-medium text-gray-500 whitespace-nowrap dark:text-dark">
                                    {{$reservation->email}}
                                </td> --}}

                                    <td class=" py-4 px-6 font-medium text-gray-500 whitespace-nowrap dark:text-dark">
                                        {{-- @foreach ($reservation->table as $item)
                                      {{$item->name}}
                                   @endforeach --}}
                                        {{ $reservation->table->name }}
                                    </td>

                                    <td class=" py-4 px-6 font-medium text-gray-500 whitespace-nowrap dark:text-dark">
                                        {{ $reservation->guest_number }}
                                    </td>


                                    <td class=" py-4 px-6 font-medium text-gray-500 whitespace-nowrap dark:text-dark">
                                        {{ $reservation->res_date }}
                                    </td>

                                    <td class="py-4 px-6 text-right">
                                        <div class="flex space-x-2">
                                            <a href="{{ route('admin.reservation.edit', $reservation->id) }}"
                                                class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-lg text-white">Edit
                                            </a>
                                            <form action="{{ route('admin.reservation.destroy', $reservation->id) }}"
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
                            <td colspan="8">
                                <small class="text-green-500 flex text-sm justify-center">
                                    Pas de reservation enregistré
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
