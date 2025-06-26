<?php

use App\Http\Controllers\MaterialController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::apiResource('/material', MaterialController::class);

