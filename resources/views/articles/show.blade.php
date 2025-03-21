@extends('layouts.master')

@section('content')

<div class="p-10">
    <article>
        <h2 class="text-2xl font-bold">{{ $article->title }}</h2>
        
        @if($article->getFirstMedia())
            <div class="my-4">
                <img src="{{ $article->getFirstMediaUrl() }}" alt="Image de l'article" class="max-w-md rounded shadow">
            </div>
        @endif
        
        <p class="text-lg">{{ $article->content }}</p>
        
        @if($article->category)
            <p class="text-purple-600 pt-2 text-sm">Catégorie: {{ $article->category->title }}</p>
        @endif
        
        <p class="text-gray-600 pt-2 text-sm">{{ $article->created_at->diffForHumans() }}</p>
    </article>
    <a href="{{ route('articles.index') }}"  class="text-white bg-blue-600 text-lg font-bold py-2 px-4 rounded mt-4 hover:bg-blue-500 max-w-fit block">Back to Articles</a>
</div>

@endsection