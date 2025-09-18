<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unit;

class UnitController extends Controller
{
    // GET /api/units
    public function index()
    {
        return response()->json(Unit::all());
    }

    // GET /api/units/{id}
    public function show($id)
    {
        return response()->json(Unit::findOrFail($id));
    }

    // POST /api/units
    public function store(Request $request)
    {
        $validated = $request->validate([
            'unit_name' => 'required|string|max:255',
            'affiliation' => 'required|string|max:255',
            'unit_type' => 'required|string|max:255',
            'image_id' => 'nullable|integer',
        ]);

        $unit = Unit::create($validated);

        return response()->json($unit, 201);
    }

    // PUT /api/units/{id}
    public function update(Request $request, $id)
    {
        $unit = Unit::findOrFail($id);

        $unit->update($request->all());

        return response()->json($unit);
    }

    // DELETE /api/units/{id}
    public function destroy($id)
    {
        Unit::destroy($id);

        return response()->json(null, 204);
    }
}
