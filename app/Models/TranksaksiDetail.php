<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TranksaksiDetail extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }

    public function pembayaran()
    {
        return $this->belongsTo(Pembayaran::class);
    }
}
