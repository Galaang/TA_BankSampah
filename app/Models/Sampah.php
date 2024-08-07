<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sampah extends Model
{
    use HasFactory;

    protected $table = 'sampah';
    protected $fillable = [
        'jenis_sampah',
        'nama_sampah',
        'harga_sampah',
        'foto_sampah',
    ];
}
