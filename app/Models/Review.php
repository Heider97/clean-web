<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'professional_id',
        'client_id',
        'request_id',
        'rating',
        'comment',
    ];

    public function professional()
    {
        return $this->belongsTo(User::class, 'professional_id');
    }

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function request()
    {
        return $this->belongsTo(Request::class, 'request_id');
    }
}
