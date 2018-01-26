<?php

namespace gndlovu\LaravelApi\Http\Controllers;

use Illuminate\Http\Request;
use gndlovu\LaravelApi\Models\Task;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    public function postTask(Request $request)
    {
        $title = $request->input('title');
        if(!$title)
        {
            return response()->json(['message' => 'Please provide a valid value for title.'], 404);
        }

        $task = new Task();
        $task->title = $request->input('title');
        $task->due_date = $request->input('due_date');
        $task->status = $request->input('status');
        $task->save();

        return response()->json(['task' => $task], 201);
    }

    public function getTasks($status = 'open')
    {
        $tasks = Task::where('status', $status)->orderBy('due_date', 'desc')->get();

        return response()->json(['tasks' => $tasks], 200);
    }

    public function putTask(Request $request, $id)
    {
        $task = Task::find($id);
        if(!$task)
        {
            return response()->json(['message' => 'Task not found'], 404);
        }
        $task->title = $request->input('title');
        $task->due_date = $request->input('due_date');
        $task->status = $request->input('status');
        $task->save();

        return response()->json(['task' => $task], 200);
    }

    public function deleteTask($id)
    {
        $task = Task::find($id);
        if(!$task)
        {
            return response()->json(['message' => 'Task not found'], 404);
        }
        $task->delete();

        return response()->json(['message' => 'Task deleted'], 200);
    }
}
