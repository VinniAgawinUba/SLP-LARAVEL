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
            ['school_year' => '2015-2016'],
            ['school_year' => '2016-2017'],
            ['school_year' => '2017-2018'],
            ['school_year' => '2018-2019'],
            ['school_year' => '2019-2020'],
            ['school_year' => '2020-2021'],
            ['school_year' => '2021-2022'],
            ['school_year' => '2022-2023'],
            ['school_year' => '2023-2024'],
            ['school_year' => '2024-2025'],
            ['school_year' => '2025-2026'],
            // Add more years if needed
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
