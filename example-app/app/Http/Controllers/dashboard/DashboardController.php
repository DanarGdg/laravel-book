<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Publisher;

class DashboardController extends Controller
{
    public function index(){        
        return  view('dashboard.book.all', [
            'publishers' => Publisher::all(),
            'books' => Book::filter(request(['search', 'publisher']))->paginate(5)
        ]);
    }

    public function show(Book $book){   
        return view('dashboard.book.detail', [
            'book' => $book
        ]);
    }

    public function create(){
        return view('dashboard.book.create', [
            'publishers' => Publisher::all()
        ]);
    }

    public function store(Request $request){
        $validateDate = $request->validate([
            'publisher_id' => 'required',
            'nama' => 'required|max:255',
            'merk' => 'required|max:255',
            'harga' => 'required',
            'release' => 'required',
            'deskripsi' => 'required|max:255',
        ]);

        Book::create($validateDate);
        return redirect('/dashboard/book/all')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(Book $book){
        return view('dashboard.book.edit', [
            'book' => $book,
            'publishers' => Publisher::all()
        ]);
    }

    public function update(Request $request, Book $book){
        $validateDate = $request->validate([
            'publisher_id' => 'required',
            'nama' => 'required|max:255',
            'merk' => 'required|max:255',
            'harga' => 'required',
            'release' => 'required',
            'deskripsi' => 'required|max:255',
        ]);

        Book::where('id', $book->id)
            ->update($validateDate);
        return redirect('/dashboard/book/all')->with('success', 'Data berhasil diubah');
    }

    public function destroy(Book $book){
        Book::destroy($book->id);
        return redirect('/dashboard/book/all')->with('success', 'Data berhasil dihapus');
    }
}
