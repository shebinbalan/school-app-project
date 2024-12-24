<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Fee;
class FeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $feeTypes = [
            ['name' => 'Tuition Fees'],
            ['name' => 'Admission Fees'],
            ['name' => 'Examination Fees'],
            ['name' => 'Library Fees'],
            ['name' => 'Laboratory Fees'],
            ['name' => 'Transportation Fees'],
            ['name' => 'Sports Fees'],
            ['name' => 'Hostel Fees'],
            ['name' => 'Development Fees'],
            ['name' => 'Activity Fees'],
            ['name' => 'Caution Deposit'],
            ['name' => 'Special Fees'],
            ['name' => 'Health Fees'],
        ];

        foreach ($feeTypes as $type) {
            Fee::create($type);
        }
    }
}
