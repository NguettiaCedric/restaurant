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
                <form method="POST" action="{{ route('admin.tables.update', $table->id)}}" enctype="multipart/form-data"
                    class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-gray-700 text-lg font-bold mb-2" for="name">
                            Nom <span class="text-red-500">*</span>
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="name" name="name" value="{{ $table->name}}" type="text" placeholder="nom" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-lg font-bold mb-2" for="guest_number">
                            Nombre de personne <span class="text-red-500">*</span>
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="guest_number" name="guest_number" value="{{ $table->guest_number}}"  type="number" placeholder="nombre">
                    </div>

                    {{-- <div class="mb-4">
                        <label class="block text-gray-700 text-lg font-bold mb-2" for="status">
                            Status <span class="text-red-500">*</span>
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="status" name="status" type="text" placeholder="nombre">
                    </div>


                    <div class="mb-4">
                        <label class="block text-gray-700 text-lg font-bold mb-2" for="location">
                            Localit?? <span class="text-red-500">*</span>
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="location" name="location" type="text" placeholder="Abidjan cocody">
                    </div> --}}

                    <div class="mb-1">
                        <label class="block text-gray-700 text-lg font-bold mb-2" for="status">
                            Status <span class="text-red-500">*</span>
                        </label>
                        <select
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline form-multiselect"
                            id="status" name="status">

                            <option value="{{$table->status}}">{{$table->status}}</option>
                            <option value=""><--------------> </option>
                            <option value="Pendant">Pendant</option>
                            <option value="Disponible">Disponible</option>
                            <option value="Indisponible">Indisponible</option>
                        </select>
                    </div>


                    <div class="mb-1">
                        <label class="block text-gray-700 text-lg font-bold mb-2" for="location">
                            Espace <span class="text-red-500">*</span>
                        </label>
                        <select
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline form-multiselect"
                            id="location" name="location">
                            <option value="{{$table->location}}">{{$table->location}}</option>
                            <option value=""><--------------> </option>
                            <option value="Avant">Avant</option>
                            <option value="Interieur">Interieur</option>
                            <option value="Arri??re">Arri??re</option>

                        </select>
                    </div>

                    <div class="flex justify-center py-0">
                        <button type="submit"
                            class="px-4 py-2 text-white bg-gray-500 hover:bg-indigo-700 rounded-lg ">Modifier</button>
                    </div>


                </form>

                <p class="text-center text-gray-500 text-xs">
                    &copy;2022 DricoDesign. Tous droit reserv??.
                </p>
            </div>
        </div>
    </div>
</x-admin-layout>
