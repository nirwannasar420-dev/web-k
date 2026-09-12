<?php

namespace Database\Seeders;

use App\Models\Stage;
use Illuminate\Database\Seeder;

class StageSeeder extends Seeder
{
    public function run(): void
    {
        $stages = [
            [
                'name' => 'Prospect',
                'sequence' => 1,
            ],
            [
                'name' => 'Qualified',
                'sequence' => 2,
            ],
            [
                'name' => 'Proposition',
                'sequence' => 3,
            ],
            [
                'name' => 'Won',
                'sequence' => 4,
            ],
            [
                'name' => 'Lost',
                'sequence' => 5,
            ],
        ];

        foreach ($stages as $stage) {
            Stage::updateOrCreate(
                [
                    'name' => $stage['name'],
                ],
                [
                    'sequence' => $stage['sequence'],
                ]
            );
        }
    }
}