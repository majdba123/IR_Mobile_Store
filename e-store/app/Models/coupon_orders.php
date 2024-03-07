<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class coupon_orders extends Model
{
    use HasFactory;
    protected $fillable = ['coupon_id', 'order_id'];
    protected $keyType = 'string'; // Set the key type to UUID
    public $incrementing = false; // Disable auto-incrementing

    public function coupon()
    {
        return $this->belongsTo(coupon::class, 'coupon_id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public static function boot() {
        parent::boot();
        // Auto generate UUID when creating data User
        static::creating(function ($model) {
            $model->id = Str::uuid();
        });
    }
}
