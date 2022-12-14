@extends("layouts.main")

@section("content")
    <h1>publisher</h1>
    <table class="table table-striped" style="vertical-align: middle; font-weight: bold; font-size: 20px;">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>Buku</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                
                    @foreach ($publishers as $publisher)
                        <tr>
                            <td>{{ $publisher->nama }}</td>
                            <td>{{ $publisher->email }}</td>
                            <td>{{ $publisher->alamat }}</td>
                            <td>
                                @foreach ($publisher->book as $book)
                                <ul>
                                    <li>{{$book->nama}}</li>
                                </ul>
                                @endforeach
                            </td>
                            <td>
                                <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalDetail" href="/publisher/detail/{{$publisher->id}}">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
        </table>
@endsection