<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Support\SeederSupport;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = Employee::count();
        $chunk = 1000;

        $loops = SeederSupport::getSeederRemaningLoops($count, $chunk);

        if ($loops) {
            $data = Employee::factory()->count($chunk)->make()->toArray();

            for ($i = 0; $i < $loops; $i++) {
                Employee::insert($data);
            }
        }
    }
}
