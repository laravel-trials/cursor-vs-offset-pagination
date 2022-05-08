<?php

namespace Database\Seeders;

use App\Support\SeederSupport;
use App\Models\ProductCategory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = ProductCategory::count();
        $chunk = 5000;

        $loops = SeederSupport::getSeederRemaningLoops($count, $chunk);

        if ($loops) {
            $data = ProductCategory::factory()->count($chunk)->make()->toArray();

            for ($i = 0; $i < $loops; $i++) {
                ProductCategory::insert($data);
            }
        }
    }
}
