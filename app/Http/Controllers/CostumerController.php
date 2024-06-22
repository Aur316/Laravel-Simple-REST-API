<?php

namespace App\Http\Controllers;

use App\Models\Costumer;
use Illuminate\Http\Request;

class CostumerController extends Controller
{
    public function index()
    {
        return response()->json(Costumer::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'email' => 'required|email|unique:costumers',
            'phone' => 'required',
            'gps_coordinates' => 'nullable',
        ]);

        $costumer = Costumer::create($request->all());
        return response()->json($costumer, 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'full_name' => 'required',
            'email' => 'required|email|unique:costumers,email,' . $id,
            'phone' => 'required',
            'gps_coordinates' => 'nullable',
            ]);

        $costumer = Costumer::findOrFail($id);
        $costumer->update($request->all());
        return response()->json($costumer, 200);
    }

    public function destroy($id)
    {
        $costumer = Costumer::findOrFail($id);

        if ($costumer->tasks()->where('status', 'inprogress')->exists()) {
            return response()->json(['error' => 'Cannot delete costumer with active tasks'], 400);
        }

        $costumer->delete();
        return response()->json(['message' => 'Costumer deleted successfully'], 200);
    }
}
