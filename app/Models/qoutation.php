<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\line;
use App\Models\qoutation_batch;
use App\Models\Customer;
class qoutation extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function qoute_batch()
    {
        return $this->hasMany(qoutation_batch::class, 'qoute');
    }
    // customer relation
    public function customers_data()
    {
        return $this->belongsTo(Customer::class, 'customer');
    }


}
