@extends('layouts.admin_layout')
@section('title')
Buat berita kegiatan
@endsection
@section('head')
	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
	<script>tinymce.init({ selector:'textarea' });</script>
@endsection

@section('content')
<div class="container">
    <div class="row">
    	<form class="form-horizontal" role="form" method="POST" action="<% url('/admin/kegiatan') %>" enctype="multipart/form-data">
        <% csrf_field() %>

	        <div class="col-md-8">
	            <div class="form-group<% $errors->has('judul') ? ' has-error' : '' %>">
	                <div class="col-md-12">Judul Kegiatan
	                    <input id="judul" type="text" class="form-control" name="judul" value="<% old('judul') %>" placeholder="Judul kegiatan" required autofocus>

	                    @if ($errors->has('judul'))
	                        <span class="help-block">
	                            <strong><% $errors->first('judul') %></strong>
	                        </span>
	                    @endif
	                </div>
	            </div>Tanggal Mulai
	            <div class="form-group<% $errors->has('tanggal_mulai') ? ' has-error' : '' %>">
	                <div class="col-md-12">
	                    <input id="tanggal_mulai" type="date" class="form-control" name="tanggal_mulai" value="<% old('tanggal_mulai') %>" placeholder="Tanggal Mulai" required autofocus>

	                    @if ($errors->has('tanggal_mulai'))
	                        <span class="help-block">
	                            <strong><% $errors->first('tanggal_mulai') %></strong>
	                        </span>
	                    @endif
	                </div>
	            </div>Tanggal Selesai
	            <div class="form-group<% $errors->has('tanggal_selesai') ? ' has-error' : '' %>">
	                <div class="col-md-12">
	                    <input id="tanggal_selesai" type="date" class="form-control" name="tanggal_selesai" value="<% old('tanggal_selesai') %>" placeholder="Tanggal Selesai" required autofocus>

	                    @if ($errors->has('tanggal_selesai'))
	                        <span class="help-block">
	                            <strong><% $errors->first('tanggal_selesai') %></strong>
	                        </span>
	                    @endif
	                </div>
	            </div>

	            <div class="form-group<% $errors->has('deskripsi') ? ' has-error' : '' %>">
	                <div class="col-md-12">
	                    <textarea id="deskripsi" name="deskripsi"></textarea>
	                </div>
	            </div>

	            <div class="form-group">
	                <div class="col-md-6 col-md-offset-4">
	                    <button type="submit" class="btn btn-primary">
	                        Simpan
	                    </button>
	                </div>
	            </div>
	        </div>
	        <div class="col-md-4">
	        	<div class="form-group<% $errors->has('cover') ? ' has-error' : '' %>">
	                <div class="col-md-12">
	                    <input id="cover" type="file" class="form-control" name="cover" placeholder="cover" required autofocus>
	                </div>
	            </div>
	        </div>
	    
	    </form>
	</div>
</div>
@endsection
