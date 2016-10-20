<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Kegiatan;

class KegiatanController extends Controller
{
     public function index()
    {
    	$data = Kegiatan::orderBy('id','DESC')->paginate(10);
    	return view('public_page.kegiatan')->with('data', $data);
    }

    public function detail($judul)
    {
    	$data = Kegiatan::find($judul);
    	return view('public_page.kegiatanDetail')->with('data', $data);
    }
}
