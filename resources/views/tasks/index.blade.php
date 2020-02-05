@extends('layout.master')
@section('title','tasks list')
@section('content')


    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                Tasks List
            </div>
            @if(\Illuminate\Support\Facades\Session::has('succes'))
                {{ \Illuminate\Support\Facades\Session::get('succes')}}
            @endif

            @if(!isset($tasks))
                <h5 class="text-primary">Dữ liệu không tồn tại!</h5>
            @else
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Task title</th>
                        <th scope="col">Content</th>
                        <th scope="col">Created</th>
                        <th scope="col">Due Date</th>
                        <th scope="col">image</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($tasks) == 0)
                        <tr>
                            <td colspan="5"><h5 class="text-primary">Hiện tại chưa có task nào được tạo!</h5></td>
                        </tr>
                    @else
                        @foreach($tasks as $key => $task)
                            <tr>
                                <td scope="row">{{ ++$key }}</td>
                                <td>{{ $task->title }}</td>
                                <td>{{ $task->content }}</td>
                                <td>{{ $task->created_at }}</td>
                                <td>{{ $task->due_date }}</td>
                                <td><img src="{{asset('storage/images/'.$task->file_name)}}" style="height: 50px"></td>
                                <td>
                                    <a href="{{route('tasks.edit',$task->id)}}" class="btn btn-danger">edit</a>
                                </td>
                                <td>
                                    <form action="{{route('tasks.destroy',$task->id)}}" method="post"
                                          style="float: left">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Bạn chắc chắn muốn xóa?')">Xóa
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
                {{$tasks->links()}}
            @endif

            <a href="../">< Back</a>

        </div>
    </div>
@endsection
