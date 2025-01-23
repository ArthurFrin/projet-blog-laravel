@extends('layouts.master')

@section('content')

<div class="p-10">
    <article>
        <h2 class="text-2xl font-bold">{{ $article->title }}</h2>
        <p class="text-lg">{{ $article->content }}</p>
        <p class="text-gray-600 pt-2 text-sm">{{ $article->created_at->diffForHumans() }}</p>
    </article>
    <a href="{{ route('articles.index') }}"  class="text-white bg-blue-600 text-lg font-bold py-2 px-4 rounded mt-4 hover:bg-blue-500 max-w-fit block">Back to Articles</a>
</div>


@endsection