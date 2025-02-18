<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Library Manager</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-indigo-500 to-purple-600 min-h-screen flex items-center justify-center">
<div class="bg-white bg-opacity-20 p-8 rounded-3xl shadow-2xl backdrop-blur-lg w-96 transform hover:scale-105 transition-transform duration-300">
    <h1 class="text-4xl font-bold text-white mb-6 text-center">Join Our Library</h1>
    <form class="space-y-4">
        <div class="relative">
            <input type="text" id="name" placeholder="Full Name" required
                   class="w-full px-4 py-3 bg-white bg-opacity-30 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-300 text-white placeholder-gray-200">
            <label for="name" class="absolute left-4 top-3 text-gray-200 transition-all duration-300 pointer-events-none">
                Full Name
            </label>
        </div>
        <div class="relative">
            <input type="email" id="email" placeholder="Email" required
                   class="w-full px-4 py-3 bg-white bg-opacity-30 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-300 text-white placeholder-gray-200">
            <label for="email" class="absolute left-4 top-3 text-gray-200 transition-all duration-300 pointer-events-none">
                Email
            </label>
        </div>
        <div class="relative">
            <input type="password" id="password" placeholder="Password" required
                   class="w-full px-4 py-3 bg-white bg-opacity-30 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-300 text-white placeholder-gray-200">
            <label for="password" class="absolute left-4 top-3 text-gray-200 transition-all duration-300 pointer-events-none">
                Password
            </label>
        </div>
        <button type="submit"
                class="w-full bg-gradient-to-r from-purple-500 to-indigo-500 text-white font-bold py-3 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
            Start Your Reading Journey
        </button>
    </form>
    <div class="mt-6 text-center">
        <a href="/login" class="text-white hover:underline">Already have an account? Login here</a>
    </div>
</div>
</body>
</html>
