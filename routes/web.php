<?php

use App\Http\Controllers\VisitController;
use Illuminate\Support\Facades\Route;

Route::get("/",[VisitController::class,"home"]);
