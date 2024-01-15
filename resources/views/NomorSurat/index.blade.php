@extends('layout.master')
@section('content')
<h1 class="text-center">
	Agenda Nomor Surat
</h1>

<a href="" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#tambahNomor">Tambah Data</a>

<div class="card">
	<div class="card-body">

		@if(session('sukses') == 'ya')
	    <div class="alert alert-success" role="alert">
		  	<strong>{{ session('pesan') }}</strong>
		  	<ul>
		  		<li><strong>Perihal</strong> : {{  session('perihal') }}</li>
		  		<li><strong>Nomor Surat</strong> : {{ session('nomor_surat') }}</li>
		  	</ul>
		</div>
		@elseif(session('sukses') == 'tidak')
	    <div class="alert alert-danger" role="alert">
		  	<strong>{{ session('pesan') }}</strong>
		</div>
		@endif

		<div class="table-responsive p-2">
			<table class="table table-hover table-bordered table-striped" id="datatables">
				<thead class="table-active">
					<tr class="text-center">
						<th width="5%">No</th>
                        <th width="10%">Tanggal</th>
                        <th width="8%">Nomor</th>
                        <th width="8%">Sub Nomor</th>
                        <th>Perihal</th>
                        <th width="15%">Unit</th>
                        <th width="10%">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$no = 1;
					?>
					@foreach($nomor_surat as $nomor_surat)
					<tr>
						<td>{{ $no }}</td>
						<td>{{ $nomor_surat->tgl_surat }}</td>
						<td>{{ $nomor_surat->nomor_surat }}</td>
						<td>{{ $nomor_surat->sub_nomor_surat }}</td>
						<td>{{ $nomor_surat->perihal }}</td>
						<td></td>
						<td>
							<a href="" class="btn btn-sm btn-success">Detail</a>
						</td>
					</tr>
					<?php
						$no++;
					?>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="modal" id="tambahNomor" tabindex="-1">
	<div class="modal-dialog">
	    <div class="modal-content">
		      	<div class="modal-header">
			        <h5 class="modal-title fw-bold">Ambil Nomor Surat</h5>
			        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		      	</div>

		      	<form action="{{ url('/nomor_surat_tambah') }}" method="POST">
		      	{{ csrf_field() }}
			      	<div class="modal-body">
			      		<div class="col-12">
			      			<label>Tanggal Surat</label>
			        		<input type="date" class="form-control" name="tgl_surat" value="<?php echo date('Y-m-d') ?>">
			        		<input type="hidden" class="form-control" name="tgl_permintaan" readonly value="<?php echo date('Y-m-d') ?>">
			      		</div>

			      		<div class="col-12 mt-3">
			      			<label>Perihal Surat*</label>
			      			<textarea onblur="checkLength(this)" class="form-control" name="perihal" required></textarea>
			      		</div>

			      		<div class="col-12 mt-3">
							<label>Unit</label>
							<select name="unit" class="form-control">
								<option></option>
							    <option></option>
							</select>
						</div>						

			      	</div>
			      	<div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
				        <button type="submit" class="btn btn-primary" name="aksi" value="simpan">Simpan</button>
			      	</div>
		      	</form>
	    </div>
  	</div>
</div>

@endsection()