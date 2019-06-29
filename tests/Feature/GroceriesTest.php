<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GroceriesTest extends TestCase
{
    /** @test */
    public function can_post_to_create_a_grocery()
    {
        $this->post('/groceries', ['name' => 'Some special treat']);

        $this->assertDatabaseHas('groceries', ['name' => 'Some special treat']);
    }
}
