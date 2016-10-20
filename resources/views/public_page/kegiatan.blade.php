@extends('layouts.public_layout')
@section('title')
Kabar Terkini Desa Mantang
@endsection
@section('page_description')
Kabar Terkini Desa Mantang
@endsection
@section('content')
@foreach($data as $dt)
<div class="post-preview">
    <a href="<% url('/kegiatan/'.$dt->id) %>" >
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