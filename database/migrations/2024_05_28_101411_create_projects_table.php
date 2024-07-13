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
                'name' => 'Community Health Nursing: Social Responsibility Project with Integration of Leadership and Management',
                'description' => 'Community Health Nursing: Social Responsibility Project with Integration of Leadership and Management',
                'sl_type' => 'Service',
                'subject_hosted' => 'ITCC 42',
                'number_of_students' => 24,
                'college_id' => 2,
                'department_id' => 26,
                'sd_coordinator_id' => 1,
                'partner_id' => 7,
                'school_year_id' => 9,
                'semester' => 1,
                'status' => 'Finished',
                'featured' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Improving DRRM documentation through mapping of various hazards of selected barangays in the Municipality of Tagoloan',
                'description' => 'Improving DRRM documentation through mapping of various hazards of selected barangays in the Municipality of Tagoloan',
                'sl_type' => 'Service',
                'subject_hosted' => 'CEM 1 Disaster Resilience Management',
                'number_of_students' => 20,
                'college_id' => 3,
                'department_id' => 27,
                'sd_coordinator_id' => 2,
                'partner_id' => 2,
                'school_year_id' => 9,
                'semester' => 1,
                'status' => 'Finished',
                'featured' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        
            [
                'name' => 'Social Awareness-Raising among children in Malitbog',
                'description' => 'Social Awareness-Raising among children in Malitbog',
                'sl_type' => 'Outreach',
                'subject_hosted' => 'DC 32 Development and Folk Media',
                'number_of_students' => 30,
                'college_id' => 5,
                'department_id' => 29,
                'sd_coordinator_id' => 1,
                'partner_id' => 15,
                'school_year_id' => 9,
                'semester' => 1,
                'status' => 'Finished',
                'featured' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Inventory and Assessment of Biological Resources',
                'description' => 'Inventory and Assessment of Biological Resources',
                'sl_type' => 'Service',
                'subject_hosted' => 'BIO 128 L Biological Resource Management',
                'number_of_students' => 25,
                'college_id' => 6,
                'department_id' => 21,
                'sd_coordinator_id' => 1,
                'partner_id' => 15,
                'school_year_id' => 9,
                'semester' => 1,
                'status' => 'Finished',
                'featured' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Development of a DICT-aligned LGU Alubijid Website',
                'description' => 'Development of a DICT-aligned LGU Alubijid Website',
                'sl_type' => 'Service',
                'subject_hosted' => 'ITCC 42',
                'number_of_students' => 20,
                'college_id' => 1,
                'department_id' => 2,
                'sd_coordinator_id' => 1,
                'partner_id' => 15,
                'school_year_id' => 9,
                'semester' => 1,
                'status' => 'Finished',
                'featured' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Development of a Marketing Plan and Promotional Materials',
                'description' => 'Development of a Marketing Plan and Promotional Materials',
                'sl_type' => 'Output',
                'subject_hosted' => 'BA 20 Good Governance and Corporate Social Responsibility',
                'number_of_students' => 20,
                'college_id' => 7,
                'department_id' => 16,
                'sd_coordinator_id' => 1,
                'partner_id' => 20,
                'school_year_id' => 9,
                'semester' => 1,
                'status' => 'Finished',
                'featured' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Assessment and Intervention on different educational settings',
                'description' => 'Assessment and Intervention on different educational settings',
                'sl_type' => 'Service',
                'subject_hosted' => 'ED 15 Issues and Trends in Education',
                'number_of_students' => 25,
                'college_id' => 8,
                'department_id' => 8,
                'sd_coordinator_id' => 1,
                'partner_id' => 7,
                'school_year_id' => 9,
                'semester' => 1,
                'status' => 'Finished',
                'featured' => true,
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
