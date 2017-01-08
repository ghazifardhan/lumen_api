<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BookController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public $book;

    public function __construct()
    {
        $this->book = new Book();
    }

    public function create(Request $request){
        $create = $this->book->create([
                'name' => $request->input('name'),
                'author' => $request->input('author'),
                'year' => $request->input('year'),
            ]);

        if($create){
            $res['success'] = true;
            $res['result'] = "berhasil tambah data!";
            return response($res);
        } else {
            $res['success'] = false;
            $res['result'] = "gagal tambah data!";
            return response($res);
        }
    }

    public function index(){
        $book = $this->book->get();

        $res['listbuku'] = $book;
        return response($res);
    }
}
