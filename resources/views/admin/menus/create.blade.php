<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl w-full mx-auto sm:px-6 lg:px-6">

            <div class="flex m-2 p-2">
                <a href="{{ route('admin.menus.index') }}"
                    class="px-4 py-2 text-white  bg-gray-500 hover:bg-indigo-700 rounded-lg">Liste de menus</a>
            </div>

            {{-- <div class="m-2 p-2">
                <form>
                    <div class="mb-6">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Your
                            email</label>
                        <input type="email" id="email"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                            placeholder="name@flowbite.com" required="">
                    </div>
                    <div class="mb-6">
                        <label for="password"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Your
                            password</label>
                        <input type="password" id="password"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                            required="">
                    </div>
                    <div class="mb-6">
                        <label for="repeat-password"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Repeat
                            password</label>
                        <input type="password" id="repeat-password"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                            required="">
                    </div>
                    <div class="flex items-start mb-6">
                        <div class="flex items-center h-5">
                            <input id="terms" type="checkbox" value=""
                                class="w-4 h-4 bg-gray-50 rounded border border-gray-300 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800"
                                required="">
                        </div>
                        <label for="terms" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">I agree
                            with
                            the <a href="#" class="text-blue-600 hover:underline dark:text-blue-500">terms and
                                conditions</a></label>
                    </div>
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Register
                        new account</button>
                </form>
            </div> --}}

            <div class="w-full max-w-xxl">
                <form method="POST" action="{{ route('admin.menus.store') }}" enctype="multipart/form-data"
                    class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-gray-700 text-lg font-bold mb-2" for="name">
                            Nom <span class="text-red-500">*</span>
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline {{ $errors->has('name') ? 'is-invalid' : '' }}"
                            id="name" name="name" type="text" placeholder="nom" value="{{ old('nom') }}">

                        @error('name')
                            <div class="text-red-500  text-sm text-center">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-lg font-bold mb-2" for="price">
                            Prix <span class="text-red-500">*</span>
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline {{ $errors->has('price') ? 'is-invalid' : '' }}"
                            id="price" min="0.00" max="10000.0" step="0.01" name="price" type="number"
                            placeholder="2 000 fcfa" value="{{ old('price') }}">

                        @error('price')
                            <div class="text-red-500  text-sm text-center">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 text-lg font-bold mb-2" for="image">
                            Image <span class="text-red-500">*</span>
                        </label>
                        <input
                            class="shadow appearance-none border  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                            id="image" name="image" type="file">
                    </div>


                    <div class="mb-1">
                        <label class="block text-gray-700 text-lg font-bold mb-2" for="description">
                            Description <span class="text-red-500">*</span>
                        </label>
                        <textarea
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline {{ $errors->has('description') ? 'is-invalid' : '' }}"
                            name="description" id="description" cols="" rows="4" placeholder="Votre description ici..."
                            value="{{ old('description') }}">
                        </textarea>
                        @error('description')
                            <div class="text-red-500  text-sm text-center">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>

                    <div class="mb-1">
                        <label class="block text-gray-700 text-lg font-bold mb-2" for="categories">
                            Catégories <span class="text-red-500">*</span>
                        </label>
                        <select
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline form-multiselect {{ $errors->has('categories') ? 'is-invalid' : '' }}"
                            id="categories" multiple name="categories[]">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('categories')
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
