<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\support\Facades\Input as Input;
use Illuminate\support\Facades\File as File;
use Illuminate\support\Facades\Auth;
use App\Http\Requests;

use DB;

use Session;

use App\SuaraRakyat;
use App\User;

class SuaraRakyatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = SuaraRakyat::orderBy('id','DESC')->paginate(10);

        return view('suara_rakyat.index')->withData($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = SuaraRakyat::orderBy('id','DESC')->paginate(10);
        return view('suara_rakyat.create')->withData($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $count = SuaraRakyat::count();
        $max = SuaraRakyat::max('id');

        if($count == 0){
            $id = $count+1;
        }
        else{
            $id = $max+1;
        }

        $data = new SuaraRakyat;

        if(Input::hasFile('foto')){
            $file = $request->file('foto');
            $type = $file->getClientOriginalExtension();
            
                $data->nama = $request->nama;
                $data->alamat = $request->alamat;
                $data->judul = $request->judul;
                $data->deskripsi = $request->deskripsi;
                $data->foto = md5($id);
                $data->save();

                $file->move('suara_rakyat/img/', md5($id).'.'.$type);

                Session::flash('success','Aspirasi Anda Berhasil ditambahkan');
                return redirect()->route('suararakyat.index');
            
        }
        else{
            $data->nama = $request->nama;
            $data->alamat = $request->alamat;
            $data->judul = $request->judul;
            $data->deskripsi = $request->deskripsi;
            $data->foto = md5($id);

            $data->save();

            Session::flash('success','Aspirasi Anda Berhasil ditambahkan');
            return redirect()->route('suararakyat.index');
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
        $data = SuaraRakyat::find($id);
        return view('suara_rakyat.show')->withData($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
       /* $data = SuaraRakyat::find($id);
        return view('suara_rakyat.edit')->withData($data);*/
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = SuaraRakyat::find($id);
        File::delete('suara_rakyat/img/'.md5($id).'jpeg');
        SuaraRakyat::destroy($id);

        Session::flash('success','Data Berhasil Dihapus');
        return redirect()->route('suararakyat.index');
    }
}
