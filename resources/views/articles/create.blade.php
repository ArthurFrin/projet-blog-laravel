@extends('layouts.master')

@section('content')

    <form class="mx-10 py-8 border m-4 p-4 bg-gray-200" action="{{ route('articles.store') }}" method="post">
        @csrf
        <div class="mb-4">
            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title</label>
            <input type="text" name="title" id="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
            <label for="content" class="block text-gray-700 text-sm font-bold mb-2">Content</label>
            <textarea name="content" id="content" rows="6" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
        </div>
        <button class="text-white bg-purple-600 text-lg font-bold py-2 px-4 rounded mt-4 hover:bg-purple-500" type="submit">Submit</button>
    </form>

@endsection
