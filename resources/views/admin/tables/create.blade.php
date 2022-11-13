<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl w-full mx-auto sm:px-6 lg:px-6">

            <div class="flex m-2 p-2">
                <a href="{{ route('admin.tables.index') }}"
                    class="px-4 py-2 text-white  bg-gray-500 hover:bg-indigo-700 rounded-lg">Liste de table</a>
            </div>

            <div class="w-full max-w-xxl">
                <form method="POST" action="{{ route('admin.tables.store') }}" enctype="multipart/form-data"
                    class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-gray-700 text-lg font-bold mb-2" for="name">
                            Nom <span class="text-red-500">*</span>
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline {{ $errors->has('name') ? 'is-invalid' : '' }}"
                            id="name" name="name" type="text" placeholder="nom">

                        @error('name')
                            <div class="text-red-500  text-sm text-center">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-lg font-bold mb-2" for="guest_number">
                            Nombre de personne <span class="text-red-500">*</span>
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline {{ $errors->has('guest_number') ? 'is-invalid' : '' }}"
                            id="guest_number" name="guest_number" type="number" placeholder="nombre">

                        @error('guest_number')
                            <div class="text-red-500  text-sm text-center">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>



                    {{-- <div class="mb-1">
                        <label class="block text-gray-700 text-lg font-bold mb-2" for="status">
                            Status <span class="text-red-500">*</span>
                        </label>
                        <select
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline form-multiselect"
                            id="status" name="status">

                            @foreach (App\Enums\TableStatus::cases() as $status)
                                <option value="{{ $status->value }}">{{ $status->name}}</option>
                            @endforeach
                        </select>
                    </div> --}}



                    <div class="mb-1">
                        <label class="block text-gray-700 text-lg font-bold mb-2" for="status">
                            Status <span class="text-red-500">*</span>
                        </label>
                        <select
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline form-multiselect {{ $errors->has('status') ? 'is-invalid' : '' }}"
                            id="status" name="status">

                            <option value="pendant">Pendant</option>
                            <option value="Disponible">Disponible</option>
                            <option value="Indisponible">Indisponible</option>
                        </select>

                        @error('status')
                            <div class="text-red-500  text-sm text-center">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>

                    <div class="mb-1">
                        <label class="block text-gray-700 text-lg font-bold mb-2" for="location">
                            Espace <span class="text-red-500">*</span>
                        </label>
                        <select
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline form-multiselect {{ $errors->has('location') ? 'is-invalid' : '' }}"
                            id="location" name="location">
                            <option value="avant">Avant</option>
                            <option value="interieur">Interieur</option>
                            <option value="arrière">Arrière</option>

                        </select>

                        @error('location')
                            <div class="text-red-500  text-sm text-center">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>

                    <div class="flex justify-center py-0">
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
