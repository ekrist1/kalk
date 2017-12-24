<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use MongoDB\Driver\Query;

class Product extends Model
{
    protected $guarded = ['id'];

    public function reviews() {
        return $this->morphMany('App\Review', 'reviewable');
    }
    public function images() {
        return $this->morphMany('App\Image', 'imageable');
    }
    public function category() {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function scopeSearchProducts($query, $searchQuery) {


        if (array_has($searchQuery, 'keyword')) {
            $query->where('name', 'LIKE', '%' . $searchQuery['keyword'] . '%');
        }
        if (array_has($searchQuery, 'category')) {
            $query->whereHas('category', function ($query) use ($searchQuery) {
                $query->where('name', 'LIKE', $searchQuery['category']);
            });
        }
        return $query;
    }
    public function scopeGetScoreCount($query) {
        return $query->withCount([
            'reviews',
            'reviews as review_happy_count' => function ($query) {
                $query->where('score', 5);
            },
            'reviews as review_neutral_count' => function ($query) {
                $query->where('score', 3);
            },
            'reviews as review_dissatisfied_count' => function ($query) {
                $query->where('score', 1);
            }

        ]);
    }
}
