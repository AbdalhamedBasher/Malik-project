<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function qoute_project()
    {
        return $this->hasMany(qoutation::class, 'id', 'project');
    }
}
