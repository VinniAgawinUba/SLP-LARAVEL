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
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id');
            $table->string('name', 191);
            $table->timestamps();
        });

         // Insert initial gallery data
         DB::table('galleries')->insert([
            [
                'project_id' => 39,
                'name' => 'Gallery for Community Health Nursing: Social Responsibility Project with Integration of Leadership and Management',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'project_id' => 40,
                'name' => 'Gallery for Improving DRRM documentation through mapping of various hazards of selected barangays in the Municipality of Tagoloan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'project_id' => 41,
                'name' => 'Gallery for Social Awareness-Raising among children in Malitbog, Bukidnon through Puppet Show medium',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'project_id' => 42,
                'name' => 'Gallery for Inventory and Assessment of Biological Resources (Terrestrial) in Mt Pina, Malitbog, Bukidnon',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'project_id' => 43,
                'name' => 'Gallery for Development of a DICT-aligned LGU Alubijid Website',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'project_id' => 44,
                'name' => 'Gallery for Development of a Marketing Plan and Promotional Materials for Sardines, rags, hollowblocks, silkworm by-product',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'project_id' => 45,
                'name' => 'Gallery for Assessment and Intervention on different educational issues',
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
        Schema::dropIfExists('galleries');
    }
};
