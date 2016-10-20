@extends('layouts.public_layout')
@section('title')
Kabar Terkini Desa Mantang
@endsection
@section('page_description')
Kabar Terkini Desa Mantang
@endsection
@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-8">
			<article>
				<div class="post-image">
					<div class="post-heading">
						<h3><% $data->judul %></h3>
						<h5><i class="fa fa-calendar"></i><a href="#"> <% $data->created_at %></a></h5>
					</div>
					<p>Tanggal Mulai Kegiatan : {!! $data->tanggal_mulai !!}, Tanggal Selesai Kegiatan : {!! $data->tanggal_selesai !!} </p>
					<img src="<%asset("uploads/coverKegiatan/".$data->cover)%>" alt="" class="img-responsive" />
				</div>

				<p>{!! $data->deskripsi !!}</p>
			</article>
		</div>
	</div>
</div>
@endsection