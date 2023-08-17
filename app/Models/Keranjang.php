<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Keranjang extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "produks_id",
        "qty",
        "users_id",
    ];

    protected $dates = ["deleted_at"];
}
