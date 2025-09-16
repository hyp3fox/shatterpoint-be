<?php

namespace App\Http\Controllers;

use App\Models\Unit;

class UnitsController extends Controller
{
    public function index()
    {
        // Get all rows from the 'units' table
        $units = Unit::all();

        // Pass data to view
        return view('units.index', compact('units'));
    }
}
