<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lost & Found</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-50 to-purple-100 text-gray-900 min-h-screen flex flex-col">
    <nav class="bg-white shadow-lg rounded-xl mx-6 my-4 p-4 flex justify-between items-center border border-gray-200">
        <a href="{{ route('home') }}" class="text-3xl font-extrabold text-blue-700 tracking-wide flex items-center gap-2">
            🔍 Lost & Found
        </a>
        <div>
            <ul class="flex space-x-6 text-lg font-medium">
                @auth
                    <li>
                        <a href="{{ route('posts.create') }}" class="text-gray-700 hover:text-blue-600 transition duration-300">➕ Create Post</a>
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="text-gray-700 hover:text-red-600 transition duration-300">🚪 Logout</button>
                        </form>
                    </li>
                @else
                    <li>
                        <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600 transition duration-300">🔑 Login</a>
                    </li>
                    <li>
                        <a href="{{ route('register') }}" class="text-gray-700 hover:text-blue-600 transition duration-300">📝 Register</a>
                    </li>
                @endauth
            </ul>
        </div>
    </nav>

        <div class="mt-6">
            @yield('content')
        </div>

    <footer class="mt-auto py-6 text-center text-gray-500">
        <p>&copy; {{ date('Y') }} Lost & Found. All rights reserved. 🏷️</p>
    </footer>
</body>
</html>
