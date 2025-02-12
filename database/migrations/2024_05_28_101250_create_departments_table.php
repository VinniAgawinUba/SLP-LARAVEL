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
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('name', 191);
            $table->unsignedBigInteger('college_id');
            $table->string('college_name')->nullable();
            $table->timestamps();
        });

        // Insert initial data
        DB::table('departments')->insert([
            ['id' => 1, 'name' => 'Information Technology', 'college_id' => 1, 'college_name' => 'College of Computer Studies'],
            ['id' => 2, 'name' => 'Computer Science', 'college_id' => 1, 'college_name' => 'College of Computer Studies'],
            ['id' => 3, 'name' => 'Electronics Communication Engineering', 'college_id' => 3, 'college_name' => ''],
            ['id' => 4, 'name' => 'Information Systems', 'college_id' => 1, 'college_name' => 'College of Computer Studies'],
            ['id' => 7, 'name' => 'Entertainment and Multimedia Computing', 'college_id' => 1, 'college_name' => ''],
            ['id' => 8, 'name' => 'Elementary Education', 'college_id' => 7, 'college_name' => ''],
            ['id' => 9, 'name' => 'Early Childhood Education', 'college_id' => 7, 'college_name' => ''],
            ['id' => 10, 'name' => 'Special Needs Education', 'college_id' => 7, 'college_name' => ''],
            ['id' => 11, 'name' => 'Secondary Education', 'college_id' => 7, 'college_name' => ''],
            ['id' => 16, 'name' => 'Business Administration', 'college_id' => 6, 'college_name' => ''],
            ['id' => 17, 'name' => 'Industrial Engineering', 'college_id' => 3, 'college_name' => ''],
            ['id' => 18, 'name' => 'Chemical Engineering', 'college_id' => 3, 'college_name' => ''],
            ['id' => 19, 'name' => 'Mechanical Engineering', 'college_id' => 3, 'college_name' => ''],
            ['id' => 20, 'name' => 'Chemistry', 'college_id' => 6, 'college_name' => ''],
            ['id' => 21, 'name' => 'Marine Biology', 'college_id' => 6, 'college_name' => ''],
            ['id' => 22, 'name' => 'Psychology', 'college_id' => 6, 'college_name' => ''],
            ['id' => 23, 'name' => 'Economics', 'college_id' => 6, 'college_name' => ''],
            ['id' => 24, 'name' => 'Sociology-Anthropology', 'college_id' => 6, 'college_name' => ''],
            ['id' => 25, 'name' => 'Agriculture', 'college_id' => 5, 'college_name' => ''],
            ['id' => 26, 'name' => 'Nursing', 'college_id' => 2, 'college_name' => ''],
            ['id' => 27, 'name' => 'Civil Engineering', 'college_id' => 3, 'college_name' => ''],
            ['id' => 28, 'name' => 'Electrical Engineering', 'college_id' => 3, 'college_name' => ''],
            ['id' => 29, 'name' => 'Development Communication', 'college_id' => 5, 'college_name' => ''],
            ['id' => 30, 'name' => 'Agriculture and Biosystems Engineering', 'college_id' => 5, 'college_name' => ''],
            ['id' => 31, 'name' => 'Food Technology', 'college_id' => 5, 'college_name' => ''],
            ['id' => 32, 'name' => 'Biology', 'college_id' => 6, 'college_name' => ''],
            ['id' => 33, 'name' => 'Philosophy', 'college_id' => 6, 'college_name' => '']
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departments');
    }
};
