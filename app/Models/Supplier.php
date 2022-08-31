<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getTelephoneAttribute($value){
        return ('0'.$value);
    }

    public function getAddressAttribute($value){
        if($value){
            return $value;
        } else {
            return ("No address");
        }
    }
}
