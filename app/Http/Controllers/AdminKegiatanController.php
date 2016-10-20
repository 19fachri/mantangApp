<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Kegiatan;
use File;

class AdminKegiatanController extends Controller
{
 public function __construct()
 {
    $this->middleware('auth');
    } /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Kegiatan::orderBy('id','DESC')->paginate(10);
        return view('admin_page.kegiatan.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin_page.Kegiatan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        var_dump($request->all());
        $validation = Validator::make($request->all(), array(
            'judul' => 'required',
            'deskripsi' => 'required',
            'cover' => 'required',
            'tanggal_mulai'=> 'required',
            'tanggal_selesai' => 'required',
            ));
        if($validation->fails()){
            return redirect()->route('kegiatan.create');
        }else{
        $logo = $request->file('cover');
        $upload = 'uploads/coverKegiatan/';
        $filename = str_random(9);
        $success = $logo->move($upload, $filename);

        if($success){
            $a = $request->all();
            $a['cover'] = $filename;
            Kegiatan::create($a);
            return redirect()->route('kegiatan.index');
        }
        }
        // return $request->judul;
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
        $data = Kegiatan::find($id);
        return view('admin_page.kegiatan.edit')->with('data', $data);
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
        $data = Kegiatan::find($id);
        $filename = $data->cover;
        if (!empty($request->cover)) {
            File::delete('uploads/coverKegiatan'.$data->cover);
            $logo = $request->file('cover');
            $upload = 'uploads/coverKegiatan/';
            $filename = $data->cover;
            $success = $logo->move($upload, $filename);    
        }
         $a = $request->all();
            $a['cover'] = $filename;
        Kegiatan::find($id)->update($a);
        return redirect()->route('kegiatan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Kegiatan::find($id);
        File::delete('uploads/kegiatan/'.$data->cover);
        Kegiatan::destroy($id);
        return redirect()->route('kegiatan.index');
    }
}
