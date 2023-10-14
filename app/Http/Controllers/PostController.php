<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //Read data post
public function tampil()
{
    //Query get data table post
    $data = Post::orderBy('id', 'ASC')->get();


    return view('post.index', compact('data'));
}
    //Create data post
    public function simpan(Request $request)
    {
        //validasi
        $this->validate($request, [
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        //query simpan
        Post::create([
            'judul' => $request->judul,
            'deskripsi' =>$request ->deskripsi,
        ]);
    }

    };
    // Update data post

    //Delete data post
