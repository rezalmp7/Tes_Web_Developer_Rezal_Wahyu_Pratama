<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produk extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nama',
        'stok',
        'harga',
        'satuan',
        'gambar',
        'description',
    ];

    protected $dates = ["deleted_at"];
}
