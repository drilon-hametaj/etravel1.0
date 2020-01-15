<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Wishlist extends Model
{
    protected $table = 'wishlist';

    protected $fillable = [
        'id_user',
        'name'
    ];
}
