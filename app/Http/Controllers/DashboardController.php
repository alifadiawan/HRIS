<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $task = Task::where('member_id', auth()->user()->member->id)->where('status', '!=', 'done')->where('status', '!=', 'checking')->latest()->take(4)->get();
        $task_adm = Task::latest()->take(5)->get();
        $task_all = Task::all();
        $task_todo = Task::where('status', 'todo')->get();
        $task_doing = Task::where('status', 'doing')->get();
        $task_done = Task::where('status', 'done')->get();
        $task_checking = Task::where('status', 'checking')->get();
        return view('welcome', compact('task', 'task_adm', 'task_all', 'task_todo', 'task_doing', 'task_checking', 'task_done'));
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
