<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests\ReviewRequest;
use Carbon\Carbon;


class ProductController extends Controller
{
    public function __construct()
{
        $this->middleware('auth');

       
}

    public function show($id)
    {   
    	$user_id = Auth::user()->id;
        $product = Product::findOrFail($id); // Retrieve product by ID
        $review = Review::where('product_id' , $id )->where('user_id' , $user_id)->first(); // Return the review of product wich has product_id and user_id
        return view("products.show", compact("product" ,'review')); // Return the view with the product and review
    }


    public function reviewstore(ReviewRequest $request){

        $reviewData = $request->validated(); // validate form using ReviewRequest
    	
    	$user_id = Auth::user()->id; // get id of user that has logged
        
        $review = Review::where('product_id' , $request->product_id)->where('user_id' , $user_id)->first(); // Return the review of product wich has product_id and user_id


        if ($review) {   // if review exists

            $review->comment= $request->comment; // update comment to review
            $review->rating = $request->rating; // update rating to review
        }

        else {
        $review = new Review();   // create new review
        $review->product_id = $request->product_id; // save product id 
        $review->comment= $request->comment;  //add comment to review
        $review->rating = $request->rating;   //add rating to review
        $review->user_id = Auth::user()->id;  // save user id 
        }

        
        
       
        $review->save(); // save review
        return redirect()->back();
    }


     public function UpdateStatus($id)
    {   

        $product = Product::findOrFail($id); // Retrieve product by ID

        if($product->status == 'Active') {

            $product->status = 'InActive' ; // change product status to InActive

        }

        else {

            $product->status = 'Active' ; // change product status to Active
        }

        $product->status_updated_at = Carbon::now();  //  update current date and time to product
        $product->save(); // save product

       

    }

}
