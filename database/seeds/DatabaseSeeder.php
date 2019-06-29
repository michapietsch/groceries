<?php

use Illuminate\Database\Seeder;
use App\Grocery;
use App\Storage;

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
        foreach ($groceries as $grocery) {
            factory(Grocery::class)->create([
                'name' => $grocery
            ]);
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
    }
}
