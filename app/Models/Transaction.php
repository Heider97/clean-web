<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'request_id',
        'client_id',
        'professional_id',
        'amount',
        'payment_method',
        'status',
    ];

    public function request()
    {
        return $this->belongsTo(Request::class, 'request_id');
    }

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function professional()
    {
        return $this->belongsTo(User::class, 'professional_id');
    }
}
