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
        Schema::create('school_years', function (Blueprint $table) {
            $table->id();
            $table->string('school_year');
            $table->timestamps();
        });

        // Insert some data
        DB::table('school_years')->insert([
            ['school_year' => '2020-2021'],
            ['school_year' => '2021-2022'],
            ['school_year' => '2022-2023'],
            ['school_year' => '2023-2024'],
            ['school_year' => '2024-2025'],
            ['school_year' => '2025-2026'],
            ['school_year' => '2026-2027'],
            ['school_year' => '2027-2028'],
            ['school_year' => '2028-2029'],
            ['school_year' => '2029-2030'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school_years');
    }
};
