<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Provider;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function showAdminDashboard()
    {
        $user = auth()->user();
        $users = User::where("role", "user")->count();
        $providers = User::where("role", "provider")->count();
        $activeServices  = Service::where("status", "!=", "completed")->count();
        $totalAmmount = Offer::where("status", "accepted")->sum("proposed_amount");
        $topCategories = ServiceCategory::select('service_categories.*', DB::raw('COUNT(services.id) as service_count'))
            ->join('services', 'services.service_category_id', '=', 'service_categories.id')
            ->groupBy('service_categories.id')
            ->orderByDesc('service_count')
            ->take(5)
            ->get();
        $totalCategory = $topCategories[0]->service_count + $topCategories[1]->service_count + $topCategories[2]->service_count + $topCategories[3]->service_count;
        $topProviders = Offer::with('provider')
            ->where('status', 'accepted')
            ->whereHas('service', function ($query) {
                $query->where('status', 'completed');
            })
            ->select('provider_id', DB::raw('COUNT(*) as completed_offers'))
            ->groupBy('provider_id')
            ->orderByDesc('completed_offers')
            ->get();

        return view('/admin/dashboard', [
            "user" => $user,
            "userNum" => $users,
            "providerNum" => $providers,
            "activeSrv" => $activeServices,
            "totalAmount" => $totalAmmount,
            "categories" => $topCategories,
            "total" => $totalCategory,
        ]);
    }

    public function showUserManage()
    {
        $user = auth()->user();
        return view("admin.userManagement", [
            "user" => $user,

        ]);
    }
}
