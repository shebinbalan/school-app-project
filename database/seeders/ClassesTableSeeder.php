<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $class_divs = [];
        for ($i = 1; $i <= 12; $i++) {
            $class_divs[] = ['name' => 'Class ' . $i, 'created_at' => now(), 'updated_at' => now()];
        }

        DB::table('class_divs')->insert($class_divs);
    }
    
}
