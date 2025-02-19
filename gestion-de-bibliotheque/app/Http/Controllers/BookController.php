<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index(){
        $books = Book::with('author')->get();
        return view('welcome', ['books' => $books]);
    }
    public function create(Request $request)
    {
        $validated = $request->validate([
            'bookTitle' => 'required|string|max:255',
            'bookCover' => 'required|url',
        ]);

        Book::create([
            'title' => $validated['bookTitle'],
            'cover_url' => $validated['bookCover'],
            'user_id' => Auth::id()
        ]);

        return redirect('/');
    }
}
