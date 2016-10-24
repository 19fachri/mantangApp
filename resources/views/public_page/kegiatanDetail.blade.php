@extends('layouts.public_layout')
@section('title')
<% $data->judul %>
@endsection
@section('page_cover')
<% asset('uploads/coverKegiatan/'.$data->cover) %>
@endsection
@section('page_description')
<p>Tanggal Mulai Kegiatan : {!! $data->tanggal_mulai !!}<br/>Tanggal Selesai Kegiatan : {!! $data->tanggal_selesai !!} </p>
@endsection
@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-8">
			<article>
				<div class="post-image">
					<div class="post-heading">
						<h3><% $data->judul %></h3>
						<p>Tanggal Mulai Kegiatan : {!! $data->tanggal_mulai !!}<br/>Tanggal Selesai Kegiatan : {!! $data->tanggal_selesai !!} </p>
						<h5><i class="fa fa-calendar"></i><a href="#"> Ditulis pada : <% $data->created_at %></a></h5>
					</div>
					<img src="<% asset('uploads/coverKegiatan/'.$data->cover) %>" alt="" class="img-responsive" />
				</div>
				<p>{!! $data->deskripsi !!}</p>
			</article>
		</div>
	</div>
</div>
@endsection