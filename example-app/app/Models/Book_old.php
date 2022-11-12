<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book
{
    private static $listBooks = [
        [
            "id" => "1",
            "nama" => "The Hobbit",
            "merk" => "J.R.R. Tolkien",
            "harga" => 100000,
        ],
        [
            "id" => "2",
            "nama" => "The Lord of the Rings",
            "merk" => "J.R.R. Tolkien",
            "harga" => 200000,
        ],
        [
            "id" => "3",
            "nama" => "Harry Potter and the Philosopher's Stone",
            "merk" => "J.K. Rowling",
            "harga" => 300000,
        ],
        [
            "id" => "4",
            "nama" => "Harry Potter and the Chamber of Secrets",
            "merk" => "J.K. Rowling",
            "harga" => 400000,
        ],
        [
            "id" => "5",
            "nama" => "Harry Potter and the Prisoner of Azkaban",
            "merk" => "J.K. Rowling",
            "harga" => 500000,
        ],
    ];

    public static function all(){
        return collect(self::$listBooks);
    }

    public static function find($id){
        $book_data = static::all();
        return $book_data->firstWhere('id', $id);
    }
}