@extends('layouts.master')

@section('content')

    <form class="mx-10 py-8 border m-4 p-4 bg-gray-200" action="{{ route('articles.update', $article) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title', $article->title) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            @error('title')
                <p class="text-red-500 text-s italic mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="content" class="block text-gray-700 text-sm font-bold mb-2">Content</label>
            <textarea name="content" id="content" rows="6" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('content', $article->content) }}</textarea>
            @error('content')
                <p class="text-red-500 text-s italic mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <div class="mb-4">
                <label for="category_id" class="block text-gray-700 text-sm font-bold mb-2">Catégorie</label>
                <select name="category_id" id="category_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="">Sélectionner une catégorie (optionel)</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $article->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->title }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="text-red-500 text-s italic mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>
        
        <div class="mb-4">
            <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Image</label>
            <input type="file" name="image" id="image" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            @error('image')
                <p class="text-red-500 text-s italic mt-2">{{ $message }}</p>
            @enderror
            
            @if($article->getFirstMedia('image'))
                <div class="mt-2">
                    <p class="text-sm text-gray-600">Image actuelle :</p>*
                    <img src="{{ $article->getFirstMediaUrl('image') }}" alt="Image de l'article" class="max-w-md rounded shadow mt-2">
                </div>
            @endif
        </div>
        
        <button class="text-white bg-purple-600 text-lg font-bold py-2 px-4 rounded mt-4 hover:bg-purple-500" type="submit">Mettre à jour</button>
    </form>

@endsection
