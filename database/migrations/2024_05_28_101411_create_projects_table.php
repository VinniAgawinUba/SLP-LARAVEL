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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name', 191);
            $table->text('description');
            $table->string('sl_type', 191);
            $table->string('subject_hosted')->nullable();
            $table->unsignedBigInteger('number_of_students')->nullable();
            $table->unsignedBigInteger('college_id');
            $table->unsignedBigInteger('department_id');
            $table->unsignedBigInteger('sd_coordinator_id');
            $table->unsignedBigInteger('partner_id');
            $table->unsignedBigInteger('school_year_id');
            $table->integer('semester');
            $table->string('status', 191);
            $table->boolean('featured')->default(false);
            $table->timestamps();
        });

        //Insert some data
        DB::table('projects')->insert([
            [
                'name' => 'Project 1',
                'description' => 'Description of Project 1',
                'sl_type' => 'Service',
                'subject_hosted' => 'Subject Hosted 1',
                'number_of_students' => 10,
                'college_id' => 1,
                'department_id' => 1,
                'sd_coordinator_id' => 1,
                'partner_id' => 1,
                'school_year_id' => 1,
                'semester' => 1,
                'status' => 'In Progress',
                'featured' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Project 2',
                'description' => 'Description of Project 2',
                'sl_type' => 'Outreach',
                'subject_hosted' => 'Subject Hosted 2',
                'number_of_students' => 20,
                'college_id' => 2,
                'department_id' => 26,
                'sd_coordinator_id' => 2,
                'partner_id' => 2,
                'school_year_id' => 2,
                'semester' => 2,
                'status' => 'Finished',
                'featured' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Project 3',
                'description' => 'Description of Project 3',
                'sl_type' => 'Output',
                'subject_hosted' => 'Subject Hosted 3',
                'number_of_students' => 30,
                'college_id' => 3,
                'department_id' => 3,
                'sd_coordinator_id' => 3,
                'partner_id' => 3,
                'school_year_id' => 3,
                'semester' => 3,
                'status' => 'TBD',
                'featured' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
