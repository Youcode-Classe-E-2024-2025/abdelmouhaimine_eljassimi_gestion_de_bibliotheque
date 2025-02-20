<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Manager - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

<nav class="bg-white shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="flex-shrink-0 flex items-center">
                    <a href="/" class="text-2xl font-bold text-teal-600">Library Manager</a>
                </div>
                <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                    <a href="/" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">Home</a>
                    <a href="/admin" class="border-teal-500 text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">Admin</a>
                </div>
            </div>
            <div class="flex items-center space-x-4">
                @if(auth()->check())
                    <span class="text-gray-700">Welcome, {{ auth()->user()->name }}!</span>
                    <a href="/logout" type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-red-600">
                        Logout
                    </a>
                @else
                    <a href="/login" class="bg-teal-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-teal-600">
                        Login
                    </a>
                @endif
            </div>
        </div>
    </div>
</nav>

<div class="w-[80%] mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-900">Manage Books</h1>
        <button onclick="showAddBookModal()" class="bg-teal-500 text-white px-4 py-2 rounded-md hover:bg-teal-600 transition duration-300">Add Book</button>
    </div>

    <div class="bg-white w-full shadow-md rounded-lg overflow-hidden">
        <table class="w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">id</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Author</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200" id="bookTableBody">
                @foreach($books as $book)
                <tr>
                    <th id="idBook" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ $book->id }}</th>
                    <th id="booktitle" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ $book->title }}</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ $book->author}}</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ $book->status}}</th>
                    <th class="flex">
                        <button class="editBook text-teal-500 px-4 py-2 rounded-md hover:bg-teal-600 transition duration-300">Edit</button>
                        <form action="/DeleteBook" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{$book->id}}">
                            <button type="submit" class=" text-red-500 px-4 py-2 rounded-md hover:bg-red-600 transition duration-300">
                                Delete
                            </button>
                        </form>
                    </th>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Add Book Modal -->
<div id="addBookModal" class="hidden bg-white p-6 rounded-lg shadow-lg mb-8 absolute z-10 justify-center items-center w-1/2 transform translate-x-[-50%] left-1/2 top-1/4">
    <h2 class="text-3xl font-semibold text-gray-800 mb-4">Add a New Book</h2>
    <form id="bookForm" action="/CreateBook" method="POST" class="space-y-4" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="bookTitle" class="block text-gray-700">Book Title</label>
            <input type="text" id="bookTitle" name="bookTitle" class="w-full p-3 border border-gray-300 rounded-md" placeholder="Enter book title" required>
        </div>
        <div>
            <label for="author" class="block text-gray-700">Author name</label>
            <input type="text" id="author_name" name="author" class="w-full p-3 border border-gray-300 rounded-md" placeholder="Enter book title" required>
        </div>
        <div>
            <label for="bookCover" class="block text-gray-700">Book Cover URL</label>
            <input type="file" id="bookCover" name="bookCover" class="w-full p-3 border border-gray-300 rounded-md" placeholder="Enter book cover URL" required>
        </div>
        <div class="flex justify-end mt-4">
            <button type="submit" class="bg-teal-500 text-white py-2 px-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">Add Book</button>
            <button type="button" id="cancelAddBook" class="ml-4 bg-gray-500 text-white py-2 px-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">Cancel</button>
        </div>
    </form>
</div>
<!-- Edit Book Modal -->
<div id="editBookForm" class="hidden bg-white p-6 rounded-lg shadow-lg mb-8 absolute z-10 justify-center items-center w-1/2 transform translate-x-[-50%] left-1/2 top-1/4">
    <h2 class="text-3xl font-semibold text-gray-800 mb-4">Edit Book</h2>
    <form id="bookForm" action="/EditBook" method="POST" class="space-y-4" enctype="multipart/form-data">
        @csrf
        <input type="hidden" id="EditbookId" name="id" value="">
        <div>
            <label for="bookTitle" class="block text-gray-700">Book Title</label>
            <input type="text" id="EditbookTitle" name="bookTitle" class="w-full p-3 border border-gray-300 rounded-md" placeholder="Enter book title" required>
        </div>
        <div>
            <label for="author" class="block text-gray-700">Author name</label>
            <input type="text" id="author_name" name="author" class="w-full p-3 border border-gray-300 rounded-md" placeholder="Enter book title" required>
        </div>
        <div>
            <label for="bookCover" class="block text-gray-700">Book Cover URL</label>
            <input type="file" id="EditbookCover" name="bookCover" class="w-full p-3 border border-gray-300 rounded-md" placeholder="Enter book cover URL" required>
        </div>
        <div class="flex justify-end mt-4">
            <button type="submit" class="bg-teal-500 text-white py-2 px-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">Edit Book</button>
            <button type="button" id="cancelEditBook" class="ml-4 bg-gray-500 text-white py-2 px-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">Cancel</button>
        </div>
    </form>
</div>
<script>

    function showAddBookModal() {
        document.getElementById('addBookModal').classList.remove('hidden');
    }

    function hideAddBookModal() {
        document.getElementById('addBookModal').classList.add('hidden');
    }

    document.getElementById('cancelEditBook').addEventListener('click', function() {
        document.getElementById('editBookForm').classList.add('hidden');
    });

    document.querySelectorAll(".editBook").forEach(button => {
        button.addEventListener("click", function (e) {
            document.getElementById('editBookForm').classList.remove('hidden');

            let bookTitle = e.currentTarget.parentElement.parentElement.querySelector("#booktitle").textContent;
            let bookId = e.currentTarget.parentElement.parentElement.querySelector("#idBook").textContent;

            document.getElementById("EditbookTitle").value = bookTitle;
            document.getElementById("EditbookId").value = bookId;
        });
    });
</script>

</body>
</html>
