@extends("layouts.main")

@section("content")
    <h1 class='mb-5'>Buku</h1>
    @if (session()->has('success'))
        <div class="alert alert-success col-lg-12" role='alert'>
            {{ session()->get('success') }}
        </div>
    @endif

    <form method="GET" action="/book/all/" class="row mb-5">
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
    <div class='d-flex flex-wrap justify-content-center gap-3'>     
    @foreach ($books as $book)
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                <img src="https://source.unsplash.com/400x600?book/{{ $book->id}}" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ $book->nama }}</h5>
                    <p class="card-text">{{ $book->deskripsi }}</p>
                    <p class="card-text"><small class="text-muted">Rp. {{ $book->harga }}</small></p>
                    <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalDetail" href="/book/detail/{{$book->id}}">Detail</a>
                </div>
                </div>
            </div>
        </div>
    @endforeach
    </div>
    <div class="d-flex justify-content-center mt-5 mb-5">
            {!! $books->appends(request()->query())->links() !!}
    </div>
        <!-- <table class="table table-striped" style="vertical-align: middle; font-weight: bold; font-size: 20px;">
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
                                <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalDetail" href="/book/detail/{{$book->id}}">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
        </table> -->
@endsection