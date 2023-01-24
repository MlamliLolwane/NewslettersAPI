<?php

namespace Tests\Feature;

use App\Models\Newsletter;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DeleteNewsletterTest extends TestCase
{
    use RefreshDatabase;

    public function test_newsletter_can_be_deleted()
    {
        //Create 10 newsletters
        Newsletter::factory()->count(10)->create();

        //Verify that exactly 10 newsletters were created
        $this->assertCount(10, Newsletter::all());

        //Delete the 10th newsletter
        $this->deleteJson('/api/newsletters/destroy/10');

        //Verify that there are only 9 newsletters left
        $this->assertCount(9, Newsletter::all());

    }
}
