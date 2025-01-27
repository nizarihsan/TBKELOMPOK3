<?php

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Item extends Model
{
    protected $fillable = [
        'name',
        'description',
        'starting_price',
        'starting_price',
        'status',
        'brand',
        'weight',
        'category_id',
        'image_path' // for future image upload
    ];
    

    // ...existing code...
}
