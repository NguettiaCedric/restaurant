<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl w-full mx-auto sm:px-6 lg:px-6">

            <div class="flex m-2 p-2">
                <a href="{{ route('admin.reservation.index') }}"
                    class="px-4 py-2 text-white  bg-gray-500 hover:bg-indigo-700 rounded-lg">Liste des reservations</a>
            </div>


            @if (session()->has('success'))
                <div class="text-red-600">
                    <h5 class="text-center">{{ session()->get('success') }}</h5>
                </div>
            @endif

            <div class="w-full max-w-xxl">
                <form method="POST" action="{{ route('admin.reservation.update', $reservation->id) }}"
                    class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    @csrf
                    @method('PUT')

                    @if ($errors->any())
                        <div class='text-red-600 text-sm p-2' role="alert">
                            <div class="font-weight-bold">{{ __('Quelque chose s\'est mal passé.') }}</div>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="mb-4">
                        <label class="block text-gray-700 text-lg font-bold mb-2" for="last_name">
                            Nom
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline {{ $errors->has('last_name') ? 'is-invalid' : '' }}"
                            id="last_name" type="text" value="{{ $reservation->last_name }}" name="last_name"
                            placeholder="last_name">
                        @error('last_name')
                            <div class="text-red-500  text-sm text-center">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-lg font-bold mb-2" for="first_name">
                            Prenom
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline {{ $errors->has('first_name') ? 'is-invalid' : '' }}"
                            id="first_name" type="text" value="{{ $reservation->first_name }}" name="first_name"
                            placeholder="first_name">

                        @error('first_name')
                            <div class="text-red-500  text-sm text-center">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-lg font-bold mb-2" for="tel_number">
                            Telephone
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline {{ $errors->has('tel_number') ? 'is-invalid' : '' }}"
                            id="tel_number" type="number" name="tel_number" value="{{ $reservation->tel_number }}"
                            placeholder="tel_number">

                        @error('tel_number')
                            <div class="text-red-500 text-sm text-center">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-lg font-bold mb-2" for="email">
                            Email
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="email" type="email" name="email" value="{{ $reservation->email }}"  placeholder="email">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-lg font-bold mb-2" for="res_date">
                            Date de reservation
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline  {{ $errors->has('res_date') ? 'is-invalid' : '' }}"
                            id="res_date" type="datetime-local" value="{{ $reservation->res_date }}" name="res_date" placeholder="">

                        @error('res_date')
                            <div class="text-red-500  text-sm text-center">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>


                    <div class="mb-4">
                        <label class="block text-gray-700 text-lg font-bold mb-2" for="guest_number">
                            Nombre de personne
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="guest_number" type="number" name="guest_number" value="{{ $reservation->guest_number }}"  placeholder="002">
                    </div>

                    <div class="mb-1">
                        <label class="block text-gray-700 text-lg font-bold mb-2" for="status">
                            Table <span class="text-red-500">*</span>
                        </label>
                        <select
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline form-multiselect"
                            id="status" name="table_id">

                            @foreach ($tables as $table)
                                <option value="{{ $table->id }}" @selected($table->id == $reservation->table->id) >{{ $table->name }} ({{ $table->guest_number }} clients) </option>
                            @endforeach

                        </select>
                    </div>

                    <div class="flex justify-center py-4">
                        <button type="submit"
                            class="px-4 py-2 text-white bg-gray-500 hover:bg-indigo-700 rounded-lg ">Enregistrer</button>
                    </div>


                </form>

                <p class="text-center text-gray-500 text-xs">
                    &copy;2022 DricoDesign. Tous droit reservé.
                </p>
            </div>

        </div>
    </div>
</x-admin-layout>
