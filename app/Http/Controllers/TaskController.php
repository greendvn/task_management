<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTaskRequest;
use App\Http\Services\TaskServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TaskController extends Controller
{
    public $taskService;

    public function __construct(TaskServiceInterface $taskService)
    {
        $this->taskService = $taskService;
    }


    public function index()
    {
        $tasks = $this->taskService->getAll();
        return view('tasks.index', compact('tasks'));
    }


    public function create()
    {
        return view('tasks.create');

    }


    public function store(CreateTaskRequest $request)
    {
        $this->taskService->create($request);
        Session::flash('succes','Tạo mới thành công');
        return redirect()->route('tasks.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $task = $this->taskService->show($id);
        return view('tasks.edit', compact('task'));
    }


    public function update(Request $request, $id)
    {
        $this->taskService->update($request, $id);
        Session::flash('succes','Edit thành công');
        return redirect()->route('tasks.index');
    }


    public function destroy($id)
    {
        $this->taskService->delete($id);
        Session::flash('succes','Delete thành công');
        return redirect()->route('tasks.index');

    }
}
