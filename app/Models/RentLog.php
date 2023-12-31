<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class RentLog extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'user_id',
        'book_id',
        'rent_date',
        'return_date',
        'actual_return_date',
        'status',
        'fine',
    ];

    protected $casts = [
        'rent_date' => 'datetime',
        'return_date' => 'datetime',
        'actual_return_date' => 'datetime',
    ];

    public function scopeSearch($query, $search)
    {
        $query->with(['book', 'user'])
        ->whereHas('user', function ($query) use ($search) {
            $query->where('name', 'like', "%{$search}%");
        })->orWhereHas('book', function ($query) use ($search) {
            $query->where('title', 'like', "%{$search}%");
        });
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // set status rent log
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

    // set color table
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

    // set color activity
    public function setColorActivity()
    {
        if ($this->actual_return_date == null) {
            return 'text-warning';
        } else {
            if ($this->actual_return_date > $this->return_date) {
                return 'text-danger';
            } else {
                return 'text-success';
            }
        }
    }

    // set returned
    public function setReturned()
    {
        if ($this->actual_return_date == null) {
            return '🧾';
        } else {
            if ($this->actual_return_date > $this->return_date) {
                return formatRupiah($this->fine);
            } else {
                return '✅';
            }
        }
    }
    // $yourVariable->setStatusRentLog()
}