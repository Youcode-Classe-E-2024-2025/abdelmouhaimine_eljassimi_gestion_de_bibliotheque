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
    public function admin(){
        $books = Book::with('author')->get();
        return view('admin', ['books' => $books]);
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

        return redirect('/admin');
    }

    public function Delete(Request $request){
        $book = Book::find($request->id);
        $book->delete();
        return redirect('/admin');
    }

    public function Edit(Request $request)
    {

        $request->validate([
            'id' => 'required|exists:books,id',
            'bookTitle' => 'required|string|max:255',
            'bookCover' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $book = Book::find($request->id);


        $book->title = $request->bookTitle;

        if ($request->hasFile('bookCover')) {

            $imagePath = $request->file('bookCover')->store('images', 'public');
            $book->cover_url = $imagePath;
        }

        $book->save();
        return redirect('/admin');
    }

}
