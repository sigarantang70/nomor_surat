@extends('layout.master')
@section('content')

	    <h1>Data Siswa</h1>

	    @if(session('sukses'))
	    <div class="alert alert-success" role="alert">
		  	{{ session('sukses') }}
		</div>
		@endif

			<div class="row">
				<div class="col-12">
					<!-- Button trigger modal -->
					<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
					  Tambah Data
					</button>
				</div>
				<div>
					<table class="table">
						<tr>
							<th>Nama Depan</th>
							<th>Nama Belakang</th>
							<th>Jenis Kelamin</th>
							<th>Agama</th>
							<th>Alamat</th>
							<th>Aksi</th>
						</tr>
						@foreach($data_siswa as $siswa)
						<tr>
							<td>{{ $siswa->nama_depan }}</td>
							<td>{{ $siswa->nama_belakang }}</td>
							<td>{{ $siswa->jenis_kelamin }}</td>
							<td>{{ $siswa->agama }}</td>
							<td>{{ $siswa->alamat }}</td>
							<td>
								<a href="/siswa/{{ $siswa->id }}/edit" class="btn btn-info text-white">Edit</a>
								<a href="/siswa/{{ $siswa->id }}/delete" class="btn btn-danger text-white" onclick="return confirm('Apakah Anda Yakin ?')">Hapus</a>
							</td>
						</tr>
						@endforeach
					</table>
				</div>
			</div>
	    

		<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
			    <div class="modal-content">
				    <div class="modal-header">
				        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
				        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				      </div>
				    <form action="siswa/create" method="post">
				    {{ csrf_field() }}
				    <div class="modal-body">
						<div class="mb-3">
						    <label for="exampleInputEmail1" class="form-label">Nama Depan</label>
						    <input type="text" class="form-control" name="nama_depan">
						</div>
						<div class="mb-3">
						    <label for="exampleInputEmail1" class="form-label">Nama Belakang</label>
						    <input type="text" class="form-control" name="nama_belakang">
						</div>
						<div class="mb-3">
						    <label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>
						    <select class="form-control" name="jenis_kelamin">
						    	<option></option>
						    	<option>Laki Laki</option>
						    	<option>Perempuan</option>
						    </select>
						</div>
						<div class="mb-3">
						    <label for="exampleInputEmail1" class="form-label">Agama</label>
						    <input type="text" class="form-control" name="agama">
						</div>
						<div class="mb-3">
						    <label for="exampleInputEmail1" class="form-label">Alamat</label>
						    <input type="text" class="form-control" name="alamat">
						</div>
				    </div>
				    <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Simpan</button>
				    </div>
				    </form>
			    </div>
			</div>
		</div>

@endsection('content')