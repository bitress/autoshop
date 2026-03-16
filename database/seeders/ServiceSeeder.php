<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'name'        => 'Headlight Retrofit',
                'description' => 'Full headlight & foglights upgrade with precision laser alignment. Includes angel/demon eyes and DRL installation.',
                'price'       => null,
                'duration'    => null,
                'icon'        => '💡',
            ],
            [
                'name'        => 'Android Headunit Installation',
                'description' => 'Wireless CarPlay & Android Auto, 360 camera integration, OEM-style fitting with octacore processing.',
                'price'       => null,
                'duration'    => null,
                'icon'        => '📱',
            ],
            [
                'name'        => 'Both (Retrofit + Headunit)',
                'description' => 'Complete package: headlight retrofit plus Android headunit installation for the ultimate upgrade.',
                'price'       => null,
                'duration'    => null,
                'icon'        => '⚡',
            ],
            [
                'name'        => 'DRL Installation & Replacement',
                'description' => 'Daytime Running Light installation or replacement with precision alignment and clean wiring.',
                'price'       => null,
                'duration'    => null,
                'icon'        => '🔦',
            ],
            [
                'name'        => 'Angel & Demon Eyes Installation',
                'description' => 'Custom angel eyes and demon eyes in your choice of color: Purple, Amber, Blue, Ice Blue, or White.',
                'price'       => null,
                'duration'    => null,
                'icon'        => '👁️',
            ],
            [
                'name'        => 'Other / Inquiry',
                'description' => 'Contact us for custom jobs, specific inquiries, or services not listed.',
                'price'       => null,
                'duration'    => null,
                'icon'        => '❓',
            ],
        ];

        foreach ($services as $service) {
            Service::firstOrCreate(['name' => $service['name']], $service);
        }
    }
}
