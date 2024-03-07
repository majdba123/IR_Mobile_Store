<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Company;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mobolists', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->text('name');
            $table->text('resolution_pattern');
            $table->text('price');
            $table->text('display_pattern');
            $table->text('number_of_cameras_in_phone');
            $table->text('ppi_pattern');
            $table->text('inches_pattern');
            $table->text('camera_pattern');
            $table->text('capacity_pattern');
            $table->text('date');
            $table->text('chipset_pattern');
            $table->text('process_pattern');
            $table->text('processer_type');
            $table->text('gpu_pattern');
            $table->text('os');
            $table->text('space_limit_pattern');
            $table->text('UFS');
            $table->text('microsd_pattern');
            $table->text('speakers_pattern');
            $table->text('fingerprint_pattern');
            $table->text('other_sensors_pattern');
            $table->text('weight_pattern');
            $table->text('sim_pattern');
            $table->text('usb_pattern');
            $table->text('bluetooth_pattern');
            $table->text('refresh_rate_pattern');
            $table->foreignIdFor(Company::class)->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mobolists');
    }
};
