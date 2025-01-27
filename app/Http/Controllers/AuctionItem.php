<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuctionItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'starting_bid',
        'current_bid',
        'image',
        'category_id',
        // other fields...
    ];

    public function bids()
    {
        return $this->hasMany(Bid::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
