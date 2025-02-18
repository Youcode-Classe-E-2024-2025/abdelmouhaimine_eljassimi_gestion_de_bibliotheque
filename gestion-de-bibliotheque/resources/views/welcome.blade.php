<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Library Manager</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-teal-500 to-emerald-600 min-h-screen flex flex-col items-center justify-center py-12">

<div class="w-full max-w-6xl bg-white p-8 rounded-3xl shadow-2xl backdrop-blur-lg">

    <h1 class="text-4xl font-bold text-gray-800 text-center mb-6">Library Dashboard</h1>

    <div class="text-center mb-6">
        <button id="showAddBookFormBtn" class="bg-gradient-to-r from-teal-500 to-emerald-500 text-white font-bold py-3 px-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
            Add a New Book
        </button>
    </div>

    <div id="addBookForm" class="hidden bg-white  p-6 rounded-lg shadow-lg mb-8 absolute z-10 justify-center items-center w-1/2 transform translate-x-[-50%] left-1/2 top-1/4">
        <h2 class="text-3xl font-semibold text-gray-800 mb-4">Add a New Book</h2>
        <form id="bookForm" class="space-y-4">
            <div>
                <label for="bookTitle" class="block text-gray-700">Book Title</label>
                <input type="text" id="bookTitle" name="bookTitle" class="w-full p-3 border border-gray-300 rounded-md" placeholder="Enter book title" required>
            </div>
            <div>
                <label for="bookCover" class="block text-gray-700">Book Cover URL</label>
                <input type="url" id="bookCover" name="bookCover" class="w-full p-3 border border-gray-300 rounded-md" placeholder="Enter book cover URL" required>
            </div>
            <div class="flex justify-end mt-4">
                <button type="submit" class="bg-teal-500 text-white py-2 px-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">Add Book</button>
                <button type="button" id="cancelAddBook" class="ml-4 bg-gray-500 text-white py-2 px-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">Cancel</button>
            </div>
        </form>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">

        <!-- Book Card 1 -->
        <div class="bg-white bg-opacity-70 p-6 rounded-lg shadow-lg backdrop-blur-lg transform hover:scale-105 transition-transform duration-300">
            <img src="https://via.placeholder.com/150" alt="Book Cover" class="w-full h-48 object-cover rounded-lg mb-4">
            <h2 class="text-2xl font-semibold text-gray-800 mb-2">Book Title 1</h2>
            <p class="text-gray-600 mb-4">Author: Author Name 1</p>
            <div class="flex justify-between items-center">
                <!-- Edit Icon Button -->
                <button class="bg-yellow-500 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                    <i class="fas fa-edit"></i>
                </button>
                <!-- Delete Icon Button -->
                <button class="bg-red-500 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </div>
        </div>

        <!-- Book Card 2 -->
        <div class="bg-white bg-opacity-70 p-6 rounded-lg shadow-lg backdrop-blur-lg transform hover:scale-105 transition-transform duration-300">
            <img src="https://via.placeholder.com/150" alt="Book Cover" class="w-full h-48 object-cover rounded-lg mb-4">
            <h2 class="text-2xl font-semibold text-gray-800 mb-2">Book Title 2</h2>
            <p class="text-gray-600 mb-4">Author: Author Name 2</p>
            <div class="flex justify-between items-center">
                <!-- Edit Icon Button -->
                <button class="bg-yellow-500 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                    <i class="fas fa-edit"></i>
                </button>
                <!-- Delete Icon Button -->
                <button class="bg-red-500 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </div>
        </div>

    </div>
</div>

<script>
    document.getElementById('showAddBookFormBtn').addEventListener('click', function() {
        document.getElementById('addBookForm').classList.remove('hidden');
    });

    document.getElementById('cancelAddBook').addEventListener('click', function() {
        document.getElementById('addBookForm').classList.add('hidden');
    });
</script>

</body>
</html>
