<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 100; $i++)
        {
            DB::table('students')->insert([
                'name' => 'Student ' . ($i + 1),
                'roll_no' => 'Roll No ' . ($i + 1),
                'email' => 'student' . ($i + 1) . '@example.com',
            ]);
        }
    }

}
