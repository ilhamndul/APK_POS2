<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';

    protected $fillable = [
        'user_id',
        'jenis_id', // 1. Tambahkan jenis_id agar bisa diisi
        'foto',
        'nama',
        'harga_beli',
        'harga_jual',
        'stok'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // 2. Tambahkan relasi ke model Jenis
    public function jenis()
    {
        return $this->belongsTo(Jenis::class, 'jenis_id');
    }

    public function itemPenjualan()
    {
        return $this->hasMany(itemPenjualan::class, 'role_id');
    }
}