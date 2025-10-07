<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{   

    protected $timstamps = true;
    
    protected $fillable = ['name', 'description'];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    protected $table = 'products';
}
