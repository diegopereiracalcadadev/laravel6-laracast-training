<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Book;
use  DB;

class WishController extends Controller
{
 
    public function store(){
        try {
            $id = DB::table('wishes')->insertGetId(
                [
                    'user_id' => request('user_id'), 
                    'book_id' => request('book_id')
                ]
            );
        } catch (\Throwable $th) {
            return response()->json([ 
                'status' => -1,
                'error' => $th], 200);
        }

        return response()->json([ 'status' => 1], 200);
    }

    public function destroy(){
        $id = DB::table('wishes')
            ->where('user_id', '=', request('user_id'))
            ->where('book_id', '=', request('book_id'))
            ->delete();

        return response()->json([ 'success' => true], 200);
    }

}
