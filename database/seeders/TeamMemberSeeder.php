<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Seeder;

class TeamMemberSeeder extends Seeder
{
    public function run(): void
    {
        $members = [
            [
                'name'  => 'Carlos Reyes',
                'role'  => 'Lead Technician',
                'bio'   => 'ASE Master Certified with 15+ years of experience in diagnostics and engine repair.',
                'order' => 1,
            ],
            [
                'name'  => 'Maria Santos',
                'role'  => 'Service Advisor',
                'bio'   => 'Dedicated to providing exceptional customer service and transparent repair estimates.',
                'order' => 2,
            ],
            [
                'name'  => 'Jake Morales',
                'role'  => 'Brake & Suspension Specialist',
                'bio'   => 'Expert in brake systems, suspension, and alignment with 8 years of hands-on experience.',
                'order' => 3,
            ],
            [
                'name'  => 'Tina Cruz',
                'role'  => 'Shop Manager',
                'bio'   => 'Keeps the shop running smoothly ensuring quality control and on-time service delivery.',
                'order' => 4,
            ],
        ];

        foreach ($members as $member) {
            TeamMember::firstOrCreate(['name' => $member['name']], $member);
        }
    }
}
