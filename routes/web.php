<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisitController;
use Illuminate\Support\Facades\Route;

Route::get("/", [VisitController::class, "home"]);
Route::get("/about", [VisitController::class, "about"]);
Route::get("/contact", [VisitController::class, "contact"]);
Route::get("/join", [VisitController::class, "join"]);



Route::post("/register", [AuthController::class, "register"])->name("signup");
Route::post("/login", [AuthController::class, "login"])->name("login");



Route::get("/admindashboard", [UserController::class, "showAdminDashboard"]);
Route::get("/usermanage", [AuthController::class, "showUserManage"]);
Route::get("/providermanage", [AuthController::class, "showproviderManage"]);
Route::get("/content", [AuthController::class, "showContent"]);
Route::get("/task", [AuthController::class, "showTask"]);
Route::get("/analytics", [AuthController::class, "showAnalytics"]);
Route::get("/notifications", [AuthController::class, "showNotifications"]);
Route::get("/settings", [AuthController::class, "showSettings"]);
Route::get("/todotask", [AuthController::class, "showAvailableTasks"]);
Route::get("/taskmanage", [AuthController::class, "showTaskManage"]);
Route::get("/payment", [AuthController::class, "showPayment"]);
Route::get("/reviews", [AuthController::class, "showReviews"]);
Route::get("/profile", [AuthController::class, "showProfile"]);
Route::get("/messages", [AuthController::class, "showMsg"]);
Route::get("/support", [AuthController::class, "showSupport"]);
Route::get("/user", [AuthController::class, "showUserDashboard"]);
