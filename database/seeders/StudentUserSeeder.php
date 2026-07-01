<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class StudentUserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'John Doe',
            'email' => 'student@scholarship.com',
            'password' => Hash::make('password'),
            'student_id' => 'STU2024001',
            'phone' => '09123456789',
            'birth_date' => '2000-01-01',
            'address' => '123 Main St, City',
            'role' => 'student',
            'is_active' => true,
            'exam_score' => 95.5,
            'gpa' => 1.25,
            'rank' => 1,
            'status' => 'qualified',
        ]);
    }
}