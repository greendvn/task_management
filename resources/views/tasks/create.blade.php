@extends('layout.master')
@section('title','create')
@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                Add new Task
            </div>
            <form class="text-left" method="post" action="{{route('tasks.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="inputTitle">Task title</label>
                    <input type="text" class="form-control" id="inputTitle" name="title" value="{{old('title')}}">
                </div>
                @if($errors->has('title'))
                    {{$errors->first('title')}}
                @endif
                <div class="form-group">
                    <label for="inputContent">Task content</label>
                    <textarea class="form-control" id="inputContent" name="content" rows="3" >{{old('content')}}</textarea>
                </div>
                @if($errors->has('content'))
                    {{$errors->first('content')}}
                @endif
                <div class="form-group">
                    <label for="inputDueDate">Due Date</label>
                    <input type="date" class="form-control" id="inputDueDate" name="due_date" value="{{old('due_date')}}">
                </div>
                @if($errors->has('due_date'))
                    {{$errors->first('due_date')}}
                @endif
                <div class="form-group">
                    <label for="inputFileName">File Name</label>
                    <input type="text" class="form-control" id="inputFileName" name="inputFileName" value="{{old('inputFileName')}}">
                    <input type="file" class="form-control-file" id="inputFile" name="file_name">
                </div>
                @if($errors->has('file_name'))
                    {{$errors->first('file_name')}}
                @endif
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <hr>
            <a href="../">< Back</a>
        </div>
    </div>

@endsection
