@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Edit Petugas</h2>
    <form action="{{ route('admin.petugas.update', $petugas->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ $petugas->nama }}" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ $petugas->email }}" required>
        </div>
        <div class="mb-3">
            <label>Password (Kosongkan jika tidak diubah)</label>
            <input type="password" name="password" class="form-control">
        </div>
        <button type="submit" class="btn btn-warning">Update</button>
    </form>
</div>
@endsection