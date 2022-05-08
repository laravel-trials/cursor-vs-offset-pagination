<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Support\SeederSupport;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = Customer::count();

        $loops = SeederSupport::getSeederRemaningLoops($count);

        if ($loops) {
            $data = Customer::factory()->count(5000)->make()->toArray();

            for ($i = 0; $i < $loops; $i++) {
                Customer::insert($data);
            }
        }
    }
}
