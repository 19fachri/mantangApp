@extends('layouts.admin_layout')

@section('head')
	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
	<script>tinymce.init({ selector:'textarea' });</script>
@endsection

@section('content')
<div class="container">
    <div class="row">
    	<form class="form-horizontal" role="form" method="POST" action="<% url('/admin/berita/'.$data->id) %>" enctype="multipart/form-data">
        <% csrf_field() %>

        	<input name="_method" type="hidden" value="PUT">
	        <div class="col-md-8">
	            <div class="form-group<% $errors->has('judul') ? ' has-error' : '' %>">
	                <div class="col-md-12">
	                    <input id="judul" type="text" class="form-control" name="judul" value="<% $data->judul %>" placeholder="Judul Berita" required autofocus>

	                    @if ($errors->has('judul'))
	                        <span class="help-block">
	                            <strong><% $errors->first('judul') %></strong>
	                        </span>
	                    @endif
	                </div>
	            </div>

	            <div class="form-group<% $errors->has('deskripsi') ? ' has-error' : '' %>">
	                <div class="col-md-12">
	                    <textarea id="deskripsi" name="deskripsi"><% $data->deskripsi %></textarea>
	                </div>
	            </div>

	            <div class="form-group">
	                <div class="col-md-6 col-md-offset-4">
	                    <button type="submit" class="btn btn-primary">
	                        Update
	                    </button>
	                </div>
	            </div>
	        </div>
	        <div class="col-md-4">
                <div class="col-md-12">
                    <input id="cover" type="file" class="form-control" name="cover" placeholder="cover">
                </div>
	        </div>
	    
	    </form>
	</div>
</div>
@endsection
