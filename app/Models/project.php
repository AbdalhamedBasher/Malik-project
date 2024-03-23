<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\qoutation;
use App\Models\Customer;
class project extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function qoute_project()
    {
        return $this->hasMany(qoutation::class, 'id', 'project');
    }
    public function customers_data()
    {

        return $this->belongsTo(Customer::class, 'customer');
    }
}
