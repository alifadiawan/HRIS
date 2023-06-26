<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;

    public function kpi()
    {
        return $this->hasMany(KPI::class);
    }

    public function member()
    {
        return $this->hasMany(Member::class);
    }
}
