<?php

// routes/api.php
use App\Http\Controllers\Api\UnitController;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

Route::apiResource('units', [UnitController::class]);