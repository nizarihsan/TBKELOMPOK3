<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuctionItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id', // Add category_id to fillable properties
        'name',
        'description',
        'image_url',
        'starting_price', // Add category_id to fillable fields
        'price',
        'status',
        'brand',
        'weight',
        'image_path' // for future image upload
    ];

    /**
     * Get the bids for the auction item.
     */
    public function bids()
    {
        return $this->hasMany(Bid::class);
    }

    /**
     * Get the category that owns the auction item.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
