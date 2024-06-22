<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    public function index()
    {
        return response()->json(Worker::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:workers',
            'gps_coordinates' => 'nullable',
        ]);

        $worker = Worker::create($request->all());
        return response()->json($worker, 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:workers,email,' . $id,
            'gps_coordinates' => 'nullable',
        ]);

        $worker = Worker::findOrFail($id);
        $worker->update($request->all());
        return response()->json($worker, 200);
    }

    public function destroy($id)
    {
        $worker = Worker::findOrFail($id);

        if ($worker->tasks()->where('status', 'inprogress')->exists()) {
            return response()->json(['error' => 'Cannot delete worker with active tasks'], 400);
        }

        $worker->delete();
        return response()->json(['message' => 'Worker deleted successfully'], 200);
    }
}
