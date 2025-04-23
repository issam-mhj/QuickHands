<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Provider;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash as FacadesHash;
use phpseclib3\Crypt\Hash;

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
        $allusers = user::where('role', '!=', 'admin')->get();
        return view("admin.userManagement", [
            "user" => $user,
            "users" => $allusers,
        ]);
    }
    public function storeUser(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:30',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);
        $role = $request->role;
        $user = User::create([
            "name" => $validated['name'],
            "email" => $validated['email'],
            "password" => FacadesHash::make($validated['password']),
            "role" => $role,
        ]);
        if ($role == "provider") {
            Provider::create([
                'status' => "pending",
                'user_id' => $user->id,
            ]);
        }

        return redirect()->back();
    }
}
