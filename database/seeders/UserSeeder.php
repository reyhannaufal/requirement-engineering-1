<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin Puja',
            'email' =>  'puja@mail.com',
            'password' => bcrypt('12345678'),
            'no_hp'=>'3520492485',
            'alamat'=>'',
            'pekerjaan'=>'',
            'jenis_kelamin'=>'Laki-laki',
            'tempat_lahir'=>'',
            'tanggal_lahir'=>date('Y-m-d'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
