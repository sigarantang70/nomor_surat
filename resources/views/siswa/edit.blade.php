@extends('layout.master')
@section('content')

		    <h1>Update Data Siswa</h1>

			<form action="/siswa/{{$siswa->id}}/update" method="post">
				{{ csrf_field() }}
				<div class="modal-body">
					<div class="mb-3">
					    <label for="exampleInputEmail1" class="form-label">Nama Depan</label>
					    <input type="text" class="form-control" name="nama_depan" value="{{ $siswa->nama_depan }}">
					</div>
					<div class="mb-3">
					    <label for="exampleInputEmail1" class="form-label">Nama Belakang</label>
					    <input type="text" class="form-control" name="nama_belakang" value="{{ $siswa->nama_belakang }}">
					</div>
					<div class="mb-3">
					    <label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>
					    <select class="form-control" name="jenis_kelamin">
					    	<option @if($siswa->jenis_kelamin == 'Laki Laki') selected @endif>Laki Laki</option>
					    	<option @if($siswa->jenis_kelamin == 'Perempuan') selected @endif>Perempuan</option>
					    </select>
					</div>
					<div class="mb-3">
					    <label for="exampleInputEmail1" class="form-label">Agama</label>
					    <input type="text" class="form-control" name="agama" value="{{ $siswa->agama }}">
					</div>
					<div class="mb-3">
					    <label for="exampleInputEmail1" class="form-label">Alamat</label>
					    <input type="text" class="form-control" name="alamat" value="{{ $siswa->alamat }}">
					</div>
				</div>

				<button type="submit" class="btn btn-primary">Simpan</button>
			</form>

@endsection('content')