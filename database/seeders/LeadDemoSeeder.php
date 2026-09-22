<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lead;

class LeadDemoSeeder extends Seeder
{
    public function run(): void
    {
        $leads = [
            [
                'name' => 'DEMO-Lead PT Sumber Makmur',
                'contact_name' => 'Rudi Hartono',
                'email' => 'rudi@sumbermakmur.test',
                'phone' => '08130000101',
                'source' => 'Website',
                'status' => 'new',
                'notes' => 'New lead for CRM testing.',
            ],
            [
                'name' => 'DEMO-Lead PT Cahaya Textile',
                'contact_name' => 'Sinta Maharani',
                'email' => 'sinta@cahayatextile.test',
                'phone' => '08130000102',
                'source' => 'WhatsApp',
                'status' => 'new',
                'notes' => 'Initial inquiry received via WhatsApp.',
            ],
            [
                'name' => 'DEMO-Lead PT Nusantara Yarn',
                'contact_name' => 'Dimas Prakoso',
                'email' => 'dimas@nusantarayarn.test',
                'phone' => '08130000103',
                'source' => 'Instagram',
                'status' => 'new',
                'notes' => 'Interested in yarn products.',
            ],
            [
                'name' => 'DEMO-Lead PT Mandiri Jaya',
                'contact_name' => 'Andi Saputra',
                'email' => 'andi@mandirijaya.test',
                'phone' => '08130000104',
                'source' => 'Referral',
                'status' => 'contacted',
                'notes' => 'Sales has contacted the lead.',
            ],
            [
                'name' => 'DEMO-Lead PT Prima Sandang',
                'contact_name' => 'Maya Putri',
                'email' => 'maya@primasandang.test',
                'phone' => '08130000105',
                'source' => 'Phone',
                'status' => 'contacted',
                'notes' => 'Follow-up call completed.',
            ],
            [
                'name' => 'DEMO-Lead PT Tekstil Abadi',
                'contact_name' => 'Fajar Nugroho',
                'email' => 'fajar@tekstilabadi.test',
                'phone' => '08130000106',
                'source' => 'Website',
                'status' => 'contacted',
                'notes' => 'Customer requested product information.',
            ],
            [
                'name' => 'DEMO-Lead PT Sentosa Fabrics',
                'contact_name' => 'Nadia Permata',
                'email' => 'nadia@sentosafabrics.test',
                'phone' => '08130000107',
                'source' => 'Email',
                'status' => 'qualified',
                'notes' => 'Qualified lead with active purchasing need.',
            ],
            [
                'name' => 'DEMO-Lead PT Global Textile',
                'contact_name' => 'Arief Setiawan',
                'email' => 'arief@globaltextile.test',
                'phone' => '08130000108',
                'source' => 'Referral',
                'status' => 'qualified',
                'notes' => 'Lead passed initial qualification.',
            ],
            [
                'name' => 'DEMO-Lead PT Bintang Kain',
                'contact_name' => 'Lina Anggraini',
                'email' => 'lina@bintangkain.test',
                'phone' => '08130000109',
                'source' => 'WhatsApp',
                'status' => 'qualified',
                'notes' => 'Potential recurring customer.',
            ],
            [
                'name' => 'DEMO-Lead PT Artha Textile',
                'contact_name' => 'Bayu Ramadhan',
                'email' => 'bayu@arthatextile.test',
                'phone' => '08130000110',
                'source' => 'Website',
                'status' => 'converted',
                'notes' => 'Lead converted for CRM workflow testing.',
            ],
            [
                'name' => 'DEMO-Lead PT Maju Bersama',
                'contact_name' => 'Citra Lestari',
                'email' => 'citra@majubersama.test',
                'phone' => '08130000111',
                'source' => 'Referral',
                'status' => 'converted',
                'notes' => 'Converted lead for end-to-end CRM testing.',
            ],
            [
                'name' => 'DEMO-Lead PT Karya Sandang',
                'contact_name' => 'Bima Aditya',
                'email' => 'bima@karyasandang.test',
                'phone' => '08130000112',
                'source' => 'Email',
                'status' => 'converted',
                'notes' => 'Converted after product discussion.',
            ],
            [
                'name' => 'DEMO-Lead PT Berkah Textile',
                'contact_name' => 'Rina Wulandari',
                'email' => 'rina@berkahtextile.test',
                'phone' => '08130000113',
                'source' => 'Phone',
                'status' => 'lost',
                'notes' => 'Lead did not continue with the sales process.',
            ],
            [
                'name' => 'DEMO-Lead PT Sinar Kain',
                'contact_name' => 'Galih Pratama',
                'email' => 'galih@sinarkain.test',
                'phone' => '08130000114',
                'source' => 'Instagram',
                'status' => 'lost',
                'notes' => 'Lead decided not to proceed.',
            ],
            [
                'name' => 'DEMO-Lead PT Jaya Textile',
                'contact_name' => 'Vina Amelia',
                'email' => 'vina@jayatextile.test',
                'phone' => '08130000115',
                'source' => 'WhatsApp',
                'status' => 'lost',
                'notes' => 'No response after several follow-ups.',
            ],
        ];

        foreach ($leads as $lead) {
            Lead::firstOrCreate(
                [
                    'name' => $lead['name'],
                ],
                $lead
            );
        }

        $this->command?->info('Demo Lead data created successfully.');
        $this->command?->info('Leads: ' . count($leads));
    }
}