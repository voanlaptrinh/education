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
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('image')->nullable();
            $table->string('gender')->nullable();
            $table->string('birthday')->nullable();
            $table->string('address')->nullable();
            $table->string('money')->nullable();
            $table->integer('user_type')->nullable(); //phân quyền
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('sort_order')->nullable();
            $table->integer('create_by')->default(1)->nullable();
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
