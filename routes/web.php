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

Route::get("/admin/dashboard", [UserController::class, "showAdminDashboard"]);
Route::get("/admin/usermanage", [UserController::class, "showUserManage"]);


Route::get("/admin/providermanage", [AuthController::class, "showproviderManage"]);
Route::get("/admin/content", [AuthController::class, "showContent"]);
Route::get("/admin/task", [AuthController::class, "showTask"]);
Route::get("/admin/analytics", [AuthController::class, "showAnalytics"]);
Route::get("/admin/notifications", [AuthController::class, "showNotifications"]);
Route::get("/admin/settings", [AuthController::class, "showSettings"]);
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
