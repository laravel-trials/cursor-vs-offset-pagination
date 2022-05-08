<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Support\SeederSupport;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = Company::count();

        $loops = SeederSupport::getSeederRemaningLoops($count);

        if ($loops) {
            $data = Company::factory()->count(5000)->make()->toArray();

            for ($i = 0; $i < $loops; $i++) {
                Company::insert($data);
            }
        }
    }
}
