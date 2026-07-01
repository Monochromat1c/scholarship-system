<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@scholarship.com',
            'password' => Hash::make('password'),
            'student_id' => 'ADMIN001',
            'role' => 'admin',
            'is_active' => true,
            'status' => 'qualified',
        ]);
    }
}