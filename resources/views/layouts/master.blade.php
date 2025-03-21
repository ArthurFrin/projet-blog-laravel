<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel Blog') }}</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>
    <nav class="bg-purple-600 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ route('articles.index') }}" class="text-xl font-bold">Mon Blog</a>            
            <div class="flex space-x-4 items-center">
                @auth
                    <span class="mr-2">Bonjour, {{ Auth::user()->name }}</span>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-white text-purple-600 px-4 py-1 rounded hover:bg-gray-100">
                            Déconnexion
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="hover:underline">Connexion</a>
                    <a href="{{ route('register') }}" class="hover:underline">Inscription</a>
                @endauth
            </div>
        </div>
    </nav>
    
    <main class="container mx-auto mt-4">
        @yield('content')
    </main>
</body>
</html>
