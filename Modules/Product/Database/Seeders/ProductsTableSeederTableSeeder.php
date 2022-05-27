<?php

namespace Modules\Product\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Product\Entities\Product;
use Modules\Product\Entities\ProductAttribute;
use Modules\Product\Entities\ProductAttributeChoise;
use Modules\Product\Http\Livewire\ProductAttributes;

class ProductsTableSeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        Product::factory()->has(ProductAttribute::factory()->has(ProductAttributeChoise::factory()->count(3),'choices')->count(5))->count(20)->create();
    }
}
