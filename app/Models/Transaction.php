<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'user_id',
        'service_id',
        'message',
        'total_price',
        'date_start',
        'date_end',
        'status',
        'payment_image',
    ];

}
