<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Categories;
use App\Models\Products;
use App\Models\Reviews;
use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(100)->create();
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.admin',
            'admin' => '1',
            'password' => '$2y$10$cu.G5KWzbRj8PaUNO6S5XetrZBCruL.mpKjNPrduUZWrQsu/78Wt6'
        ]);

        $parentCategories = Categories::factory(5)->create();
        $categories = Categories::factory(35)->create();

        foreach ($categories as $category) {
            $category->parent_id = $parentCategories->random()->id;
            $category->update();
        }

        Products::factory(500)->create();
        Reviews::factory(1000)->create();


        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
