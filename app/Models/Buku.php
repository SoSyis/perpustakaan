<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    // Kolom yang bisa diisi (fillable)
    protected $fillable = [
        'judul',
        'penulis',
        'penerbit',
        'sinopsis',
        'jumlahHalaman',
        'kodeBuku',
        'gambar',    // Tambahkan ini
        'link_buku'  // Tambahkan ini
    ];
}