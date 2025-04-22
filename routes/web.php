<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisitController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SocialiteController;

Route::get("/", [VisitController::class, "home"]);
Route::get("/about", [VisitController::class, "about"]);
Route::get("/contact", [VisitController::class, "contact"]);
Route::get("/join", [VisitController::class, "join"]);



Route::post("/register", [AuthController::class, "register"])->name("signup");
Route::post("/login", [AuthController::class, "login"])->name("login");

Route::get("/admin/dashboard", [UserController::class, "showAdminDashboard"])->name("admin.dashboard");
Route::get("/admin/usermanage", [UserController::class, "showUserManage"])->name("admin.users");

Route::post("/adduser", [UserController::class, "storeUser"]);

Route::get("/admin/providermanage", [AuthController::class, "showproviderManage"])->name("admin.provider");
Route::get("/admin/content", [AuthController::class, "showContent"])->name("admin.content");
Route::get("/admin/task", [AuthController::class, "showTask"])->name("admin.tasks");
Route::get("/admin/analytics", [AuthController::class, "showAnalytics"])->name("admin.analytics");
Route::get("/admin/notifications", [AuthController::class, "showNotifications"])->name("admin.notifications");
Route::get("/admin/settings", [AuthController::class, "showSettings"])->name("admin.settings");
Route::get("/todotask", [AuthController::class, "showAvailableTasks"]);
Route::get("/taskmanage", [AuthController::class, "showTaskManage"]);
Route::get("/payment", [AuthController::class, "showPayment"]);
Route::get("/reviews", [AuthController::class, "showReviews"]);
Route::get("/profile", [AuthController::class, "showProfile"]);
Route::get("/messages", [AuthController::class, "showMsg"]);
Route::get("/support", [AuthController::class, "showSupport"]);
Route::get("/user", [AuthController::class, "showUserDashboard"]);
Route::get("/user/task", [AuthController::class, "showPostTask"]);
Route::get("/user/activetask", [AuthController::class, "showActiveTask"]);
Route::get("/user/selectprovider", [AuthController::class, "showSelectProvider"]);
Route::get("/user/conversation", [AuthController::class, "showMessages"]);
Route::get("/user/reviews", [AuthController::class, "showUserReviews"]);
Route::get("/user/profile", [AuthController::class, "showUserProfile"]);



Route::get('/auth/{provider}', [SocialiteController::class, 'redirectToProvider']);
Route::get('/auth/{provider}/callback', [SocialiteController::class, 'handleProviderCallback']);
