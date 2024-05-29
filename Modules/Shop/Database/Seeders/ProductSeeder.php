<?php

namespace Modules\Shop\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Modules\Shop\App\Models\Category;
use Modules\Shop\App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $this->call([]);
        //$this->command->info("This is Product Seeder");

        $user = User::first();

        Category::factory()->count(20)->create();
        $this->command->info('Categories seeded.');
        $randomCategoryIDs = Category::all()->random()->limit(2)->pluck('id');

        for ($i = 1; $i <= 10; $i++) {
            $manageStock = (bool)random_int(0, 1);

            $product = Product::factory()->create([
                'user_id' => $user->id,
                'manage_stock' => $manageStock,
            ]);

            $product->categories()->sync($randomCategoryIDs);
        }

        $this->command->info('20 sample products seeded.');
    }
}
