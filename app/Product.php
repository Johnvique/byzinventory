<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'category_name',
        'unit',
        'quantity',
        'cost',
        'image',
        'sell',
        'code',
        'tax_rate',
        'ware_house',
        'details',
        'invoice_details'
    ];
}

