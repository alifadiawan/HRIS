<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tranksaksi extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class);
    }

    public function transaksi_detail()
    {
        return $this->hasMany(TransaksiDetail::class);
    }
}
