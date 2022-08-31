<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function supplier(){
        return $this->belongsTo('App\Models\Supplier');
    }

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }
}
