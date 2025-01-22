@extends('layouts.master')

@section('content')
<section class="px-10 py-8">
    @foreach($articles as $article)
        <div class="border p-4">
            <h2 class="text-xl font-bold">{{ $article->title }}</h2>
            <p>{{ $article->excerpt }}</p>
            <a href="{{ route('articles.show', $article->id) }}" class="text-blue-500 hover:underline">Read more</a>
        </div>
    @endforeach
    <button class="text-white bg-purple-600 text-lg font-bold py-2 px-4 rounded mt-4 hover:bg-purple-500">
        <a href="{{ route('articles.create') }}">Create new article</a>
    </button>
</section>
@endsection