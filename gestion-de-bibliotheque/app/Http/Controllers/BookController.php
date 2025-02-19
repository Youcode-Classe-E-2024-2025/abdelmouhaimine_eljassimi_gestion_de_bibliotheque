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

        $request->validate([
            'bookTitle' => 'required|string|max:255',
            'bookCover' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $path = null;
        if ($request->hasFile('bookCover')) {
            $path = $request->file('bookCover')->store('images', 'public');
        }



        Book::create([
            'title' => $request->bookTitle,
            'cover_url' => $path,
            'user_id' => auth()->user()->id
        ]);

        return redirect('/');
    }

    public function Delete(Request $request){
        $book = Book::find($request->id);
        $book->delete();
        return redirect('/');
    }
}
