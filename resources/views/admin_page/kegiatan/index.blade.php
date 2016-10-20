@extends('layouts.admin_layout')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-offset-1">
			<a href="<%URL::to('admin/kegiatan/create')%>" class="btn btn-success btn-sm">
				<span class="glyphicon glyphicon-plus" aria-hidden="true"> Buat Kegiatan Baru</span>
			</a>
		</div>
		<br>
	</div>
    <div class="row">
    	<div class="col-md-12">
    		<table class="table table-hover">
				<tr>
					<th>No</th>
					<th>Judul</th>
					<th>Created at</th>
					<th>Tanggal Mulai</th>
					<th>Tanggal Selesai</th>
					<th>Edit</th>
					<th>Delete</th>
                </tr>
                <?php $no = 1; ?>
                @foreach($data as $dt)
                <tr>
					<td><%$no%></td>
					<td><%$dt->judul%></td>
					<td><%$dt->created_at%></td>
					<td><%$dt->tanggal_mulai%></td>
					<td><%$dt->tanggal_selesai%></td>
					<td>
					<a href="<%URL::to('admin/kegiatan/'.$dt->id.'/edit')%>" class="btn btn-success btn-sm">
						<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
					</a>
					</td>
					<td>
					<form method="POST" action="<%URL::to('admin/kegiatan/'.$dt->id)%>">
						{!! csrf_field() !!}
						<input name="_method" type="hidden" value="DELETE">
						<button type="submit" class="btn btn-danger btn-sm">
							<span class="glyphicon glyphicon-trash" aria-hidden="true"></span> 
						</button>
					</form>
					</td>
                </tr>
                <?php $no++; ?>
                @endforeach
			</table>
	    </div>
	</div>
</div>
@endsection
