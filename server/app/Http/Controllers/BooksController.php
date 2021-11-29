<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function list(){
        return Book::all();
    }

    public function details($id){
        return Book::where('id', $id)->first();
    }
}
