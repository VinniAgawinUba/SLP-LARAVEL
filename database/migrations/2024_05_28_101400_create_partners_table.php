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
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->string('name', 191);
            $table->string('logo_image', 191);
            $table->text('address');
            $table->string('contact_person', 191);
            $table->string('email', 191);
            $table->string('contact_number', 191);
            $table->boolean('featured')->default(false);
            $table->unsignedBigInteger('type_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partners');
    }
};
