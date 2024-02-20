<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class line extends Model
{
    use HasFactory;
    protected $guarded = [];

        public function main_lines()
        {
            return $this->belongsTo(line::class, 'main_line');
        }
        public function child_lines()
        {
            return $this->hasMany(line::class, 'main_line');
        }
        public function item_lines()
        {
            return $this->hasMany(items::class, 'line');
        }
}
// 'validator ' => 'json',

