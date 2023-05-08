<?php

namespace Tests\Feature;

use App\Models\Newsletter;
use Carbon\Traits\Date;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetNewsletterTest extends TestCase
{
    use RefreshDatabase;

    public function test_all_newsletters_can_be_fetched_from_the_database()
    {
        Newsletter::factory()->count(10)->create();

        // //Get all the newsletters in the database
        $newsletters = $this->getJson('/api/newsletters/index');

        $newsletters->assertJsonCount(10, 'data');
    }

    public function test_a_newsletter_with_a_given_id_can_be_fetched_from_the_database()
    {
        Newsletter::factory()->count(10)->create();

        //Create the 11th newsletter
        $last_newsletter_data = [
            'grade_ids' => '1,2',
            'title' => 'Athletics Day',
            'body' => 'Good day parents. We would like to remind you of the athletics day that will take
                        place this coming Friday.'
        ];

        Newsletter::factory()->create($last_newsletter_data);

        //Verify that exactly 11 newsletters are stored in the database
        $this->assertCount(11, Newsletter::all());

        //Fetch the 11th newsletter
        $newsletter = $this->getJson('/api/newsletters/show/11');

        $newsletter->assertJson($last_newsletter_data);
    }
}
