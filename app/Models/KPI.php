<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KPI extends Model
{
    use HasFactory;
    protected $guarded=[];


    public function mapping()
    {
        return $this->belongsToMany(Member::class, 'kpi_mapping', 'kpi_id', 'employee_id');
    }
}
