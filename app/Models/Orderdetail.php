<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderdetail extends Model
{
    use HasFactory;
    protected $table = 'orderdetails';

    protected $fillable = [
        'order_id', 'produk_id', 'qty','harga','diskon','amount'
    ];
}
