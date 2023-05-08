@extends('layouts.app')
@section('content')

    <div class="panel-body border border-1 w-50 mt-5 me-0 ms-auto me-auto">
        @include('common.errors')
        <div class=" pt-3 pb-3 bg-light w-100 bordtask-nameer border-1"><h6 class=" w-75 mt-0 me-0 ms-auto me-auto">New Task</h6></div>
         <form action="{{route('task#list')}}" method="POST" class="form-horizontal w-75 mt-3 mb-3 ms-auto me-auto ">
                @csrf
             <div class="form-group">
                 <label for="task" class="col-sm-12 control-label text-dark">Task</label>
                 <div class="col-sm-12">
                    <input type="text" name="name" id="task-name" class="form-control">
                 </div>
             </div>
             <div class="form-group">
                 <div class="col-sm-offset-3 col-sm-6 mt-3">
                    <button type="submit" class="btn btn-default border border-1">
                        <i class="fa fa-plus"></i> Add Task
                    </button>
                </div>
            </div>
        </form>
    </div>
       @if (count($task) > 0)
       <div class="panel panel-default border border-1 w-50 mt-5 me-0 ms-auto me-auto mb-5">
            <div class="panel-heading pt-3 pb-3 bg-light w-100 border border-1">
            <h6 class=" w-75 mt-0 me-0 ms-auto me-auto">Current Tasks</h6>
            </div>
            <div class="panel-body w-75 mt-0 me-0 ms-auto me-auto">
                <table class="table table-striped task-table">
                    <thead>
                        <th>Task</th>
                        
                    </thead>
                    <tbody>
                        @foreach ($task as $tasks)
                            <tr>
                                <td class="table-text">
                                    <div>{{ $tasks->name }}</div>
                                </td>
                                
                                <td>
                                <form action="{{ url('taskList/'.$tasks->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-trash"></i> Delete
                                    </button>
                                </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection
