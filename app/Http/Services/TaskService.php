<?php


namespace App\Http\Services;


use App\Http\Repositories\TaskRepoInterface;
use App\Task;
use Illuminate\Support\Facades\Storage;

class TaskService implements TaskServiceInterface
{

    public $taskRepo;

    public function __construct(TaskRepoInterface $taskRepo)
    {
        $this->taskRepo = $taskRepo;
    }

    public function getAll()
    {
        return $this->taskRepo->getAll();
    }

    public function create($request)
    {


        $task = new Task();
        $task->title = $request->title;
        $task->content = $request->content;
        $task->due_date = $request->due_date;
        if(!$request->hasFile('file_name')){
            $task->file_name = $request->file_name;
        } else {
            $file = $request->file_name;
            $fileExtension  = $file->getClientOriginalExtension();
            $fileName = $request->inputFileName;

            $newFileName = "$fileName.$fileExtension";
            $request->file('file_name')->storeAs('public/images',$newFileName);
//            $file->move(base_path('public/images'),$newFileName);
            $task->file_name = $newFileName;
        }
        $this->taskRepo->create($task);

    }

    public function update($request, $id)
    {
        $task = $this->taskRepo->show($id);
        $task->title = $request->title;
        $task->content = $request->content;
        $task->due_date = $request->due_date;

        if($request->hasFile('inputFile')){
            $currentFileName = $task->file_name;
            if($currentFileName){
                Storage::delete('public/images/'.$currentFileName);
            }

            $file = $request->file_name;
            $fileExtension  = $file->getClientOriginalExtension();
            $fileName = $request->inputFileName;
            $newFileName = "$fileName.$fileExtension";
            $request->file('file_name')->storeAs('public/images',$newFileName);
//            $file->move(public_path('images'),$newFileName);
            $task->file_name = $newFileName;

        }
        $this->taskRepo->update($task,$id);



    }


    public function delete($id)
    {
        $task = $this->taskRepo->show($id);
        $this->taskRepo->delete($task);
    }

    public function show($id)
    {
        return $this->taskRepo->show($id);
    }
}
