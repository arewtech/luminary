<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeSearch($query, $search)
    {
        $query->where('title', 'like', "%{$search}%")
            ->orWhere('author', 'like', "%{$search}%");
    }

    public function setStatusBooks()
    {
        if ($this->status == 'available') {
            return 'bg-success';
        } elseif ($this->status == 'unavailable') {
            return 'bg-warning';
        } else {
            return 'bg-danger';
        }
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'book_categories', 'book_id', 'category_id');
    }

    public function rentLogs()
    {
        return $this->hasMany(RentLog::class);
    }
}
