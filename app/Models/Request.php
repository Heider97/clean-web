<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'order',
        'address',
        'latitude',
        'longitude',
        'description',
        'status',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($request) {
            // Generate a unique random number
            do {
                $orderNumber = mt_rand(10000000, 99999999); // 8-digit random number
            } while (self::where('order', $orderNumber)->exists());

            $request->order = $orderNumber;
        });
    }

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }
}
