<?php

namespace Tests\Feature;

use App\Models\Newsletter;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StoreNewsletterTest extends TestCase
{
    use RefreshDatabase;

    public function test_newsletter_can_be_stored_successfully()
    {
        $this->postJson(
            '/api/newsletters/store',
            [
                'grade_ids' => '1,2',
                'title' => 'Athletics Day',
                'body' => 'Good day parents. We would like to remind you of the athletics day that will take
                        place this coming Friday.',
                'end_date' => '01 August 2022'
            ]
        );

        $this->assertCount(1, Newsletter::all());
    }

    public function test_validation_rules_work_for_newsletters()
    {
        Newsletter::truncate();

        $newsletter = $this->postJson('/api/newsletters/store');

        $newsletter->assertInvalid(
            [
                'grade_ids',
                'title',
                'body',
                'end_date'
            ]
        );
    }
}
