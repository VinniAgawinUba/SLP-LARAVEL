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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 191);
            $table->string('slug', 191);
            $table->text('description');
            $table->string('meta_title,', 191);
            $table->text('meta_description');
            $table->string('meta_keyword', 191);
            $table->boolean('navbar_status')->default(false);
            $table->boolean('stats')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
