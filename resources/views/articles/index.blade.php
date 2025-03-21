@extends('layouts.master')

@section('content')
<section class="px-10 py-8">
    <a href="{{ route('articles.create') }}" class="text-white bg-purple-600 text-lg font-bold py-2 px-4 rounded mb-4 hover:bg-purple-500 block max-w-fit">
        Create new article
    </a>
    @foreach($articles as $article)
        <div class="border p-4 block hover:bg-gray-100 relative">
            <a href="{{ route('articles.show', $article) }}">
            <h2 class="text-xl font-bold">{{ $article->title }}</h2>
            <p>{{ $article->content }}</p>
            <p>{{ $article->category->title ?? 'pas de categorie' }}</p>
            <p class="text-gray-600 pt-2 text-sm">{{ $article->updated_at->diffForHumans() }}</p>
            @if($image = $article->getFirstMedia('image'))
                <img src="{{ $image->getUrl() }}" alt="{{ $article->title }}" class="w-full h-48 object-cover mt-2 rounded">
            @endif
            </a>
            <div class="absolute top-0 right-0 mt-2 mr-2">
            <a href="{{ route('articles.edit', $article) }}" class="text-white bg-blue-600 text-sm font-bold py-1 px-2 rounded hover:bg-blue-500 inline-block">
                Edit
            </a>
            <form action="{{ route('articles.destroy', $article) }}" method="POST" class="inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-white bg-red-600 text-sm font-bold py-1 px-2 rounded hover:bg-red-500 inline-block">
                Delete
                </button>
            </form>
            </div>
        </div>
    @endforeach

    <div class="pagination absolute bottom-0 right-0 p-4 w-full">
        {{ $articles->links() }}
    </div>
</section>
@endsection