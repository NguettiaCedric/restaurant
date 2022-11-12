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
                    class="px-4 py-2 text-white  bg-gray-500 hover:bg-indigo-700 rounded-lg">Liste de Menu</a>
            </div>

            <div class="w-full max-w-xxl">
                <form method="POST" action="{{ route('admin.menus.update', $menu->id)}}" enctype="multipart/form-data" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label class="block text-gray-700 text-lg font-bold mb-2" for="name">
                            Nom <span class="text-red-500">*</span>
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="name" name="name"  value="{{$menu->name}}" type="text" placeholder="nom">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-lg font-bold mb-2" for="price">
                            Prix <span class="text-red-500">*</span>
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="price" min="0.00" max="10000.0" step="0.01"  name="price" type="number" placeholder="2 000 fcfa" value="{{ $menu->price}}">
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 text-lg font-bold mb-2" for="image">
                            Image <span class="text-red-500">*</span>
                        </label>
                        {{-- <input
                            class="shadow appearance-none border  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                            id="image"  name="image" type="file
                        "> --}}

                        {{-- <div class="mb-3">
                            <label>image file</label> --}}
                            <input type="file" name="image" class="shadow appearance-none border  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline">
                            @if($errors->has('image'))
                            <strong class="text-danger">{{ $errors->first('image') }}</strong>
                            @endif
                            <img src="{{ $menu->getFirstMediaUrl('images') }}" alt="no image" width="100" height="100">
                        {{-- </div> --}}

                        {{-- <img src="{{ $menu->getFirstMediaUrl('images') }}" alt="no image" width="100" height="100"> --}}

                    </div>


                    <div class="mb-1">
                        <label class="block text-gray-700 text-lg font-bold mb-2" for="description">
                            Description <span class="text-red-500">*</span>
                        </label>
                            <textarea  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"  name="description" id="description" cols="" rows="4" placeholder="Votre description ici...">
                                {{$menu->description}}
                            </textarea>
                    </div>


                    <div class="mb-1">
                        <label class="block text-gray-700 text-lg font-bold mb-2" for="categories">
                            Catégories
                        </label>
                            <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline form-multiselect"  id="categories" multiple name="categories[]" >
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @selected($menu->categories->contains($category))>{{$category->name}}</option>
                                @endforeach
                            </select>
                    </div>

                    <div class="flex justify-center py-0">
                        <button type="submit" class="px-4 py-2 text-white bg-gray-500 hover:bg-indigo-700 rounded-lg ">Modifier</button>
                    </div>


                </form>

                <p class="text-center text-gray-500 text-xs">
                    &copy;2022 Drico. Tous droits reservé.
                </p>
            </div>


        </div>
    </div>
</x-admin-layout>
