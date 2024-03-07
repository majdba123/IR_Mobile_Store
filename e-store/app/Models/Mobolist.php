<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Mobolist extends Model
{
    use HasFactory;
    protected $keyType = 'string'; // Set the key type to UUID
    public $incrementing = false; // Disable auto-incrementing
    protected $fillable = [
        'name',
        'resolution_pattern',
        'price',
        'display_pattern',
        'number_of_cameras_in_phone',
        'ppi_pattern',
        'inches_pattern',
        'camera_pattern',
        'capacity_pattern',
        'date',
        'chipset_pattern',
        'process_pattern',
        'processer_type',
        'gpu_pattern',
        'os',
        'space_limit_pattern',
        'UFS',
        'microsd_pattern',
        'speakers_pattern',
        'fingerprint_pattern',
        'other_sensors_pattern',
        'weight_pattern',
        'sim_pattern',
        'usb_pattern',
        'bluetooth_pattern',
        'refresh_rate_pattern',
        'company_id',
    ];

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
