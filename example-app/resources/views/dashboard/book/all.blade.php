@extends('dashboard.layouts.main')

@section("container")
    <h1>buku</h1>
    <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalDetail" href="/dashboard/book/create">add</a>
    @if (session()->has('success'))
        <div class="alert alert-success col-lg-12" role='alert'>
            {{ session()->get('success') }}
        </div>
    @endif
        <table class="table table-striped" style="vertical-align: middle; font-weight: bold; font-size: 20px;">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Merk</th>
                        <th>Harga</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                
                    @foreach ($books as $book)
                        <tr>
                            <td>{{ $book->nama }}</td>
                            <td>{{ $book->merk }}</td>
                            <td>{{ $book->harga }}</td>
                            <td>
                                <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalDetail" href="/dashboard/book/detail/{{$book->id}}">Detail</a>
                                <a type="button" class="btn btn-warning" data-toggle="modal" href="/dashboard/book/edit/{{ $book->id }}">Edit</a>
                                <form action="/book/delete/{{ $book->id }}" method="post" style="display: inline;">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger" onClick="return confirm('Are you sure ?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
        </table>
@endsection