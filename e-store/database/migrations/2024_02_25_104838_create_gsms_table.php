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
        Schema::create('gsms', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->text('name_phone');
            $table->text('image_phone');
            $table->text('url_phone');
            $table->text('networt_technology');
            $table->text('sim');
            $table->text('demenation');
            $table->text('weight');
            $table->text('build');
            $table->text('size');
            $table->text('display');
            $table->text('resoulation');
            $table->text('chiapest');
            $table->text('cpu');
            $table->text('gpu');
            $table->text('camera');
            $table->text('camera_f');
            $table->text('feature_camera');
            $table->text('video');
            $table->text('sensores');
            $table->text('battarey');
            $table->text('charghing');
            $table->text('usb');
            $table->text('model');
            $table->text('price');
            $table->text('colores');
            $table->foreignIdFor(Company::class)->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gsms');
    }
};
