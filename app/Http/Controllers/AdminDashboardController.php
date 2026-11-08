<?php

namespace App\Http\Controllers;

use App\Models\AcademicData;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminDashboardController extends Controller
{
    /**
     * Show the dashboard with statistic widgets.
     */
    public function index(Request $request)
    {
        $totalUsers = User::count();
        $totalAcademicData = AcademicData::count();
        $totalRoles = Role::count();
        $totalPermissions = Permission::count();

        return view('admin.dashboard', [
            'totalUsers' => $totalUsers,
            'totalAcademicData' => $totalAcademicData,
            'totalRoles' => $totalRoles,
            'totalPermissions' => $totalPermissions,
        ]);
    }
}