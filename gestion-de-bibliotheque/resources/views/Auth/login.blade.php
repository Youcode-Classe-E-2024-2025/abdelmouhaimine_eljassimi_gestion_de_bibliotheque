<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Library Manager</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-indigo-500 to-purple-600 min-h-screen flex items-center justify-center">
<div class="bg-white bg-opacity-20 p-8 rounded-3xl shadow-2xl backdrop-blur-lg w-96 transform hover:scale-105 transition-transform duration-300">
    <h1 class="text-4xl font-bold text-white mb-6 text-center">Library Login</h1>
    <form class="space-y-6" action="/login" method="post">
        @csrf
        <div class="relative">
            <input type="email" name="email" id="email" placeholder="Email" required
                   class="w-full px-4 py-3 bg-white bg-opacity-30 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-300 text-white placeholder-gray-200">
        </div>
        <div class="relative">
            <input type="password" name="password" id="password" placeholder="Password" required
                   class="w-full px-4 py-3 bg-white bg-opacity-30 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-300 text-white placeholder-gray-200">
        </div>
        <button type="submit"
                class="w-full bg-gradient-to-r from-purple-500 to-indigo-500 text-white font-bold py-3 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
            Open the Book
        </button>
    </form>
    <div class="mt-6 text-center">
        <a href="/register" class="text-white hover:underline">New to our library? Register here</a>
    </div>
</div>
</body>
</html>
