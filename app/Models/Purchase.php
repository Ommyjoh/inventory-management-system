<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'supName',
        'catName',
        'prodName',
        'qty',
        'pNo',
        'totalPrice',
        'discount',
        'status'
    ];
}
