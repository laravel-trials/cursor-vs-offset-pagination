<?php

namespace Database\Seeders;

use App\Models\Shipper;
use App\Support\SeederSupport;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ShipperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = Shipper::count();

        $loops = SeederSupport::getSeederRemaningLoops($count);

        if ($loops) {
            $data = Shipper::factory()->count(5000)->make()->toArray();

            for ($i = 0; $i < $loops; $i++) {
                Shipper::insert($data);
            }
        }
    }
}
