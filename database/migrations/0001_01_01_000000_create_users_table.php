<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
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
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->string('auth_role')->default('user');
            $table->string('google_id')->nullable();
            $table->string('password_reset_token')->nullable();
            $table->timestamp('password_reset_at')->nullable();
        });

        // Insert multiple users with different authentication roles
        DB::table('users')->insert([
            ['name' => 'User', 'email' => 'user@example.com', 'password' => bcrypt('userpassword'), 'auth_role' => 'user'],
            ['name' => 'Super', 'email' => 'super@example.com', 'password' => bcrypt('superpassword'), 'auth_role' => 'super'],
            ['name' => 'Admin', 'email' => 'admin@example.com', 'password' => bcrypt('adminpassword'), 'auth_role' => 'admin'],
          
        ]);
        

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
