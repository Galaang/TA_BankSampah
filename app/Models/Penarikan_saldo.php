<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penarikan_saldo extends Model
{
    use HasFactory;
    protected $table = 'penarikan_saldos';
    protected $fillable = [
        'user_id',
        'nama',
        'no_hp',
        'jumlah_saldo',
        'status',
    ];

    public function user(){
        return $this->hasMany(User::class, 'id','user_id');
    }

    public function penarikan_dibatalkan()
    {
        $penarikan_saldo = Penarikan_saldo::all();
        foreach ($penarikan_saldo as $penarikan) {
            if($penarikan->status == 'Diproses'){
                $created = strtotime($penarikan->created_at) + (1);
                if($created < time()){
                    $penarikan->status = 'Dibatalkan';
                }
            }
        }
    }
}
