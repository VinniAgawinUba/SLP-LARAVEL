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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id');
            $table->string('thumb_nail_pic', 191)->nullable();
            $table->string('thumb_nail_title', 191);
            $table->text('thumb_nail_summary')->nullable();
            $table->longText('content');
            $table->timestamp('published_date');
            $table->boolean('featured')->default(false);
            $table->timestamps();
        });

        //Insert some data
        DB::table('articles')->insert(
            [
                'project_id' => 1,
                'thumb_nail_pic' => 'https://via.placeholder.com/150',
                'thumb_nail_title' => 'Article 1',
                'thumb_nail_summary' => 'This is a summary of article 1',
                'content' => 'This is the content of article 1',
                'published_date' => now(),
                'featured' => true,
            ],
            [
                'project_id' => 2,
                'thumb_nail_pic' => 'https://via.placeholder.com/150',
                'thumb_nail_title' => 'Article 2',
                'thumb_nail_summary' => 'This is a summary of article 2',
                'content' => 'This is the content of article 2',
                'published_date' => now(),
                'featured' => false,
            ],
            [
                'project_id' => 3,
                'thumb_nail_pic' => 'https://via.placeholder.com/150',
                'thumb_nail_title' => 'Article 3',
                'thumb_nail_summary' => 'This is a summary of article 3',
                'content' => 'This is the content of article 3',
                'published_date' => now(),
                'featured' => false,
            ],
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
