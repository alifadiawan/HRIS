<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class Progress extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function tasks(){
        return $this->belongsTo(Task::class);
    }
}
