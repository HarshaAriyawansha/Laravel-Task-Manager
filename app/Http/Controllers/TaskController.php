<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Task;

class TaskController extends Controller
{
    public function index(Request $request)
{
    $query = Task::query();
    $tasks = $query->paginate(5)->withQueryString();

    return view('task-user.index', compact('tasks'));
}

    public function create()
    {
        return view('task-user.create');
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


            return redirect()->route('task-user.index')->with('status', 'Task Created Successfully');

    }

public function edit($id)
{
    $task = Task::findOrFail($id);
    return view('task-user.edit', compact('task'));
}

public function update(Request $request, Task $task)
{
    $request->validate([
        'title' => 'required|string|max:255|unique:tasks,title,' . $task->id,
        'description' => 'required|string|max:255',
        'status' => 'required|in:pending,done',
    ]);

    $task->update($request->only(['title', 'description', 'status']));
    
    return redirect()->route('task-user.index')->with('status', 'Task Updated Successfully');


}



    public function destroy($taskId)
    {
        $task = Task::find($taskId);
        $task->delete();
        return redirect('task-user')->with('status', 'Task Deleted Successfully');
    }


}
