@extends('layout.master')
@section('title','edit')
@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                Edit Task
            </div>
            <form class="text-left" method="post" action="{{route('tasks.update',$task->id)}}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="inputTitle">Task title</label>
                    <input type="text" class="form-control" id="inputTitle" name="title" value="{{$task->title}}" >
                </div>
                <div class="form-group">
                    <label for="inputContent">Task content</label>
                    <textarea class="form-control" id="inputContent" name="content" rows="3" required>{{$task->content}}</textarea>
                </div>
                <div class="form-group">
                    <label for="inputDueDate">Due Date</label>
                    <input type="date" class="form-control" id="inputDueDate" name="due_date" value="{{$task->due_date}}">
                </div>
                <div class="form-group">
                    <label for="inputFileName">File Name</label>
                    <input type="text" class="form-control" id="inputFileName" name="inputFileName">
                    <input type="file" class="form-control-file" id="inputFile" name="file_name">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>

            </form>
            <hr>
        </div>
    </div>

@endsection
