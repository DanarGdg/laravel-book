@extends('dashboard.layouts.main')

@section("container")
    <h1>buku</h1>
    <div class='row'>
        <div class='col-md-2'>
            <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalDetail" href="/dashboard/book/create">add</a>    
        </div>
        <div class='col-md-10'>
            <form method="GET" action="/dashboard/book/all/" class="row">
                <div class="col-md-4">
                    <select name="publisher" class="form-control rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <label for="exampleInputName">Publisher</label>
                        <option name='publisher_id' value="0">All Publisher</option>
                        @foreach ($publishers as $publisher)
                            @if(request('publisher_id') == $publisher->id)
                                <option name='publisher_id' value="{{ $publisher->id }}" selected>{{ $publisher->nama }}</option>
                            @else
                                <option name='publisher_id' value="{{ $publisher->id }}">{{ $publisher->nama }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
        
                    <div class="col-md-6">
                        <input type="search" name="search" value="{{ request()->input('search') }}" class="form-control w-100 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Search">
                    </div>
                    <button type='submit' class='col-md-2 btn btn-dark'>
                        {{ __('Search') }}
                    </button>
            </form>
        </div>
    </div>
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
                @if($books->count())
                <tbody>
                
                    @foreach ($books as $book)
                        <tr>
                            <td>{{ $book->nama }}</td>
                            <td>{{ $book->merk }}</td>
                            <td>{{ $book->harga }}</td>
                            <td>
                                <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalDetail" href="/dashboard/book/detail/{{$book->id}}">Detail</a>
                                <a type="button" class="btn btn-warning" data-toggle="modal" href="/dashboard/book/edit/{{ $book->id }}">Edit</a>
                                <form action="/dashboard/book/delete/{{ $book->id }}" method="post" style="display: inline;">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger" onClick="return confirm('Are you sure ?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                @else
                <tbody>
                    <tr>
                        <td colspan="6" align="center">Data Not Found!</td>
                    </tr>
                </tbody>
                @endif  
        </table>

        <div class="d-flex">
            {!! $books->appends(request()->query())->links() !!}
        </div>
@endsection