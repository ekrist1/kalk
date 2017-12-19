<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Review;
use App\Category;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function create($slug) {
        $product = Product::where('slug', $slug)->first();
        return view('layouts.calc.review.create', compact('product'));
    }

    public function store(Request $request, $slug) {

        $product = Product::where('slug', $slug)->first();

         $request->validate([
            'score' => 'required|integer',
            'body' => 'required',
        ]);

        $review = $product->reviews()->create([
            'body' => $request->input('body'),
            'score' => $request->input('score'),
            'user_id' => Auth::id()
        ]);

        return redirect(route('showproduct', ['slug' => $product->slug]))->with('status', 'Din produktvurdering ble lagt inn');;
    }
}
