<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Product extends Model
{
    protected $table = 'wishlist_products';

    protected $fillable = [
        'id_wishlist',
        'product_name',
        'product_description'
    ];
}
