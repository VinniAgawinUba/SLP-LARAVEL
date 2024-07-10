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
        Schema::create('faculties', function (Blueprint $table) {
            $table->id();
            $table->string('fname', 191);
            $table->string('lname', 191);
            $table->string('email', 191);
            $table->unsignedBigInteger('college_id');
            $table->unsignedBigInteger('department_id');
            $table->unsignedTinyInteger('role');
            $table->string('image', 191);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faculties');
    }
};
