<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class role_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            "id"=> "1",
            "role"=> "petugas",
        ]);
        Role::create([
            "id"=> "2",
            "role"=> "nasabah",
        ]);
    }
}
