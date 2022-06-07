<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->withPersonalTeam()->create([
            'name' => 'Admin',
            'email' => 'admin@paramed.be',
            'password' => Hash::make('pass1234'),
        ]);
    }
}
