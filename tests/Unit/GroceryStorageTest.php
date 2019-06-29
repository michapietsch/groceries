<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Grocery;
use App\Recipe;
use App\Storage;

class GroceryStorageTest extends TestCase
{
    /** @test */
    public function deletes_its_associations_when_a_grocery_is_deleted()
    {
        $grocery = factory(Grocery::class)->create();
        $grocery->storages()->sync(
            factory(Storage::class)->create()
        );

        $this->assertDatabaseHas('grocery_storage', [ 'grocery_id' => $grocery->id ]);

        $grocery->delete();

        $this->assertDatabaseMissing('grocery_storage', [ 'grocery_id' => $grocery->id ]);
    }

    /** @test */
    public function deletes_its_associations_when_a_storage_is_deleted()
    {
        $grocery = factory(Grocery::class)->create();
        $grocery->storages()->sync(
            factory(Storage::class)->create()
        );

        $this->assertDatabaseHas('grocery_storage', [ 'grocery_id' => $grocery->id ]);

        $grocery->storages()->first()->delete();

        $this->assertDatabaseMissing('grocery_storage', [ 'grocery_id' => $grocery->id ]);
    }
}
