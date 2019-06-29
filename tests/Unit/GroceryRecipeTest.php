<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Grocery;
use App\Recipe;

class GroceryRecipeTest extends TestCase
{
    /** @test */
    public function deletes_its_associations_when_a_grocery_is_deleted()
    {
        $grocery = factory(Grocery::class)->create();
        $grocery->recipes()->sync(
            factory(Recipe::class)->create()
        );

        $this->assertDatabaseHas('grocery_recipe', [ 'grocery_id' => $grocery->id ]);

        $grocery->delete();

        $this->assertDatabaseMissing('grocery_recipe', [ 'grocery_id' => $grocery->id ]);
    }

    /** @test */
    public function deletes_its_associations_when_a_recipe_is_deleted()
    {
        $grocery = factory(Grocery::class)->create();
        $grocery->recipes()->sync(
            factory(Recipe::class)->create()
        );

        $this->assertDatabaseHas('grocery_recipe', [ 'grocery_id' => $grocery->id ]);

        $grocery->recipes()->first()->delete();

        $this->assertDatabaseMissing('grocery_recipe', [ 'grocery_id' => $grocery->id ]);
    }
}
