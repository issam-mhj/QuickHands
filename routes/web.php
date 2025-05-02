<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisitController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TaskController;

Route::get("/", [VisitController::class, "home"]);
Route::get("/about", [VisitController::class, "about"]);
Route::get("/contact", [VisitController::class, "contact"]);
Route::get("/join", [VisitController::class, "join"]);



Route::post("/register", [AuthController::class, "register"])->name("signup");
Route::post("/login", [AuthController::class, "login"])->name("login");
Route::post("/logout", [AuthController::class, "logout"])->name("logout");

Route::get("/admin/dashboard", [UserController::class, "showAdminDashboard"])->name("admin.dashboard");
Route::get("/admin/usermanage", [UserController::class, "showUserManage"])->name("admin.users");
Route::post("/adduser", [UserController::class, "storeUser"]);
Route::post("/edituser", [UserController::class, "editUser"]);
Route::get("/admin/providermanage", [UserController::class, "showproviderManage"])->name("admin.provider");
Route::get("/admin/content", [UserController::class, "showContent"])->name("admin.content");
Route::post("/solved/{id}", [UserController::class, "solvedflag"]);
Route::post("/remove/{id}", [UserController::class, "deleteflag"]);
Route::get("/admin/analytics", [UserController::class, "showAnalytics"])->name("admin.analytics");
Route::get("/admin/settings", [UserController::class, "showSettings"])->name("admin.settings");
Route::post("updateprofile", [UserController::class, "updateProfile"]);
Route::get("/admin/task", [TaskController::class, "showTask"])->name("admin.tasks");
Route::post("/removetask/{id}", [TaskController::class, "deleteTask"]);
Route::get("/admin/notifications", [NotificationController::class, "showNotifications"])->name("admin.notifications");
Route::post("/markasread", [NotificationController::class, "markasread"]);


Route::get("/provider/dashboard", [ProviderController::class, "showProviderDashboard"])->name("provider.dashboard");
Route::get("/provider/task", [ProviderController::class, "showAvailableTasks"]);
Route::post("/provider/task/giveoffer/{id}", [OfferController::class, "sendOffer"]);
Route::get("/provider/taskmanage", [ProviderController::class, "showTaskManage"]);
Route::post("/startedTask/{service}", [ProviderController::class, "turntostarted"]);
Route::delete("/offer/delete/{offer}", [OfferController::class, "destroy"]);
Route::get("/provider/reviews", [ProviderController::class, "showReviews"]);
Route::get("/provider/profile", [ProviderController::class, "showProfile"]);
Route::post("/provider/updateprofile", [ProviderController::class, "updateProfile"]);
Route::get("/provider/support", [ProviderController::class, "showSupport"]);
Route::get("/provider/messages", [MessageController::class, "showMsg"]);



Route::get("/user/dashboard", [UserController::class, "showUserDashboard"]);
Route::get("/user/task", [TaskController::class, "showPostTask"]);
Route::post("/user/postTask", [TaskController::class, "storeTask"]);
Route::get("/user/activetask", [TaskController::class, "showActiveTask"]);
Route::get("/user/task/detail/{service}", [ServiceController::class, "showServiceDetail"]);
Route::delete("/task/delete/{service}", [ServiceController::class, "deleteServiceDetail"]);
Route::get("/user/selectprovider", [UserController::class, "showSelectProvider"]);
Route::post("/offer/accept/{offer}", [OfferController::class, "acceptOffer"]);
Route::post("/offer/reject/{offer}", [OfferController::class, "rejectOffer"]);
Route::get("/user/reviews", [ReviewsController::class, "showUserReviews"]);
Route::post("/review/store/{offer}", [ReviewsController::class, "storeReview"]);
Route::get("/user/profile", [UserController::class, "showUserProfile"]);
Route::post("/edit/user/{user}", [UserController::class, "editUserProf"]);



Route::get("/user/conversation", [AuthController::class, "showMessages"]);

Route::get('/auth/{provider}', [SocialiteController::class, 'redirectToProvider']);
Route::get('/auth/{provider}/callback', [SocialiteController::class, 'handleProviderCallback']);
