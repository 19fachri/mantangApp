<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Berita;

class BeritaController extends Controller
{
    public function index()
    {
    	$data = Berita::orderBy('id','DESC')->paginate(10);
    	return view('public_page.berita')->with('data', $data);
    }

    public function detail($judul)
    {
    	$data = Berita::find($judul);
    	return view('public_page.beritaDetail')->with('data', $data);
    }
}
