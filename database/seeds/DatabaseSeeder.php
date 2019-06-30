<?php

use Illuminate\Database\Seeder;
use App\Grocery;
use App\Storage;
use App\Recipe;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $groceries = [
            'Bananas',
            'Coffee beans',
            'Butter'
        ];
        foreach ($groceries as $name) {
            factory(Grocery::class)->create(compact('name'));
        }

        $storages = [
            'Refridgerator',
            'Basement',
        ];
        foreach ($storages as $storage) {
            factory(Storage::class)->create([
                'name' => $storage
            ])
            ->groceries()
            ->sync(Grocery::all());
        }

        $moreGroceries = [
            'Bread',
            'Potatoes',
        ];
        foreach ($moreGroceries as $name) {
            factory(Grocery::class)->create(compact('name'));
        }

        $recipes = [
            'Pizza',
        ];
        foreach ($recipes as $name) {
            factory(Recipe::class)->create(compact('name'));
        }
    }
}
