<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentLog extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'book_id',
        'rent_date',
        'return_date',
        'actual_return_date',
        'status',
        'fine',
    ];

    public function books()
    {
        return $this->belongsTo(Book::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }

}
