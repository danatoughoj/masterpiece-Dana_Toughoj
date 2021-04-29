<?php

use App\Category;
use App\Product;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(Category::class, 7)->create();
        factory(Product::class, 25)->create();
        factory(User::class)->create([
            'email' => 'user@mail.com',
            'password' => bcrypt('secret'),
        ]);
    }
}
