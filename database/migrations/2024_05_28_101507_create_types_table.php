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
        Schema::create('types', function (Blueprint $table) {
            $table->id();
            $table->string('type_name', 191);
            $table->timestamps();
        });

        // Insert some stuff
        DB::table('types')->insert(
            [
            ['type_name' => 'Local Government Units'],
            ['type_name' => 'Civil Society Organizations'],
            ['type_name' => 'Industry'],
            ['type_name' => 'Non - Government'],
            ['type_name' => 'Private Sector'],
            ['type_name' => 'In - XU'],
            ['type_name' => 'Government Agencies'],
            ['type_name' => 'Schools'],
            ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('types');
    }
};
