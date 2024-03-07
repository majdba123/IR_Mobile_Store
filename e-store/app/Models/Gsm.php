<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Gsm extends Model
{
    use HasFactory;
    protected $fillable=['name_phone','image_phone','url_phone','networt_technology','sim','demenation','weight'
    ,'build','size','display','resoulation','chiapest'
    ,'cpu','gpu','camera','camera_f','feature_camera'
    ,'video','sensores','battarey','charghing','usb','model'
    ,'price','colores','company_id'];
    protected $keyType = 'string'; // Set the key type to UUID
    public $incrementing = false; // Disable auto-incrementing

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
    public static function boot() {
        parent::boot();
        // Auto generate UUID when creating data User
        static::creating(function ($model) {
            $model->id = Str::uuid();
        });
    }

}
