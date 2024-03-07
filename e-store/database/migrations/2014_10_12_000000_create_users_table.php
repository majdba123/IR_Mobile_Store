<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone')->nullable()->default('000-000-0000');
            $table->string('Nationality')->nullable()->default('none');
            $table->string('Type_of_user')->default(0);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
        DB::table('users')->insert([
            [

                'name' => 'robert',
                'phone' => '000-000-0000',
                'Nationality' => 'none',
                'Type_of_user' => 1 ,
                'email' => 'admin@gmail.com',
                'password' => bcrypt('12345678'),
                'email_verified_at'=> now()
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
