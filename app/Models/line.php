<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\qoutation_batch;
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
        // function for qoutation batch
        public function qoute_batch()
        {
            return $this->hasMany(qoutation_batch::class, 'line');
        }
        // scop for qoute batch with child lines


}

// 'validator ' => 'json',

