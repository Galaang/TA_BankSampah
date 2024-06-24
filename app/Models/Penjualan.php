<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $table = 'penjualans';
    protected $fillable = [
        'user_id',
        'name',
        'jenis_sampah',
        'nama_sampah',
        'berat_sampah',
        'harga_total',
    ];

    public function user(){
        return $this->hasMany(User::class, 'id','user_id');
    }
}
