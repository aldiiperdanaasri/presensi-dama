<?php

namespace Database\Seeders;

use App\Models\School;
use Illuminate\Database\Seeder;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        School::create([
            'name'      => 'Pondok Pesantren Darul Aman Gombara Makassar',
            'address'   => 'Jl. KH. Abd. Jabbar Ashiry No.1, Pai, Kec. Biringkanaya, Kota Makassar, Sulawesi Selatan, 90242',
            'latitude'  => '-5.0798888',
            'longitude' => '119.5090467',
            'radius_m'  => '1000',
        ]);
    }
}
