@extends('layouts.public_layout')

@section('content')
<div class="container">
    <div class="row">
    	<div class="col-md-8">
    		<h3><% $data->judul %></h3>
    		<p><% $data->nama %> - <% $data->alamat %> </p>
    		<p align="center"><img src="<% asset("suara_rakyat/img/".$data->foto.".JPG")%>" style="width: 500px;height;100%;"></p>
    		<p><% $data->deskripsi %></p>
    		<br>
	    </div>
	</div>
</div>
@endsection
