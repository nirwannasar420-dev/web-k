<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class SalesSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            [
                'email' => 'sales@petra.com',
            ],
            [
                'name' => 'Sales Petra',
                'password' => 'sales12345',
                'role' => 'sales',
            ]
        );
    }
}