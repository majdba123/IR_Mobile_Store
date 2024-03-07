<?php

use App\Models\coupon;
use App\Models\Order;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('coupon_orders', function (Blueprint $table) {
            $table->uuid('id')->primary();

            // $table->foreignIdFor(coupon::class);
            $table->foreignIdFor(coupon::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            // $table->foreign('coupons_id')->references('id')->on('coupons');
            // $table->foreign('id')->references('id')->on('coupons')->constrained()->cascadeOnDelete()->cascadeOnUpdate();

            $table->foreignIdFor(Order::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupon_orders');
    }
};
