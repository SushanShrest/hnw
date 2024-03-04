<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Doctor',
            'email' => 'doctor@example.com',
            'password' => bcrypt('doctor123'),
            'email_verified_at' => now(),
        ])->assignRole('doctor');
    }
}
