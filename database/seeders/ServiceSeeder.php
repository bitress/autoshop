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
                'name'        => 'Oil Change',
                'description' => 'Full synthetic or conventional oil change with filter replacement and multi-point inspection.',
                'price'       => '$39.99',
                'duration'    => '30 min',
                'icon'        => '🛢️',
            ],
            [
                'name'        => 'Brake Service',
                'description' => 'Brake pad replacement, rotor inspection, and brake fluid check to keep you stopping safely.',
                'price'       => '$129.99',
                'duration'    => '1–2 hrs',
                'icon'        => '🔩',
            ],
            [
                'name'        => 'Tire Rotation & Alignment',
                'description' => 'Extend the life of your tires with a professional rotation and precision wheel alignment.',
                'price'       => '$69.99',
                'duration'    => '1 hr',
                'icon'        => '🔄',
            ],
            [
                'name'        => 'Engine Diagnostics',
                'description' => 'Advanced OBD-II scan and thorough diagnostic to identify any engine trouble codes or issues.',
                'price'       => '$59.99',
                'duration'    => '45 min',
                'icon'        => '🔍',
            ],
            [
                'name'        => 'AC Service',
                'description' => 'Air conditioning recharge, leak check, and cabin filter replacement for a cool ride.',
                'price'       => '$89.99',
                'duration'    => '1 hr',
                'icon'        => '❄️',
            ],
            [
                'name'        => 'Transmission Service',
                'description' => 'Fluid flush and filter replacement to keep your transmission shifting smoothly.',
                'price'       => '$149.99',
                'duration'    => '2 hrs',
                'icon'        => '⚙️',
            ],
        ];

        foreach ($services as $service) {
            Service::firstOrCreate(['name' => $service['name']], $service);
        }
    }
}
