<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return 'Hello';
        $user = Auth::user();
        $totalTasks = $user->tasks()->count();

        // $Tasks = $user->tasks()->get();
        // $totalTasks = User::tasks()->count();
        $Tasks = $user->tasks()->paginate(5);

        // return $Tasks;
        return response()->json($Tasks);
        // return view('tasks.index', compact('Tasks', 'totalTasks'));
        // return response()->json([
        //     'data' => $Tasks,
        // ]);
        // return view('tasks.index', compact('Tasks', 'totalTasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
    }
}
