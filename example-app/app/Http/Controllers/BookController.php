<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Publisher;

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

    // public function create(){
    //     return view('book.create', [
    //         'publishers' => Publisher::all()
    //     ]);
    // }

    // public function store(Request $request){
    //     $validateDate = $request->validate([
    //         'publisher_id' => 'required',
    //         'nama' => 'required|max:255',
    //         'merk' => 'required|max:255',
    //         'harga' => 'required',
    //         'release' => 'required',
    //     ]);

    //     Book::create($validateDate);
    //     return redirect('/dashboard/book/all')->with('success', 'Data berhasil ditambahkan');
    // }

    // public function edit(Book $book){
    //     return view('book.edit', [
    //         'book' => $book,
    //         'publishers' => Publisher::all()
    //     ]);
    // }

    // public function update(Request $request, Book $book){
    //     $validateDate = $request->validate([
    //         'publisher_id' => 'required',
    //         'nama' => 'required|max:255',
    //         'merk' => 'required|max:255',
    //         'harga' => 'required',
    //         'release' => 'required',
    //     ]);

    //     Book::where('id', $book->id)
    //         ->update($validateDate);
    //     return redirect('/dashboard/book/all')->with('success', 'Data berhasil diubah');
    // }

    // public function destroy(Book $book){
    //     Book::destroy($book->id);
    //     return redirect('/dashboard/book/all')->with('success', 'Data berhasil dihapus');
    // }
}