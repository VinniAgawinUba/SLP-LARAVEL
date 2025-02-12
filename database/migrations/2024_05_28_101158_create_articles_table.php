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
            $table->unsignedBigInteger('hits')->default(0);
            $table->timestamps();
        });

        //Insert some data
        // Insert initial articles data
        DB::table('articles')->insert([
            [
                'id' => 5,
                'project_id' => 43,
                'thumb_nail_pic' => '1714899528.jpg',
                'thumb_nail_title' => 'Xavier Ateneo\'s Service Learning Program (SLP): Forging Collaborative Partnerships for the School Year\'s Social Engagements',
                'thumb_nail_summary' => 'Forging Collaborative Partnerships for the School...',
                'content' => 'Xavier Ateneo Service Learning Program (SLP) held its ceremonial MOU signing on 18 October 2023. The event was attended by representatives from the local government units of Alubijid, Laguindingan, Malitbog, Tagoloan, and the XU VP for Administration Cluster and the Xavier University Canteen Multi-Purpose Cooperative.

“Xavier University is really committed to the transformative learning experience of our students, faculty and partners”, said Engr Dexter S Lo, Vice-President for Social Development, in his Opening Message.

This MOU signing formalized the partnership and collaborative efforts of various academic disciplines for the first semester of the academic year 2023-2024. Ms Gail P dela Rita, Service Learning Program Director, presented the milestones and engagements of the program highlighting the relevance of the service learning partnership which is to “co-create solutions” with and for communities.

“Service learning cannot work on its own to be sustainable, we have to work with you, our partners, so that sustainability can be our common agenda; when we partner and synergize, we can do a lot of work for communities”.',
                'published_date' => '2024-05-05',
                'featured' => 1,
                'hits' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'project_id' => 40,
                'thumb_nail_pic' => '1714899653.png',
                'thumb_nail_title' => 'XU President leads ceremonial signing of MOU between XU and SLP partners',
                'thumb_nail_summary' => 'XU President leads ceremonial signing of MOU between XU and SLP partners',
                'content' => 'XU President Fr Mars P Tan, SJ led the ceremonial signing of the Memorandum of Understanding with Xavier Ateneo’s Service Learning Program (SLP) partners on April 19, 2023 at the Engineering Drawing Room in the XU main campus. The event formalized and signified the commitment of the SLP stakeholders for better collaboration and cooperation leading to better outcomes for their respective units/organizations.

In his opening message, Fr Mars emphasized the relevance of service learning in allowing the students to experience real-world situations and gaining deeper understanding of the social issues that can develop the students’ sense of social responsibility to the community and the nation as a whole. “I am filled with gratitude for everyone present here who all play a crucial role in our shared mission,” Fr Mars said.',
                'published_date' => '2024-05-05',
                'featured' => 1,
                'hits' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'project_id' => 42,
                'thumb_nail_pic' => '1714899706.jpg',
                'thumb_nail_title' => 'Xavier Ateneans among delegates at AJCU-AP SLP 2018 in Tokyo, Japan',
                'thumb_nail_summary' => 'AJCU-AP Service Learning Program 2018 delegates from Instituto Sao Joao de Brito...',
                'content' => 'Xavier Ateneo\'s Civil Engineering student Garnelo Jose A Cupay and Psychology student Khessa Mari T Obuta, together with Service Learning Program (SLP) formator Jerome L Torres, joined the 2018 Association of Jesuit Colleges and Universities - Asia Pacific (AJCU-AP) SLP Assembly from August 1 to 14, hosted by Sophia University in Tokyo, Japan.

This year’s SLP assembly centered on post-disaster community recovery in Japan. The students were provided with the opportunities to visit Kamaishi and Ofunato in Tohoku Region and learned the social services offered to the affected areas of the 2011 magnitude-9 earthquake.

AJCU-AP is an association of Jesuit higher educational institutions (HEIs) and Jesuit higher educational endeavors (HEEs) functioning within the territory the Jesuit Conference for East Asia and Oceania (JCEAO).

SLP, one of many programs of the AJCU-AP, focuses on providing a place for Jesuit university students to apply Ignatian Pedagogy in their everyday life and provide a learning experience for students through tangible community service.

Each year, member universities send students and faculty members to a three-week program hosted by a member institution.

The program was participated by 28 students and five mentors from the different Jesuit universities, namely, Instituto Sao Joao de Brito (East Timor), Sogang University (Korea), Sophia University (Japan), Sanata Dharma University (Indonesia), and Ateneo de Manila, Ateneo de Davao, Ateneo de Zamboanga, and Xavier University - Ateneo de Cagayan (Philippines).',
                'published_date' => '2024-05-05',
                'featured' => 1,
                'hits' => 0,
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
        Schema::dropIfExists('articles');
    }
};
