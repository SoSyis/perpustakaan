@extends('layouts.admin') <!-- Pastikan extend ke layout admin -->

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Dashboard {{ Auth::user()->role }}</h3>
    </div>
    <div class="card-body">
        <p>Selamat datang di panel {{ Auth::user()->role }}!</p>
    </div>
</div>
@endsection