<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function kpi()
    {
        return $this->belongsTo(KPI::class, 'kpi_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }

    public function owner()
    {
        return $this->belongsTo(Member::class, 'owner_id');
    }

    public function tipe_progress()
    {
        return $this->belongsTo(TipeProgress::class, 'tipe_id');
    }
}
