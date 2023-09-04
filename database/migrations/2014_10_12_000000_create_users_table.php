<?php

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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('user_role', ['admin', 'user'])->default('user');
            $table->enum('user_type', ['user', 'organization'])->default('user');
            $table->enum('blood_type', ['A-', 'A+', 'B-', 'B+', 'AB-', 'AB+', 'O-', 'O+'])->default(null);
            $table->enum('province', ["Aleppo","Damascus","Daraa","Deir ez-Zor","Hama","Hasakah","Homs","Idlib","Latakia","Quneitra","Raqqa","Rif Dimashq","Tartus","Suwayda"])->default(null);
            $table->text('location')->default(null);
            $table->string('phone_number')->default(null);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
