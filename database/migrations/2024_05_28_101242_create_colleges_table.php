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
        Schema::create('colleges', function (Blueprint $table) {
            $table->id();
            $table->string('name', 191);
            $table->unsignedBigInteger('dean_id');
            $table->string('logo_image', 191);
            $table->timestamps();
        });

        // Insert some data
        DB::table('colleges')->insert([
            ['name' => 'College of Computer Studies', 'dean_id' => 1, 'logo_image' => '1714640756.jpg'],
            ['name' => 'College of Nursing', 'dean_id' => 2, 'logo_image' => 'science.png'],
            ['name' => 'College of Engineering', 'dean_id' => 3, 'logo_image' => '1714640590.jpg'],
            ['name' => 'College of Agriculture', 'dean_id' => 4, 'logo_image' => '1714640218.png'],
            ['name' => 'College of Arts and Sciences', 'dean_id' => 5, 'logo_image' => '1714640015.jpg'],
            ['name' => 'School of Business and Management', 'dean_id' => 6, 'logo_image' => '1714640001.jpg'],
            ['name' => 'School of Education', 'dean_id' => 7, 'logo_image' => '1714639968.jpg'],

        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colleges');
    }
};
