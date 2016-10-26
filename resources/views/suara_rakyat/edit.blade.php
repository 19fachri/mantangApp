@extends('layouts.public_layout')

@section('head')
	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
@endsection

@section('content')
<div class="post-preview">
    <div class="row">
    	<form role="form" method="PUT" action="<% url('/suararakyat/'.$data->id) %>">
        <% csrf_field() %>

	        <div class="col-md-12">

	        	<div class="form-group">
	                <div class="col-md-12">
	                	<label>Nama</label>
	                    <input type="text" id="nama" name="nama" class="form-control" value="<%$data->nama%>">
	                </div>
	            </div>

	            <div class="form-group">
	                <div class="col-md-12">
	                	<label>Alamat</label>
	                    <input type="text" id="alamat" name="alamat" class="form-control" value="<%$data->alamat%>">
	                </div>
	            </div>

	            <div class="form-group">
	                <div class="col-md-12">
	                	<label>Judul</label>
	                    <input type="text" id="judul" name="judul" class="form-control" value="<%$data->judul%>">
	                </div>
	            </div>

	            <div class="form-group">
	                <div class="col-md-12">
	                	<label>Deskripsi</label>
	                    <textarea id="deskripsi" name="deskripsi" rows="5" class="form-control"><%$data->deskripsi%></textarea>
	                </div>
	            </div>
	            <div class="form-group">
	                <div class="col-md-12">
	                	<label>Foto</label>
	                    <input id="foto" type="file" class="form-control" name="foto" placeholder="Foto" required autofocus accept=".jpg" value="<%$data->foto%>">
	                </div>
	            </div>
	            <br>

	            <div class="form-group">
	                <div class="col-md-12">
	                    <button type="submit" class="btn btn-primary">
	                        Simpan Perubahan
	                    </button>
	                </div>
	            </div>
	        </div>
	        
	    </form>
	</div>
</div>
@endsection
