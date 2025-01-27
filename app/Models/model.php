<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'price', 'starting_price', 'status', 'brand', 'weight', 'category_id', 'image_path'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
