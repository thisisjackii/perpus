<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BookController extends Controller
{
    // mengambil semua data
    public function all()
    {
        return Book::all();
    }

    // mengambil data by id
    public function show($id)
    {
        return Book::find($id);
    }

    // menambah data
    public function store(Request $request)
    {
        return Book::create($request->all());
    }

    // mengubah data
    public function update($id, Request $request)
    {
        $book = Book::find($id);
        $book->update($request->all());
        return $book;
    }

    // menghapus data
    public function delete($id)
    {
        $book = Book::find($id);
        $book->delete();
        return 204;
    }
}
