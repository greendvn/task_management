<?php


namespace App\Http\Repositories;


use App\Task;

class TaskRepo implements TaskRepoInterface
{
    public $task;

    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    public function getAll()
    {
        return $this->task->paginate(5);
    }

    public function create($data)
    {
        $data->save();
    }

    public function update($data, $id)
    {
        $data->save();
    }


    public function delete($data)
    {
        $data->delete();
    }

    public function show($id)
    {
        return $this->task->findOrFail($id);
    }
}
