<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaksi extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'transaksis_id',
        'produks_id',
        'nama',
        'harga',
        'satuan',
        'gambar',
        'qty',
    ];

    protected $dates = ["deleted_at"];
}
