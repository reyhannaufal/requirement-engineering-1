<?php

namespace Database\Seeders;

use App\Models\Akad;
use Illuminate\Database\Seeder;

class AkadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Akad::create([
            'nama'=>'Akad Mudharabah'
        ]);
        Akad::create([
            'nama'=>'Akad Murabahah'
        ]);
    }
}
