<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Show user dashboard
     */
    public function index()
    {
        $user = Auth::user();

        // Get statistics
        $totalAspirations = $user->aspirations()->count();
        $waitingAspirations = $user->aspirations()->status('baru')->count();
        $processingAspirations = $user->aspirations()->status('diproses')->count();
        $completedAspirations = $user->aspirations()->status('selesai')->count();

        // Get recent aspirations
        $recentAspirations = $user->aspirations()
            ->latest()
            ->take(5)
            ->get();

        return view('user.dashboard', compact(
            'user',
            'totalAspirations',
            'waitingAspirations',
            'processingAspirations',
            'completedAspirations',
            'recentAspirations'
        ));
    }
}
