<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory; // Use the HasFactory trait for factory support

    // Define the table associated with the model if it's not the plural form of the model name
    protected $table = "products"; // Optional, only if your table name is not 'products'

    // Specify the fillable attributes
    protected $fillable = ["name", "description", "price", "stock" , 'status', 'status_updated_at'];

    // Define any relationships, for example, if a product belongs to a category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // If a product has many order items
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * Get the reviews of the product.
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    /**
     * Get the user that added the product.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // You may include other methods and scopes as needed
}
