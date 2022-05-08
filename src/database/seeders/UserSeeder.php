<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\User;
use App\Support\SeederSupport;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = User::count();
        $chunk = 10000;

        $loops = SeederSupport::getSeederRemaningLoops($count, $chunk);

        if ($loops) {
            $data = User::factory()->count($chunk)->make()->toArray();

            for ($i = 0; $i < $loops; $i++) {
                User::insert($data);
            }
        }
    }
}
