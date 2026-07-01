<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('student_id')->unique()->nullable()->after('id');
            $table->string('phone')->nullable()->after('email');
            $table->date('birth_date')->nullable()->after('phone');
            $table->string('address')->nullable()->after('birth_date');
            $table->enum('role', ['student', 'admin'])->default('student')->after('address');
            $table->boolean('is_active')->default(true)->after('role');
            $table->float('exam_score')->nullable()->after('is_active');
            $table->float('gpa')->nullable()->after('exam_score');
            $table->integer('rank')->nullable()->after('gpa');
            $table->enum('status', ['pending', 'qualified', 'disqualified', 'withdrawn'])->default('pending')->after('rank');
            $table->text('remarks')->nullable()->after('status');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'student_id',
                'phone',
                'birth_date',
                'address',
                'role',
                'is_active',
                'exam_score',
                'gpa',
                'rank',
                'status',
                'remarks'
            ]);
        });
    }
};