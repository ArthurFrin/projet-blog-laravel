@extends('layouts.master')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="w-full max-w-md bg-white rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-bold text-center text-gray-700 mb-6">Réinitialisation de mot de passe</h2>
        
        @if (session('status'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('password.email') }}" method="POST" class="space-y-4">
            @csrf
            
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Adresse e-mail</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                Envoyer le lien de réinitialisation
            </button>
        </form>
        
        <p class="mt-6 text-center text-sm text-gray-600">
            <a href="{{ route('login') }}" class="text-indigo-600 hover:underline">
                Retour à la connexion
            </a>
        </p>
    </div>
</div>
@endsection