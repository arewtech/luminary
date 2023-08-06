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

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // set status
    public function setStatusRentLog()
    {
        if ($this->actual_return_date == null) {
            return 'not returned';
        } else {
            if ($this->actual_return_date > $this->return_date) {
                return 'late';
            } else {
                return 'returned';
            }
        }
    }

    public function setColorTable()
    {
        if ($this->actual_return_date == null) {
            return '';
        } else {
            if ($this->actual_return_date > $this->return_date) {
                return 'table-danger';
            } else {
                return 'table-success';
            }
        }
    }
    // cara panggilnya di view bagaimana?
    // $rentLog->setStatusRentLog()
}
