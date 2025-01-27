<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    /**
     * Get the auction items for the category.
     */
    public function auctionItems()
    {
        return $this->hasMany(AuctionItem::class);
    }
}
