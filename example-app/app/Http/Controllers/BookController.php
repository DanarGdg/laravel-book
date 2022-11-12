<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index(){
        return  view('book.all', [
            'books' => Book::all()
        ]);
    }

    public function show(Book $book){
        return view('book.detail', [
            'book' => $book
        ]);
    }
}