<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Book;

class BookController extends Controller
{
    public function index(){
        return view('books.index', [
            'books' => Book::all()
        ]);
    }

    public function create(){
        return view('books.create');
    }

    public function store(){
        // $book = $this->validateBook();
        // dd( $book );
        Book::create($this->validateBook());

        return redirect('/books');
    }

    public function edit(Book $book){
        return view('books.edit', [
            'book' => $book
        ]);
    }

    public function update(Book $book){
        $book->update($this->validateBook());

        return redirect('/books');
    }

    public function destroy(Book $book){
        $book->delete();

        return redirect('/books');
    }

    public function validateBook(){
        return request()->validate([
            'title' => 'required',
            'ISBN' => 'required'
        ]);
    }

}
