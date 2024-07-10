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
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->string('name', 191);
            $table->string('logo_image', 191);
            $table->text('address');
            $table->string('contact_person', 191);
            $table->string('email', 191);
            $table->string('contact_number', 191);
            $table->boolean('featured')->default(false);
            $table->unsignedBigInteger('type_id');
            $table->timestamps();
        });
        DB::table('partners')->insert([
            ['id' => 7, 'name' => 'BLGU Indahag', 'logo_image' => '1716204917.png', 'address' => 'Cagayan de Oro City, Indahag', 'contact_person' => 'Indahag Contact Person', 'email' => 'Indahag@gmail.com', 'contact_number' => '01234567890', 'featured' => 1, 'type_id' => 1],
            ['id' => 8, 'name' => 'BLGU Macasandig', 'logo_image' => '1716204901.png', 'address' => 'Cagayan de Oro City, Macasandig', 'contact_person' => 'Macasandig Contact Person', 'email' => 'Macasandig@gmail.com', 'contact_number' => '01234567890', 'featured' => 1, 'type_id' => 1],
            ['id' => 9, 'name' => 'Xavier Heights Subdivision Homeownes Association', 'logo_image' => '1716204887.png', 'address' => 'Cagayan de Oro City, Xavier Heights', 'contact_person' => 'Xavier Heights Contact Person', 'email' => 'Xavierheights@gmail.com', 'contact_number' => '01234567890', 'featured' => 1, 'type_id' => 2],
            ['id' => 10, 'name' => 'Brgy Natumolan', 'logo_image' => '1716204909.png', 'address' => 'Tagoloan, Misamis Oriental', 'contact_person' => 'Natumolan Contact Person', 'email' => 'Natumolan@gmail.com', 'contact_number' => '01234567890', 'featured' => 1, 'type_id' => 1],
            ['id' => 11, 'name' => 'DRRMO Tagoloan', 'logo_image' => '1716204795.png', 'address' => 'Tagoloan, Misamis Oriental', 'contact_person' => 'Tagoloan Contact Person', 'email' => 'Tagoloan@gmail.com', 'contact_number' => '01234567890', 'featured' => 1, 'type_id' => 7],
            ['id' => 12, 'name' => 'Brgy Casinglot', 'logo_image' => '1716204741.png', 'address' => 'Tagoloan, Misamis Oriental', 'contact_person' => 'Casinglot Contact Person', 'email' => 'Casinglot@gmail.com', 'contact_number' => '01234567890', 'featured' => 1, 'type_id' => 1],
            ['id' => 13, 'name' => 'MLGU Tagoloan', 'logo_image' => '1716204731.png', 'address' => 'Tagoloan, Misamis Oriental', 'contact_person' => 'Tagoloan Contact Person', 'email' => 'Tagoloan@gmail.com', 'contact_number' => '01234567890', 'featured' => 1, 'type_id' => 1],
            ['id' => 14, 'name' => 'XUVP Admin Office', 'logo_image' => '1714724444.png', 'address' => 'Xavier University, Corrales Avenue, Cagayan de Oro City', 'contact_person' => 'XUVP Admin Office', 'email' => 'eyonson@xu.edu.ph', 'contact_number' => '0888539800', 'featured' => 1, 'type_id' => 6],
            ['id' => 15, 'name' => 'LGU Malitbog', 'logo_image' => '1716206122.png', 'address' => 'Bukidnon, Malitbog', 'contact_person' => 'Malitbog Contact Person', 'email' => 'mpdcmalitbog@gmail.com', 'contact_number' => '09201037227', 'featured' => 1, 'type_id' => 1],
            ['id' => 16, 'name' => 'XUCMPC', 'logo_image' => '1716204712.png', 'address' => 'Xavier University - Ateneo de Cagayan, Corrales Avenue, Cagayan de Oro City', 'contact_person' => 'XUCMPC Contact Person', 'email' => 'xucmpc_2010@yahoo.com', 'contact_number' => '8575507', 'featured' => 1, 'type_id' => 6],
            ['id' => 17, 'name' => 'Higaonon community of Impahanong', 'logo_image' => '1716204706.png', 'address' => 'Bukidnon', 'contact_person' => 'Higaonon Contact Person', 'email' => 'Higaonon@gmail.com', 'contact_number' => '01234567890', 'featured' => 1, 'type_id' => 2],
            ['id' => 18, 'name' => 'MLGU Laguindingan', 'logo_image' => '1716204699.png', 'address' => 'Laguindingan, Purok 11', 'contact_person' => 'Laguindingan Contact Person', 'email' => 'Laguindingan@gmail.com', 'contact_number' => '01234567890', 'featured' => 1, 'type_id' => 1],
            ['id' => 19, 'name' => 'VP Admin Office', 'logo_image' => '1714726789.png', 'address' => 'Xavier University - Ateneo de Cagayan, Corrales Avenue, Cagayan de Oro City', 'contact_person' => 'VP Admin Office Contact Person', 'email' => 'vpadmin@xu.edu.ph', 'contact_number' => '8539800', 'featured' => 1, 'type_id' => 6],
            ['id' => 20, 'name' => 'LGU Alubijid', 'logo_image' => '1716204674.png', 'address' => 'Alubijid, Misamis Oriental', 'contact_person' => 'Alubijid Contact Person', 'email' => 'lgu_alubijidmisor@yahoo.com', 'contact_number' => '8825706', 'featured' => 1, 'type_id' => 1],
            ['id' => 21, 'name' => 'XU Service Learning Program', 'logo_image' => '1716778567.webp', 'address' => 'Xavier University - Ateneo de Cagayan', 'contact_person' => 'John Louis Caga', 'email' => 'jcaga@xu.edu.ph', 'contact_number' => '09352764253', 'featured' => 0, 'type_id' => 0],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partners');
    }
};
