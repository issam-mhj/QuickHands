<?php

namespace App\Http\Controllers;

use App\Models\Flag;
use App\Models\Message;
use App\Models\Offer;
use App\Models\Provider;
use App\Models\Review;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Illuminate\Validation\Rule;
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
    public function editUser(Request $request)
    {
        dd($request);
    }

    public function showproviderManage()
    {
        $user = auth()->user();
        $provider = user::where('role', 'provider')->get();
        return view("admin.providerManagement", [
            "user" => $user,
            "providers" => $provider,
        ]);
    }
    public function showContent()
    {
        $user = auth()->user();
        $pendingReview = Flag::where('status', 'pending')->count();
        $flaggedReviews = Flag::where('content_type', 'review')->count();
        $flaggedServices = Flag::where('content_type', 'service')->count();
        $flaggedMessage = Flag::where('content_type', 'message')->count();
        $allReviews = Flag::where('content_type', 'review')->get();
        $allMessage = Flag::where('content_type', 'message')->get();
        $allServices = Flag::where('content_type', 'service')->get();
        return view("admin.content", [
            "user" => $user,
            "PreportsNum" => $pendingReview,
            "flaggedReviews" => $flaggedReviews,
            "flaggedServices" => $flaggedServices,
            "flaggedMessage" => $flaggedMessage,
            "reviews" => $allReviews,
            "messages" => $allMessage,
            "services" => $allServices,
        ]);
    }
    public function solvedflag(Flag $id)
    {
        $id->update(['status' => 'reviewed']);
        return redirect()->back();
    }
    public function deleteflag(Flag $id)
    {
        $id->delete();
        return redirect()->back();
    }
    public function showAnalytics()
    {
        $user = auth()->user();
        $users = User::where("role", "user")->count();
        $providers = User::where("role", "provider")->count();
        $tasks = Task::count();
        $totalAmmount = Offer::where("status", "accepted")->sum("proposed_amount");
        $janUsersCount = User::whereMonth('created_at', 1)->count();
        $febUsersCount = User::whereMonth('created_at', 2)->count();
        $marUsersCount = User::whereMonth('created_at', 3)->count();
        $aprUsersCount = User::whereMonth('created_at', 4)->count();
        $maiUsersCount = User::whereMonth('created_at', 5)->count();
        $julUsersCount = User::whereMonth('created_at', 7)->count();
        $junUsersCount = User::whereMonth('created_at', 6)->count();
        $postedServ = Service::count();
        $reviewsNum = Review::count();
        $messageNum = Message::count();
        $firstAge = user::where("age", "<=", "24")->count();
        $secondAge = User::where('age', '<=', 34)->where('age', '>=', 25)->count();
        $thirdAge = User::where('age', '<=', 44)->where('age', '>=', 35)->count();
        $fourthAge = User::where('age', '<=', 54)->where('age', '>=', 45)->count();
        $fifthAge = User::where('age', '<=', 55)->count();
        $male = User::where('gender', 'm')->count();
        $female = User::where('gender', 'f')->count();
        $janProvearn = offer::whereMonth('created_at', 1)->where("status", "accepted")->count();
        $febProvearn = offer::whereMonth('created_at', 2)->where("status", "accepted")->count();
        $marProvearn = offer::whereMonth('created_at', 3)->where("status", "accepted")->count();
        $avrProvearn = offer::whereMonth('created_at', 4)->where("status", "accepted")->count();
        $maiProvearn = offer::whereMonth('created_at', 5)->where("status", "accepted")->count();
        $junProvearn = offer::whereMonth('created_at', 6)->where("status", "accepted")->count();
        $julProvearn = offer::whereMonth('created_at', 7)->where("status", "accepted")->count();
        $oneRate = review::where('rating', '>=', 1.0)->where('rating', '<', 2.0)->count();
        $twoRate = review::where('rating', '>=', 2.0)->where('rating', '<', 3.0)->count();
        $threeRate = review::where('rating', '>=', 3.0)->where('rating', '<', 4.0)->count();
        $fourRate = review::where('rating', '>=', 4.0)->where('rating', '<', 5.0)->count();
        $fiveRate = review::where('rating', '>=', 5.0)->count();
        $providerStats = provider::all();
        $reviews = Review::all();
        $tasksCom = task::where("status", "completed")->get();
        $allTasks = task::all();
        // dd($oneRate);
        return view("admin.analytics", [
            "user" => $user,
            "usersNum" => $users,
            "provNum" => $providers,
            "taskNum" => $tasks,
            "totalRev" => $totalAmmount,
            "janUsersCount" => $janUsersCount,
            "febUsersCount" => $febUsersCount,
            "marUsersCount" => $marUsersCount,
            "aprUsersCount" => $aprUsersCount,
            "maiUsersCount" => $maiUsersCount,
            "julUsersCount" => $julUsersCount,
            "junUsersCount" => $junUsersCount,
            "serviceNum" => $postedServ,
            "reviewsNum" => $reviewsNum,
            "messageNum" => $messageNum,
            "firstAge" => $firstAge,
            "secondAge" => $secondAge,
            "thirdAge" => $thirdAge,
            "fourthAge" => $fourthAge,
            "fifthAge" => $fifthAge,
            "male" => $male,
            "female" => $female,
            "janProvearn" => $janProvearn,
            "febProvearn" => $febProvearn,
            "marProvearn" => $marProvearn,
            "avrProvearn" => $avrProvearn,
            "maiProvearn" => $maiProvearn,
            "junProvearn" => $junProvearn,
            "julProvearn" => $julProvearn,
            "oneRate" => $oneRate,
            "twoRate" => $twoRate,
            "threeRate" => $threeRate,
            "fourRate" => $fourRate,
            "fiveRate" => $fiveRate,
            "providerStats" => $providerStats,
            "tasks" => $tasksCom,
            "reviews" => $reviews,
            "allTasks" => $allTasks,
        ]);
    }
    public function showSettings()
    {
        $user = auth()->user();
        return view("admin.settings", [
            "user" => $user,
        ]);
    }
    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        $validated = $request->validate([
            'name' => ['sometimes', 'string', 'max:255'],
            'email' => ['sometimes', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'age' => ['nullable', 'integer', 'min:18', 'max:100'],
            'gender' => ['nullable', 'in:m,f'],
            'location' => ['nullable', 'string', 'max:255'],
            'password' => ['nullable', 'current_password'],
            'new_password' => ['nullable', 'confirmed', 'min:8', 'regex:/[a-z]/', 'regex:/[A-Z]/', 'regex:/[0-9]/', 'regex:/[@$!%*#?&]/'],
        ]);
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->age = $validated['age'] ?? null;
        $user->gender = $validated['gender'] ?? null;
        $user->location = $validated['location'] ?? null;

        if (!empty($validated['new_password'])) {
            $user->password = Hash::make($validated['new_password']);
        }
        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    public function showUserDashboard()
    {
        $user = auth()->user();
        $usertasksNum = Task::with(['offer.service'])
            ->whereHas('offer.service', function ($query) {
                $query->where('user_id', auth()->id());
            })->count();
        $usertasks = Task::with(['offer.service'])
            ->whereHas('offer.service', function ($query) {
                $query->where('user_id', auth()->id());
            })->where("status", "completed")->get();
        $totalspent = 0;
        foreach ($usertasks as $task) {
            $totalspent += $task->offer->proposed_amount;
        }
        return view("user.dashboard", [
            "user" => $user,
            "usertasksNum" => $usertasksNum,
            "totalspent" => $totalspent,
            "usertasks" => $usertasks,
        ]);
    }
}
