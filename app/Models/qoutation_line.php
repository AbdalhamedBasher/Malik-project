<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\items;
use App\Models\units;

class qoutation_line extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function qoute_batch()
    {
        return $this->hasMany(qoutation_line::class,'qoute_batch');
    }
    // items realtion
    public function items()
    {
        return $this->belongsTo(items::class, 'item');
    }
    // unit realtion
    public function units()
    {
        return $this->belongsTo(units::class, 'unit');
    }
}
