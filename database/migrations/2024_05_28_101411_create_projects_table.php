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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name', 191);
            $table->text('description');
            $table->enum('sl_type', ['Service', 'Outreach', 'Output']);
            $table->unsignedBigInteger('college_id');
            $table->unsignedBigInteger('department_id');
            $table->unsignedBigInteger('sd_coordinator_id');
            $table->unsignedBigInteger('partner_id');
            $table->unsignedBigInteger('school_year_id');
            $table->integer('semester');
            $table->enum('status', ['In Progress', 'Finished', 'TBD', 'Cancelled']);
            $table->boolean('featured')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
