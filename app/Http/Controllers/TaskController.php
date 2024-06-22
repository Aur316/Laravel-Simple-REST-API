<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return response()->json(Task::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'costumer_id' => 'required|exists:costumers,id',
            'description' => 'required',
            'type' => 'required|in:fault,investment,other',
            'status' => 'required|in:inprogress,done,failed',
            'gps_coordinates' => 'nullable',
        ]);

        $task = Task::create($request->all());

        if ($request->has('worker_ids')) {
            $task->workers()->attach($request->input('worker_ids'));
        }

        return response()->json($task, 201);
    }

    public function show($id)
    {
        return response()->json(Task::with('workers')->findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);

        $request->validate([
            'description' => 'required',
            'type' => 'required|in:fault,investment,other',
            'status' => 'required|in:inprogress,done,failed',
            'gps_coordinates' => 'nullable',
        ]);

        $task->update($request->except('costumer_id'));

        if ($request->has('worker_ids')) {
            $task->workers()->sync($request->input('worker_ids'));
        }

        return response()->json($task, 200);
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return response()->json(['message' => 'Task deleted successfully'], 204);
    }
}
