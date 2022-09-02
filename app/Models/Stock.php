<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_id',
        'category_id',
        'product_id',
        'in_qty',
        'out_qty',
        'in_qty',
        'stock',
    ];

    public function supplier(){
        return $this->belongsTo('App\Models\Supplier');
    }

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    public function product(){
        return $this->belongsTo('App\Models\Product');
    }

}
