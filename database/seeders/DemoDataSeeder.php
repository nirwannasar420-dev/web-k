<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class DemoDataSeeder extends Seeder
{
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | SALESPERSONS
        |--------------------------------------------------------------------------
        */

        $salespeople = DB::table('users')
            ->where('role', 'sales')
            ->orderBy('id')
            ->pluck('id')
            ->values();

        if ($salespeople->isEmpty()) {
            throw new \RuntimeException(
                'No Sales users found. Create at least one Sales user first.'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | STAGES
        |--------------------------------------------------------------------------
        */

        $stageNames = [
            'Prospect',
            'Qualified',
            'Proposition',
            'Won',
            'Lost',
        ];

        $stages = [];

        foreach ($stageNames as $stageName) {

            $stage = DB::table('stages')
                ->where('name', $stageName)
                ->first();

            if (! $stage) {
                throw new \RuntimeException(
                    "Stage '{$stageName}' was not found."
                );
            }

            $stages[$stageName] = $stage->id;
        }


        /*
        |--------------------------------------------------------------------------
        | CUSTOMERS
        |--------------------------------------------------------------------------
        */

        $customerData = [

            [
                'name' => 'Andi Pratama',
                'company' => 'PT Artha Textile',
                'email' => 'andi@arthatextile.test',
                'phone' => '081300000101',
            ],

            [
                'name' => 'Budi Santoso',
                'company' => 'PT Sinar Jaya Textile',
                'email' => 'budi@sinarjaya.test',
                'phone' => '081300000102',
            ],

            [
                'name' => 'Citra Lestari',
                'company' => 'PT Maju Bersama',
                'email' => 'citra@majubersama.test',
                'phone' => '081300000103',
            ],

            [
                'name' => 'Deni Kurniawan',
                'company' => 'PT Prima Garment',
                'email' => 'deni@primagarment.test',
                'phone' => '081300000104',
            ],

            [
                'name' => 'Eka Putri',
                'company' => 'PT Nusantara Textile',
                'email' => 'eka@nusantaratextile.test',
                'phone' => '081300000105',
            ],

            [
                'name' => 'Fajar Hidayat',
                'company' => 'PT Mitra Sandang',
                'email' => 'fajar@mitrasandang.test',
                'phone' => '081300000106',
            ],

            [
                'name' => 'Gina Maharani',
                'company' => 'PT Cipta Kain Indonesia',
                'email' => 'gina@ciptakain.test',
                'phone' => '081300000107',
            ],

            [
                'name' => 'Hendra Wijaya',
                'company' => 'PT Sentosa Garment',
                'email' => 'hendra@sentosagarment.test',
                'phone' => '081300000108',
            ],

            [
                'name' => 'Indah Sari',
                'company' => 'PT Mekar Textile',
                'email' => 'indah@mekartextile.test',
                'phone' => '081300000109',
            ],

            [
                'name' => 'Joko Firmansyah',
                'company' => 'PT Bandung Sandang',
                'email' => 'joko@bandungsandang.test',
                'phone' => '081300000110',
            ],

            [
                'name' => 'Kiki Amelia',
                'company' => 'PT Sentra Benang',
                'email' => 'kiki@sentrabenang.test',
                'phone' => '081300000111',
            ],

            [
                'name' => 'Lukman Hakim',
                'company' => 'PT Global Fabric',
                'email' => 'lukman@globalfabric.test',
                'phone' => '081300000112',
            ],

        ];

        $customers = [];

        foreach ($customerData as $data) {

            $existing = DB::table('customers')
                ->where('company', $data['company'])
                ->first();

            if ($existing) {

                $customers[] = $existing->id;

                continue;
            }

            $customers[] = DB::table('customers')
                ->insertGetId([
                    ...$data,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
        }


        /*
        |--------------------------------------------------------------------------
        | PRODUCTS
        |--------------------------------------------------------------------------
        */

        $productData = [

            [
                'product_name' => 'Benang Polyester',
                'product_code' => 'DEMO-P001',
                'unit' => 'Kg',
                'price' => 650000,
            ],

            [
                'product_name' => 'Benang Cotton',
                'product_code' => 'DEMO-P002',
                'unit' => 'Kg',
                'price' => 750000,
            ],

            [
                'product_name' => 'Kain Grey',
                'product_code' => 'DEMO-P003',
                'unit' => '55Kg',
                'price' => 1000000,
            ],

            [
                'product_name' => 'Kain Cotton',
                'product_code' => 'DEMO-P004',
                'unit' => '55Kg',
                'price' => 1250000,
            ],

            [
                'product_name' => 'Kain Polyester',
                'product_code' => 'DEMO-P005',
                'unit' => '55Kg',
                'price' => 1350000,
            ],

            [
                'product_name' => 'Benang Rayon',
                'product_code' => 'DEMO-P006',
                'unit' => 'Kg',
                'price' => 850000,
            ],

            [
                'product_name' => 'Kain Spandex',
                'product_code' => 'DEMO-P007',
                'unit' => '55Kg',
                'price' => 1500000,
            ],

            [
                'product_name' => 'Benang Premium',
                'product_code' => 'DEMO-P008',
                'unit' => 'Kg',
                'price' => 1100000,
            ],

        ];

        $products = [];

        foreach ($productData as $data) {

            $existing = DB::table('products')
                ->where('product_code', $data['product_code'])
                ->first();

            if ($existing) {

                $products[] = $existing->id;

                continue;
            }

            $products[] = DB::table('products')
                ->insertGetId([
                    ...$data,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
        }


        /*
        |--------------------------------------------------------------------------
        | OPPORTUNITIES
        |--------------------------------------------------------------------------
        */

        $opportunityProductPairs = [
            [0],
            [1],
            [2],
            [3],
            [4],
            [5],
            [6],
            [7],
            [0, 2],
            [1, 3],
            [2, 5],
            [4, 7],
        ];

        $createdOpportunities = [];

        $stageOrder = [
            'Prospect',
            'Qualified',
            'Proposition',
            'Won',
            'Lost',
        ];

        $opportunityNumber = 1;

        foreach ($stageOrder as $stageName) {

            for ($i = 0; $i < 8; $i++) {

                $customerId =
                    $customers[
                        ($opportunityNumber - 1)
                        % count($customers)
                    ];

                $salespersonId =
                    $salespeople[
                        ($opportunityNumber - 1)
                        % $salespeople->count()
                    ];

                $productPair =
                    $opportunityProductPairs[
                        ($opportunityNumber - 1)
                        % count($opportunityProductPairs)
                    ];

                $opportunityName =
                    'DEMO-Opportunity ' .
                    str_pad(
                        (string) $opportunityNumber,
                        2,
                        '0',
                        STR_PAD_LEFT
                    );

                $existingOpportunity = DB::table('opportunities')
                    ->where('name', $opportunityName)
                    ->first();

                if ($existingOpportunity) {

                    $createdOpportunities[] =
                        $existingOpportunity->id;

                    $opportunityNumber++;

                    continue;
                }


                /*
                |--------------------------------------------------------------------------
                | DATE
                |--------------------------------------------------------------------------
                */

                $month =
                    (($opportunityNumber - 1) % 9) + 1;

                $day =
                    (($opportunityNumber - 1) % 24) + 1;

                $opportunityDate =
                    Carbon::create(
                        2026,
                        $month,
                        $day,
                        10,
                        0,
                        0
                    );


                /*
                |--------------------------------------------------------------------------
                | PRODUCTS + TOTAL
                |--------------------------------------------------------------------------
                */

                $totalValue = 0;

                $items = [];

                foreach ($productPair as $productIndex) {

                    $productId =
                        $products[$productIndex];

                    $product =
                        DB::table('products')
                            ->where('id', $productId)
                            ->first();

                    $quantity =
                        (($opportunityNumber + $productIndex) % 7) + 1;

                    $unitPrice =
                        (float) $product->price;

                    $subtotal =
                        $quantity * $unitPrice;

                    $totalValue += $subtotal;

                    $items[] = [
                        'product_id' => $productId,
                        'quantity' => $quantity,
                        'unit_price' => $unitPrice,
                        'subtotal' => $subtotal,
                    ];
                }


                /*
                |--------------------------------------------------------------------------
                | RATING
                |--------------------------------------------------------------------------
                */

                $rating =
                    (($opportunityNumber - 1) % 5) + 1;


                /*
                |--------------------------------------------------------------------------
                | CREATE OPPORTUNITY
                |--------------------------------------------------------------------------
                */

                $opportunityId =
                    DB::table('opportunities')
                        ->insertGetId([
                            'customer_id' => $customerId,
                            'salesperson_id' => $salespersonId,
                            'stage_id' => $stages[$stageName],
                            'name' => $opportunityName,
                            'expected_revenue' => $totalValue,
                            'rating' => $rating,
                            'opportunity_date' => $opportunityDate,
                            'notes' =>
                                'Demo data for CRM testing.',
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);


                /*
                |--------------------------------------------------------------------------
                | CREATE OPPORTUNITY ITEMS
                |--------------------------------------------------------------------------
                */

                foreach ($items as $item) {

                    DB::table('opportunity_items')
                        ->insert([
                            'opportunity_id' =>
                                $opportunityId,

                            'product_id' =>
                                $item['product_id'],

                            'quantity' =>
                                $item['quantity'],

                            'unit_price' =>
                                $item['unit_price'],

                            'subtotal' =>
                                $item['subtotal'],

                            'created_at' =>
                                now(),

                            'updated_at' =>
                                now(),
                        ]);
                }


                /*
                |--------------------------------------------------------------------------
                | CREATE ACTIVITIES
                |--------------------------------------------------------------------------
                */

                $activityStatuses = [
                    'planned',
                    'done',
                    'cancelled',
                ];

                $activityTypes = [
                    'Meeting',
                    'Email',
                    'Telepon',
                    'Pembahasan Harga',
                    'Follow Up',
                ];

                for ($activityIndex = 0; $activityIndex < 2; $activityIndex++) {

                    $activityDate =
                        $opportunityDate->copy()->addDays(
                            ($activityIndex + 1) * 2
                        );

                    DB::table('activities')
                        ->insert([
                            'opportunity_id' =>
                                $opportunityId,

                            'type' =>
                                $activityTypes[
                                    (
                                        $opportunityNumber
                                        +
                                        $activityIndex
                                    )
                                    %
                                    count($activityTypes)
                                ],

                            'subject' =>
                                'Demo Follow-up ' .
                                $opportunityNumber .
                                ' - ' .
                                ($activityIndex + 1),

                            'activity_date' =>
                                $activityDate,

                            'status' =>
                                $activityStatuses[
                                    (
                                        $opportunityNumber
                                        +
                                        $activityIndex
                                    )
                                    %
                                    count($activityStatuses)
                                ],

                            'created_at' =>
                                now(),

                            'updated_at' =>
                                now(),
                        ]);
                }


                $createdOpportunities[] =
                    $opportunityId;

                $opportunityNumber++;
            }
        }


        /*
        |--------------------------------------------------------------------------
        | FINISH MESSAGE
        |--------------------------------------------------------------------------
        */

        $this->command?->info(
            'Demo CRM data created successfully.'
        );

        $this->command?->info(
            'Customers: ' . count($customers)
        );

        $this->command?->info(
            'Products: ' . count($products)
        );

        $this->command?->info(
            'Opportunities: ' . count($createdOpportunities)
        );

        $this->command?->info(
            'Each demo opportunity has 2 activities.'
        );
    }
}