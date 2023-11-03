@extends('dashboard.layouts.main')

@section("container")
    <h1>Detail Buku</h1>
    <p>Judul buku: {{$book->nama}}</p>
    <p>Pengarang Buku : {{$book->merk}}</p>
    <p>Harga Buku : {{$book->harga}}</p>        
    <p>Release : {{$book->release}}</p>        
    <p>Penerbit : {{$book->publisher->nama}}</p>
    <a class="btn btn-primary" href="/dashboard/book/all">back</a>
@endsection