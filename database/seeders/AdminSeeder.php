<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            [
                'email' => 'admin@petra.com',
            ],
            [
                'name' => 'Administrator',
                'password' => 'admin12345',
                'role' => 'admin',
            ]
        );
    }
}