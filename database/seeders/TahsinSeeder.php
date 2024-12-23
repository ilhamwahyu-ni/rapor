<?php

namespace Database\Seeders;

use App\Models\Tahsin;
use Illuminate\Database\Seeder;

class TahsinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tahsin::factory()->count(30)->create();
    }
}
