<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\VisitController;
use Illuminate\Support\Facades\Route;

Route::get("/", [VisitController::class, "home"]);
Route::get("/about", [VisitController::class, "about"]);
Route::get("/contact", [VisitController::class, "contact"]);
Route::get("/join", [VisitController::class, "join"]);
Route::post("/register", [AuthController::class, "register"])->name("signup");
Route::post("/login", [AuthController::class, "login"])->name("login");
