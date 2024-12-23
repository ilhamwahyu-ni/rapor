<?php

namespace Database\Seeders;

use App\Models\Tahfizh;
use Illuminate\Database\Seeder;

class TahfizhSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tahfizh::factory()->count(5)->create();
    }
}
