<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'iNo',
        'customer_id',
        'supplier_id',
        'category_id',
        'product_id',
        'qty',
        'totalPrice',
        'discount',
        'status'
    ];

    public function customer(){
        return $this->belongsTo('App\Models\Customer');
    }

    public function supplier(){
        return $this->belongsTo('App\Models\Supplier');
    }

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    public function product(){
        return $this->belongsTo('App\Models\Product');
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

}
