<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function member()
    {
        return $this->hasMany(Member::class);
    }

    public function kpi()
    {
        return $this->hasMany(KPI::class);
    }
}
