<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Manager - Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

<nav class="bg-white shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="flex-shrink-0 flex items-center">
                    <a href="index.html" class="text-2xl font-bold text-teal-600">Library Manager</a>
                </div>
                <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                    <a href="/" class="border-teal-500 text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">Home</a>
                    <a href="/admin" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">Admin</a>
                </div>
            </div>
        </div>
    </div>
</nav>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <h1 class="text-3xl font-bold text-gray-900 mb-8">Available Books</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8" id="bookContainer">
        <!-- Books will be dynamically added here -->
    @foreach($books as $book)
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <img src="storage/{{ $book->cover_url }}" alt="" class="w-full h-56 object-cover">
            <div class="p-6">
                <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $book->title }}</h3>
                <p class="text-gray-600 mb-4">{{ $book->author->name}}</p>
                <a href="{{$book->id}}" class="bg-teal-500 text-white px-4 py-2 rounded-md hover:bg-teal-600 transition duration-300">Reserve</a>
            </div>
        </div>
        @endforeach
    </div>
</div>

<script>
</script>

</body>
</html>
