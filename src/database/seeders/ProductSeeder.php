<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Support\SeederSupport;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = Product::count();
        $chunk = 1000;

        $loops = SeederSupport::getSeederRemaningLoops($count, $chunk);

        if ($loops) {
            $data = Product::factory()->count($chunk)->make()->toArray();

            for ($i = 0; $i < $loops; $i++) {
                Product::insert($data);
            }
        }
    }
}
