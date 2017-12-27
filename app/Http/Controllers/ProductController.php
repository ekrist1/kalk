<?php

namespace App\Http\Controllers;

use App\Product;
use App\Review;
use App\Image;
use Spatie\Image\Image as SpatieImage;
use App\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
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
        $products = Product::with('category', 'images')->getScoreCount()->paginate(18);

        return view('layouts.calc.product.index', compact('products', 'categories'));

    }
    public function show($slug) {

        $product = Product::where('slug', $slug)->with('images')->getScoreCount()->firstOrFail();

        if (count($product->reviews) >= 1) {
            $averageReviewScore = round($product->reviews->sum('score') / count($product->reviews), '1', PHP_ROUND_HALF_DOWN);
        } else {
            $averageReviewScore = 0;
        }

        if ($product->images->isNotEmpty()) {
            $images = $product->images->map(function ($item, $key) {
                return '/storage/' . $item['name'];
            });
        }
        else {
            $images = collect(['/storage/productimages/noimage.png']);
        }

        return view('layouts.calc.product.show', compact('product', 'images', 'averageReviewScore'));
    }

    public function create() {

        $categories = Category::all();
        return view('layouts.admin.product.create', compact('categories'));
    }

    public function edit($slug) {

        $product = Product::where('slug', $slug)->with('images')->first();
        $categories = Category::all();
        return view('layouts.admin.product.edit', compact('categories', 'product'));

    }

    public function store(Request $request) {

        $request->validate([
            'name' => 'required|unique:products|max:255',

        ]);

        $product_slug = str_slug($request->name);

        $product = Product::create([
            'name' => $request->name,
            'body' => $request->body,
            'slug' => $product_slug,
            'category_id' => $request->category,
            'is_active' => $request->has('is_active') ? true : false,
            'is_featured' => $request->has('is_featured') ? true : false,
        ]);

        if ($request->has('images')) {

            $files = $request->file('images');

            foreach ($files as $file) {
                $filename = Storage::disk('public')->putFile('productimages', $file, 'public');
                $images = $product->images()->create([
                    'name' => $filename,
                ]);

                SpatieImage::load(public_path('/storage/') . $filename)
                    ->quality(80)
                    ->width(640)
                    ->save();
            }
        }

        return redirect(route('createProduct'))->with('status', 'Ble opprettet');
    }

    public function update(Request $request, $slug) {
        $request->validate([
            'name' => 'required|max:255',

        ]);

            $product = Product::where('slug', $slug)->first();

            $product->name = $request->name;
            $product->body = $request->body;
            $product->category_id = $request->category;
            $product->is_active = $request->has('is_active') ? true : false;
            $product->is_featured = $request->has('is_featured') ? true : false;

            $product->save();

        if ($request->has('images')) {

            $files = $request->file('images');

            foreach ($files as $file) {
                $filename = Storage::disk('public')->putFile('productimages', $file, 'public');
                $images = $product->images()->create([
                    'name' => $filename,
                ]);

                SpatieImage::load(public_path('/storage/') . $filename)
                    ->quality(80)
                    ->width(640)
                    ->save();
            }
        }

        return redirect(route('createProduct'))->with('status', 'Ble oppdatert');
    }
}
