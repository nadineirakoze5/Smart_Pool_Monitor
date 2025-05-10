<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Swimmer;
use App\Models\Alert;

class DashboardController extends Controller
{
    // Role-based redirection to dashboard
    public function index(Request $request)
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            return $this->adminDashboard($request); // ✅ Pass $request
        }

        return $this->userDashboard();
    }

    // Admin Dashboard with filters
    public function adminDashboard(Request $request)
    {
        $query = Swimmer::with('user');

        if ($request->filled('name')) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->name . '%');
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $activeSwimmers = $query->get();
        $alerts = Alert::where('resolved', false)->latest()->get();
        $alertCount = $alerts->count();
        $deviceCount = 22; // Replace this with real logic if needed

        return view('admin.dashboard', compact('activeSwimmers', 'alerts', 'deviceCount', 'alertCount'));
    }

    // User Dashboard
    public function userDashboard()
    {
        $user = Auth::user();
        $swimmer = $user->swimmer()->with('alerts')->first();

        return view('user.dashboard', compact('swimmer'));
    }
}
