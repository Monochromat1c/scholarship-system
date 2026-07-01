<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
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
        'remarks',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'birth_date' => 'date',
            'exam_score' => 'float',
            'gpa' => 'float',
            'rank' => 'integer',
            'is_active' => 'boolean',
        ];
    }

    // Helper methods
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isStudent(): bool
    {
        return $this->role === 'student';
    }

    public function scopeQualified($query)
    {
        return $query->where('status', 'qualified');
    }

    public function scopeTopRanked($query, $limit = 300)
    {
        return $query->where('status', 'qualified')
                     ->orderBy('rank')
                     ->limit($limit);
    }
}