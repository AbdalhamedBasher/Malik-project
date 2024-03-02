<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\items;
use App\Models\units;
use App\Models\qoutation_batch;

class qoutation_line extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function qoute_batch_items()
    {
        return $this->belongsTo(qoutation_batch::class,'qoute_batch');
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
