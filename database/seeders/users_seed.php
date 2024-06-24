<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class users_seed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        

        User::create([
            'name' => 'galang',
            'role_id' => '1',
            'email' => 'wijonarkogalang@gmail.com',
            'password' => Hash::make('galang123'),
            'alamat' => 'jl.singkep',
            'no_hp' => '089511111111'
        ]);

        User::create([
            'name' => 'langga',
            'role_id' => '2',
            'email' => 'langga@gmail.com',
            'password' => Hash::make('galang123'),
            'alamat' => 'jl.singkep',
            'no_hp' => '08952222222'
        ]);

        User::create([
            'name' => 'willy',
            'role_id' => '2',
            'email' => 'willy@gmail.com',
            'password' => Hash::make('willy123'),
            'alamat' => 'Jeruklegi',
            'no_hp' => '089533333333'
        ]);

    }
}
