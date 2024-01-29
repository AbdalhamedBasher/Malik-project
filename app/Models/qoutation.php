<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class qoutation extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function qoute_lines()
    {
        return $this->hasMany(qoutation_line::class, 'id', 'qoute');
    }
    public function lines()
    {
        return $this->belongsTo(line::class, 'line', 'id');
    }
}
