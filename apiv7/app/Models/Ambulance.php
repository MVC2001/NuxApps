<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ambulance extends Model
{
    use HasFactory;

      protected $fillable =
     [
        'category',
         'brand',
         'price',
        'amblnc_number',
        'route',
        'price',
        'image'

    ];
}
