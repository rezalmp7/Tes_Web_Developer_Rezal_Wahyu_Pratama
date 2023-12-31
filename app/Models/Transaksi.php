<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaksi extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'users_id',
        'users_nama',
        'status',
        'tgl_transaksi'
    ];

    protected $dates = ["deleted_at"];
}
