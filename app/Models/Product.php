<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'nama_produk',
        'kategori',
        'harga_beli',
        'harga_jual',
        'gambar',
    ];
}

