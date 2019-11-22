<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Book;
use  DB;

class BookController extends Controller
{
    public function index(){
        $sql = "select 
                    *,
                    ( select 'checked' from ufrj.readings r where r.book_id = b.id and r.user_id = ? ) as readed,
                    ( select 'checked' from ufrj.wishes w where w.book_id = b.id and w.user_id = ? ) as wished
                from 
                    ufrj.books b";
        $books = DB::select($sql, [
            \Auth::user()->id, 
            \Auth::user()->id
            ]);

        return view('books.index', compact('books'));
    }

    public function create(){
        return view('books.create');
    }

    public function store(){
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
