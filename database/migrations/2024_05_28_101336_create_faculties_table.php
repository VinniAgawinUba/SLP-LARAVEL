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
        Schema::create('faculties', function (Blueprint $table) {
            $table->id();
            $table->string('fname', 191);
            $table->string('lname', 191);
            $table->string('email', 191);
            $table->unsignedBigInteger('college_id');
            $table->unsignedBigInteger('department_id');
            $table->unsignedTinyInteger('role');
            $table->string('image', 191)->nullable();
            $table->timestamps();
        });

        // Insert Dummy Data
        DB::table('faculties')->insert([
            [
                'fname' => 'Dr Edralin',
                'lname' => 'C Manla',
                'email' => 'EdralinCManla@gmail.com',
                'college_id' => 8,
                'department_id' => 7,
                'role' => 3,
                'image' => '1714635528.jpg',
            ],
            [
                'fname' => 'Ruth Love',
                'lname' => 'Russel',
                'email' => 'ruthloverussel@gmail.com',
                'college_id' => 7,
                'department_id' => 7,
                'role' => 3,
                'image' => '1714639808.jpg',
            ],
            [
                'fname' => 'Judy',
                'lname' => 'Sendaydiego',
                'email' => 'JudySendaydiego@gmail.com',
                'college_id' => 6,
                'department_id' => 8,
                'role' => 3,
                'image' => '1714640125.jpg',
            ],
            [
                'fname' => 'Maria',
                'lname' => 'R. Mosqueda',
                'email' => 'MariaRMosqueda@gmail.com',
                'college_id' => 5,
                'department_id' => 8,
                'role' => 3,
                'image' => '1714640911.png',
            ],
            [
                'fname' => 'Hercules',
                'lname' => 'Cascon',
                'email' => 'HerculesCascon@gmail.com',
                'college_id' => 3,
                'department_id' => 3,
                'role' => 3,
                'image' => '1714640575.jpg',
            ],
            [
                'fname' => 'Grace',
                'lname' => 'Paayas',
                'email' => 'GracePaayas@gmail.com',
                'college_id' => 2,
                'department_id' => 8,
                'role' => 3,
                'image' => '1714640653.png',
            ],
            [
                'fname' => 'Meldie',
                'lname' => 'Apag',
                'email' => 'MedlieApag@gmail.com',
                'college_id' => 1,
                'department_id' => 2,
                'role' => 3,
                'image' => '1714640858.jpg',
            ],
            [
                'fname' => 'Wilbert',
                'lname' => 'Tan',
                'email' => 'wtan@xu.edu.ph',
                'college_id' => 1,
                'department_id' => 1,
                'role' => 0,
                'image' => '1716778146.jfif',
            ],
        ]);
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faculties');
    }
};
