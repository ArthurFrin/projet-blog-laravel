@extends('layouts.master')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="w-full max-w-md bg-white rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-bold text-center text-gray-700 mb-6">Nouveau mot de passe</h2>
        
        <form action="{{ route('password.update') }}" method="POST" class="space-y-4">
            @csrf
            
            <!-- Token de réinitialisation de mot de passe -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
            
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Adresse e-mail</label>
                <input type="email" name="email" id="email" value="{{ old('email', $request->email) }}" required 
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Nouveau mot de passe</label>
                <input type="password" name="password" id="password" required
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmer le mot de passe</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <button type="submit"
                class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                Réinitialiser le mot de passe
            </button>
        </form>
    </div>
</div>
@endsection