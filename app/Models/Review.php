<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Review extends Model
{

    use HasFactory; // Use the HasFactory trait for factory support

    // Define the table associated with the model if it's not the plural form of the model name
    protected $table = "reviews"; // Optional, only if your table name is not 'reviews'

    // Specify the fillable attributes
    protected $fillable = ["comment", "rating", "status", "user_id" , "product_id"];

    // Define any relationships, for example, if a review belongs to a user

     /**
     * Get the product that owns the review.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get the user that made the review.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
