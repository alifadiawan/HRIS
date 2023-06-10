<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ewallet extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class);
    }
}
