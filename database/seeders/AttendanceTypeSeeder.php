<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttendanceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('attendance_types')->insert([
            [
                'name' => 'Subuh',
                'time_in' => '04:30',
                'time_out' => '05:30',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dhuhur',
                'time_in' => '11:30',
                'time_out' => '12:30',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ashar',
                'time_in' => '15:00',
                'time_out' => '16:30',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Magrib',
                'time_in' => '17:45',
                'time_out' => '18:45',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Isya',
                'time_in' => '19:15',
                'time_out' => '20:30',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
