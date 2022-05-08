<?php

namespace Database\Seeders;

use App\Models\Orders;
use App\Models\Product;
use App\Support\SeederSupport;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = Orders::count();
        $chunk = 1000;

        $loops = SeederSupport::getSeederRemaningLoops($count, $chunk);

        if ($loops) {
            $data = Orders::factory()->count($chunk)->make()->toArray();

            for ($i = 0; $i < $loops; $i++) {
                Orders::insert($data);
            }
        }

        $count = DB::table('order_products')->count();
        $loops = SeederSupport::getSeederRemaningLoops($count, 10000);

        if ($loops) {
            $data = [];


            $orderIds = Orders::select('id')->first(10000)->pluck('id')->toArray();
            $productIds = Product::select('id')->first(10000)->pluck('id')->toArray();

            for ($i = 0; $i < 10000; $i++) {
                $data[] = [
                    'order_id' => $orderIds[$i],
                    'product_id' => $productIds[$i],
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            for ($i = 0; $i < $loops; $i++) {
                DB::table('order_products')->insert($data);
            }
        }
    }
}
