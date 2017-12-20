<?php

namespace App\Http\Controllers;

use App\Product;
use App\Review;
use App\Image;
use App\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request) {
        $categories = Category::all();
        $request->validate([
            'keyword' => 'max:100|string',
            'category' => 'max:100|string'
        ]);
        if ($request->has('keyword') || $request->has('category')) {
            $products = Product::with('category')->getScoreCount()->searchProducts($request->query())->paginate(18);
            return view('layouts.calc.product.index', compact('products', 'categories'));
        }
        $products = Product::with('category')->getScoreCount()->paginate(18);
        //dd($products);
        return view('layouts.calc.product.index', compact('products', 'categories'));

    }
    public function show($slug) {

        $product = Product::where('slug', $slug)->with('images')->getScoreCount()->first();

        if (count($product->reviews) >= 1) {
            $averageReviewScore = round($product->reviews->sum('score') / count($product->reviews), '1', PHP_ROUND_HALF_DOWN);
        } else {
            $averageReviewScore = 0;
        }

        if ($product->images->isNotEmpty()) {
            $images = $product->images->pluck('name');
        }
        else {
            $images = collect(['/storage/productimages/noimage.png']);
        }

        return view('layouts.calc.product.show', compact('product', 'images', 'averageReviewScore'));
    }
}
