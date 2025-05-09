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
<div class="alert alert-success mt-3">
    <strong>Semangat, {{ Auth::user()->role }}!</strong><br>
    Tugas yang kamu jalankan hari ini bukan hanya tentang menyelesaikan pekerjaan, tetapi tentang memberikan dampak positif bagi banyak orang. 
    Walaupun tidak selalu terlihat, setiap langkah kecilmu—mulai dari mencatat data, membantu pengguna, hingga menjaga ketertiban sistem—adalah bukti tanggung jawab dan kepedulianmu.
    Teruslah berkontribusi dengan hati yang tulus dan semangat yang tidak padam. Karena peran seorang <strong>{{ Auth::user()->role }}</strong> seperti kamu sangat berarti dalam menciptakan lingkungan yang lebih baik dan tertib. 
    Jangan pernah meremehkan apa yang kamu lakukan, karena di balik layar ada banyak kebaikan yang tercipta berkatmu.
</div>

@endsection