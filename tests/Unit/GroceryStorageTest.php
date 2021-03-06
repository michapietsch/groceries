<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Grocery;
use App\Recipe;
use App\Storage;
use App\GroceryStorage;
use App\GroceriesInStorage;

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

    /** @test */
    public function can_determine_groceries_not_in_a_given_storage()
    {
        $storage = factory(Storage::class)->create();
        $groceryInStorage = factory(Grocery::class)->create();
        $storage->groceries()->sync($groceryInStorage);

        $groceryNotInStorage = factory(Grocery::class)->create();

        $this->assertTrue(
            Grocery::whereIn('id', [$groceryInStorage->id, $groceryNotInStorage->id])
                ->notIn($storage)
                ->first()->is($groceryNotInStorage)
        );
    }

    /** @test */
    public function can_determine_groceries_by_storage_that_need_to_be_refilled()
    {
        $storage = factory(Storage::class)->create();

        $storage->groceries()->attach(
            $groceryNeedsRefill = factory(Grocery::class)->create(),
            ['quantity_in_stock' => 2, 'quantity_required' => 5]
        );

        $storage->groceries()->attach(
            $groceryMoreThanEnough = factory(Grocery::class)->create(),
            ['quantity_in_stock' => 10, 'quantity_required' => 2]
        );

        $this->assertEquals(
            [$storage->id, $groceryNeedsRefill->id],
            GroceriesInStorage::needRefill()->map(function ($item) {
                return [$item->storage_id, $item->grocery_id];
            })->flatten()->toArray()
        );
    }
}
