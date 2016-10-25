@extends('layouts.public_layout')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<a href="<%URL::to('suararakyat/create')%>" class="btn btn-success btn-sm">
				<span class="glyphicon glyphicon-plus" aria-hidden="true">Suara Rakyat</span>
			</a>
		</div>
		<br>
	</div>
    <div class="row">
    	<div class="col-md-8">
    	<div>
    		@foreach($data as $dt)
    			<h2><%$dt->judul%></h2>
    			<h4><%$dt->nama%> - <%$dt->alamat%></h4>
    			<p><img src="<% asset("suara_rakyat/img/".$dt->foto.".JPG")%>" style="width: 300px;height;100%;"></p>
    			<p><%$dt->deskripsi%> - <a href="<?php echo url('suararakyat/'.$dt->id);?>">Lihat Selengkapnya</a></p>
    			@if(Auth::user() != NULL)
					<form method="POST" action="<%URL::to('suararakyat/'.$dt->id)%>">
					{!! csrf_field() !!}
						<input name="_method" type="hidden" value="DELETE">
						<button type="submit" class="btn btn-danger btn-sm">
							<span class="glyphicon glyphicon-trash" aria-hidden="true"></span> 
						</button>
					</form>
					@endif
    			<hr>
    		@endforeach
    	</div>
	    </div>
	</div>
</div>
@endsection
