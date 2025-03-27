<?php

use App\Http\Controllers\VisitController;
use Illuminate\Support\Facades\Route;

Route::get("/", [VisitController::class, "home"]);
Route::get("/about", [VisitController::class, "about"]);
Route::get("/contact", [VisitController::class, "contact"]);
