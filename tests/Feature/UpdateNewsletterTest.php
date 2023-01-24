<?php

namespace Tests\Feature;

use App\Models\Newsletter;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UpdateNewsletterTest extends TestCase
{
    use RefreshDatabase;

    public function test_newsletter_can_be_updated_successfully()
    {
        //Create a newsletter
        Newsletter::factory()->create(
            [
                'grade_ids' => '1,2',
                'title' => 'Athletics Day',
                'body' => 'Good day parents. We would like to remind you of the athletics day that will take
                        place this coming Friday.',
                'end_date' => '01 August 2022'
            ]
        );

        //Update that original newsletter
        $newsletter = $this->patchJson('/api/newsletters/update/1',
        [   
            'grade_ids' => '1,2,3,4,5,6,7'
        ]);

        

        $newsletter->assertOk();
    }
}
