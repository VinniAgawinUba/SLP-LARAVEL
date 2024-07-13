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
        Schema::create('project_sdgs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id');
            $table->string('sdg', 191);
            $table->timestamps();
        });

        // Insert initial project sdgs data
        DB::table('project_sdgs')->insert([
            ['project_id' => 38, 'sdg' => 'sdg_1'],
            ['project_id' => 38, 'sdg' => 'sdg_2'],
            ['project_id' => 38, 'sdg' => 'sdg_5'],
            ['project_id' => 38, 'sdg' => 'sdg_6'],
            ['project_id' => 38, 'sdg' => 'sdg_9'],
            ['project_id' => 39, 'sdg' => 'sdg_4'],
            ['project_id' => 39, 'sdg' => 'sdg_17'],
            ['project_id' => 40, 'sdg' => 'sdg_7'],
            ['project_id' => 40, 'sdg' => 'sdg_9'],
            ['project_id' => 40, 'sdg' => 'sdg_11'],
            ['project_id' => 41, 'sdg' => 'sdg_3'],
            ['project_id' => 41, 'sdg' => 'sdg_4'],
            ['project_id' => 41, 'sdg' => 'sdg_11'],
            ['project_id' => 42, 'sdg' => 'sdg_8'],
            ['project_id' => 42, 'sdg' => 'sdg_9'],
            ['project_id' => 42, 'sdg' => 'sdg_11'],
            ['project_id' => 43, 'sdg' => 'sdg_9'],
            ['project_id' => 43, 'sdg' => 'sdg_10'],
            ['project_id' => 43, 'sdg' => 'sdg_11'],
            ['project_id' => 44, 'sdg' => 'sdg_1'],
            ['project_id' => 44, 'sdg' => 'sdg_8'],
            ['project_id' => 44, 'sdg' => 'sdg_10'],
            ['project_id' => 44, 'sdg' => 'sdg_17'],
            ['project_id' => 45, 'sdg' => 'sdg_4'],
            ['project_id' => 45, 'sdg' => 'sdg_9'],
            ['project_id' => 45, 'sdg' => 'sdg_17'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_sdgs');
    }
};
