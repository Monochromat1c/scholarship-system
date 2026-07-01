<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalApplicants = User::where('role', 'student')->count();
        $qualifiedApplicants = User::where('role', 'student')
            ->where('status', 'qualified')
            ->count();
        $pendingApplicants = User::where('role', 'student')
            ->where('status', 'pending')
            ->count();
        $disqualifiedApplicants = User::where('role', 'student')
            ->whereIn('status', ['disqualified', 'withdrawn'])
            ->count();
        
        $topApplicants = User::where('role', 'student')
            ->where('status', 'qualified')
            ->orderBy('exam_score', 'desc')
            ->limit(5)
            ->get();

        return view('dashboard', compact(
            'totalApplicants',
            'qualifiedApplicants',
            'pendingApplicants',
            'disqualifiedApplicants',
            'topApplicants'
        ));
    }
}