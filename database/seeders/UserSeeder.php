<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'role' => 'Admin',
            'name' => 'Alan Pratama',
            'telepon' => '085817000942',
            'email' => 'alan@gmail.com',
            'username' => 'alanpr',
            'password' => Hash::make('alanpr'),
        ]);

        User::create([
            'role' => 'User',
            'name' => 'Arif Ibrahim',
            'telepon' => '085817000941',
            'email' => 'arif@gmail.com',
            'username' => 'arif',
            'password' => Hash::make('arif'),
        ]);
    }
}
