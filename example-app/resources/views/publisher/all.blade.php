@extends("layouts.main")

@section("content")
    <h1 class='mb-5'>Publisher</h1>
    <div class='d-flex flex-wrap justify-content-center gap-3'>
        @foreach ($publishers as $publisher)
        <div class="card" style="width: 18rem;">
            <img src="https://source.unsplash.com/400x400?people/{{$publisher->id}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ $publisher->nama }}</h5>
                <p class="card-text">{{ $publisher->deskripsi }}</p>
            </div>
            <ul class="list-group list-group-flush">
                @foreach ($publisher->book as $book)
                    
                    <li class="list-group-item">{{$book->nama}}</li>
                @endforeach
            </ul>
            <div class="card-body">
                <a href="#" class="card-link">{{ $publisher->email }}</a>
                <a href="#" class="card-link">{{ $publisher->alamat }}</a>
            </div>
        </div>
        @endforeach
    </div>
@endsection