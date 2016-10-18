<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Berita;
use File;

class AdminBeritaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Berita::orderBy('id','DESC')->paginate(10);
        return view('admin_page.berita.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin_page.berita.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), array(
            'judul' => 'required',
            'deskripsi' => 'required',
            'cover' => 'required',
            ));
        if($validation->fails()){
            return redirect()->route('berita.create');
        }else{
            $logo = $request->file('cover');
            $upload = 'uploads/cover/';
            $filename = str_random(9);
            $success = $logo->move($upload, $filename);

            if($success){
            Berita::create([
                'judul' => $request->input('judul'),
                'deskripsi' => $request->input('deskripsi'),
                'cover' => $filename,
                ]);
            return redirect()->route('berita.index');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Berita::find($id);
        return view('admin_page.berita.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Berita::find($id);
        $filename = $data->cover;
        if (!empty($request->cover)) {
            File::delete('uploads/cover'.$data->cover);
            $logo = $request->file('cover');
            $upload = 'uploads/cover/';
            $filename = $data->cover;
            $success = $logo->move($upload, $filename);    
        }
        Berita::find($id)->update(['judul' => $request->judul, 'cover' => $filename, 'deskripsi' => $request->deskripsi]);
        return redirect()->route('berita.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Berita::find($id);
        File::delete('uploads/berita/'.$data->cover);
        Berita::destroy($id);
        return redirect()->route('berita.index');
    }
}
