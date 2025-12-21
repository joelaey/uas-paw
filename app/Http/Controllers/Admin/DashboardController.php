<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Aspiration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Show admin dashboard
     */
    public function index()
    {
        // Get statistics
        $totalAspirations = Aspiration::count();
        $processingAspirations = Aspiration::status('diproses')->count();
        $completedAspirations = Aspiration::status('selesai')->count();
        $rejectedAspirations = Aspiration::status('ditolak')->count();
        $newAspirations = Aspiration::status('baru')->count();

        // Get recent aspirations
        $recentAspirations = Aspiration::with('user')
            ->latest()
            ->take(10)
            ->get();

        return view('admin.dashboard', compact(
            'totalAspirations',
            'processingAspirations',
            'completedAspirations',
            'rejectedAspirations',
            'newAspirations',
            'recentAspirations'
        ));
    }
}
