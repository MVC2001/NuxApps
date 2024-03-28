<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

     protected $fillable = [

     'amblnc_number',
         'brand',
         'route',
         'price',
        'clientName',
        'address',
        'phone',
        'accountNo',
        'payMethod',
         'amount',
         'confirm'
     ];
}
