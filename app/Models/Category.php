<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_categories', 'category_id', 'book_id');
    }
}
