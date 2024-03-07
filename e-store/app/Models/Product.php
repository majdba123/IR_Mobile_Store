<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Concerns\HasUuids;


class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'id', 'mobile_name', 'Cpu_spsecfication', 'Gpu_spsecfication', 'battery_spsecfication', 'Front_camera_spsecfication', 'Back_camera_spsecfication', 'Screen_Size', 'Type_of_charge', 'Price', 'imge', 'company_id', 'category_id', 'offer_id'
    ];
    protected $keyType = 'string'; // Set the key type to UUID
    public $incrementing = false; // Disable auto-incrementing

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function offer()
    {
        return $this->belongsTo(offer::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function ratings()
    {
        return $this->hasMany(RateProduct::class);
    }
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'pivot_order_products')->withPivot('quantity');
    }

    public static function boot() {
        parent::boot();
        // Auto generate UUID when creating data User
        static::creating(function ($model) {
            $model->id = Str::uuid();
        });
    }

}
