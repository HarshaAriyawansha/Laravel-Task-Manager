<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Task;

class AdminTaskController extends Controller
{
        public function index(Request $request)
{
    $query = Task::query();
    $tasks = $query->paginate(5)->withQueryString();

    return view('task-admin.index', compact('tasks'));
}

    public function create()
    {
        return view('task-admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255|unique:tasks,title',
            'description' => 'required|string|max:255'
        ]);

            Task::create([
                'title' => $request->title,
        'description' => $request->description,
                'status' => 'pending', // optional default value
]);


            return redirect()->route('task-admin.index')->with('status', 'Task Created Successfully');

    }

public function edit($id)
{
    $task = Task::findOrFail($id);
    return view('task-admin.edit', compact('task'));
}

public function update(Request $request, $id)
{
    $task = Task::findOrFail($id);

    $request->validate([
        'title' => 'required|string|max:255|unique:tasks,title,' . $task->id,
        'description' => 'required|string|max:255',
        'status' => 'required|in:pending,done',
    ]);

    $task->update([
        'title' => $request->title,
        'description' => $request->description,
        'status' => $request->status,
    ]);

    return redirect('task-admin')->with('status', 'Task Updated Successfully');
}


    public function destroy($taskId)
    {
        $task = Task::find($taskId);
        $task->delete();
        return redirect('task-admin')->with('status', 'Task Deleted Successfully');
    }


}
