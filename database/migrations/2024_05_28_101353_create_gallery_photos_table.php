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
        Schema::create('gallery_photos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('gallery_id');
            $table->unsignedBigInteger('project_id');
            $table->string('file_name', 191);
            $table->timestamps();
        });

        // Insert initial gallery_photos data
        DB::table('gallery_photos')->insert([
            [
                'gallery_id' => 7,
                'project_id' => 45,
                'file_name' => '20221013_090540.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gallery_id' => 8,
                'project_id' => 45,
                'file_name' => '20221108_075308.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add the rest of your data here in a similar format...
            [
                'gallery_id' => 9,
                'project_id' => 45,
                'file_name' => '20230317_103646.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gallery_id' => 10,
                'project_id' => 45,
                'file_name' => '20230325_091557.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gallery_id' => 11,
                'project_id' => 45,
                'file_name' => '20230429_093823.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gallery_id' => 12,
                'project_id' => 45,
                'file_name' => '20231014_100604.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gallery_id' => 13,
                'project_id' => 45,
                'file_name' => '20231129_111126.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gallery_id' => 14,
                'project_id' => 44,
                'file_name' => '359751623_2066705703667299_8217547395484354221_n.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gallery_id' => 15,
                'project_id' => 44,
                'file_name' => '364175975_826312628808260_639883421013563205_n.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gallery_id' => 16,
                'project_id' => 44,
                'file_name' => 'DSC00469.JPG',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gallery_id' => 17,
                'project_id' => 44,
                'file_name' => 'DSC00483.JPG',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gallery_id' => 18,
                'project_id' => 44,
                'file_name' => 'DSC00485.JPG',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gallery_id' => 19,
                'project_id' => 43,
                'file_name' => 'IMG_0990.JPG',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gallery_id' => 20,
                'project_id' => 43,
                'file_name' => 'IMG-22da45ec26566c156dc073cf0896945c-V.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gallery_id' => 21,
                'project_id' => 43,
                'file_name' => 'IMG-187fe06af6ccc1ef0e0648cd2f657a82-V.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gallery_id' => 22,
                'project_id' => 43,
                'file_name' => 'IMG-776d718857247ea6b36ca488e1f712d2-V.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gallery_id' => 23,
                'project_id' => 42,
                'file_name' => 'IMG-1532a42eccfe9bf78f83954954716039-V.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gallery_id' => 24,
                'project_id' => 42,
                'file_name' => 'IMG-6714d8ef798128a5a15a81174a8b8016-V.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gallery_id' => 25,
                'project_id' => 42,
                'file_name' => 'IMG20221124163644_01.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gallery_id' => 26,
                'project_id' => 39,
                'file_name' => 'IMG20221207153235.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gallery_id' => 27,
                'project_id' => 39,
                'file_name' => 'IMG20230329093547.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gallery_id' => 28,
                'project_id' => 39,
                'file_name' => 'IMG-a539ebaf4e272a79f247bd6b6d09b6f6-V.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gallery_id' => 29,
                'project_id' => 39,
                'file_name' => 'IMG-f070c174398894584d52ad35b372cdf4-V.jpg',
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
        Schema::dropIfExists('gallery_photos');
    }
};
