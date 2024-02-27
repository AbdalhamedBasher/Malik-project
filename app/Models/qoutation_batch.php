<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\qoutation_line;
use App\Models\line;
use App\Models\qoutation;
use App\Models\attachment;
class qoutation_batch extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function qoute_lines()
    {
        return $this->hasMany(qoutation_line::class, 'qoute_batch');
    }

    public function lines()
    {
        return $this->belongsTo(line::class, 'line');
    }
    public function qoutes()
    {
        return $this->belongsTo(qoutation::class, 'qoute');
    }
    // realtion for attachment
    public function attachment()
    {
        return $this->hasMany(attachment::class, 'qoute_batch');
    }

}
