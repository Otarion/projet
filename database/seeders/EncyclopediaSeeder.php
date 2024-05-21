<?php

namespace Database\Seeders;

use App\Models\Encyclopedia;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EncyclopediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = Type::all();
        Encyclopedia::factory(30)
        ->sequence(fn() =>[
            'type_id'=> $types->random(),
        ])
        ->create();
    }
}
