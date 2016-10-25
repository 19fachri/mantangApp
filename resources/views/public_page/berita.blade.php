@extends('layouts.public_layout')
@section('title')
Berita Terkini Desa Mantang
@endsection
@section('page_description')
Ketahui berita terbaru seputar Desa Mantang
@endsection
@section('page_cover')
<% asset('uploads/cover/'.$data[0]->cover) %>
@endsection
@section('content')
@foreach($data as $dt)
<div class="post-preview">
    <a href="<% url('/berita/'.$dt->id) %>" >
        <h2 class="post-title">
            <% $dt->judul %>
        </h2>
        <h3 class="post-subtitle">
            {!! substr($dt->deskripsi, 0, 200) !!}... Baca Selengkapnya
        </h3>
    </a>
</div>
<hr>
@endforeach
@endsection