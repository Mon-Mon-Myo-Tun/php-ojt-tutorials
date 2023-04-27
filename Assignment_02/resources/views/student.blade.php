@extends('layout.app')
@section('content')

    <nav class="navbar nav-bg">
        <div class="container ">
            <div class="d-flex justify-content-between w-100 ">
                Navbar
                <p class="pt-2">
                    <a href="#" class="text-dark ms-2 text-decoration-none text-secondary "> Students</a>
                    <a href="{{route('show#list')}}" class="text-secondary text-decoration-none "> Majors</a>
                </p>
                
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="d-flex justify-content-between w-100 mt-5 mb-5">
            <a href="{{route('create#student')}}" class="btn btn-primary">Create</a>
            <div class="d-flex">
            <a href="{{route('export#student')}}" class="btn btn-primary">Export</a>
            <form action="{{route('import#student')}}" method="post" enctype="multipart/form-data" class="d-flex">
                @csrf
                <div>
                    <input type="file" name="file" class="ms-2">
                    <button type="submit" class="btn btn-primary ">Import</button>
                </div>
            </form>
            </div>
        </div>
        
        <div class="card w-75 m-auto ">
        <div class="card-header"><h4 class=" ms-4">Student Lists</h4></div>
        <table class="table" style="width:95%;">

        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Major</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Address</th>
            <th>Actions</th>
        </thead>
            <tbody>
                @foreach ($student as $students)
                    <tr>
                        
                        <td class="table-text">
                            <div>{{ $students->id }}</div>
                        </td>
                        <td class="table-text">
                            <div>{{ $students->name }}</div>
                        </td>

                        <td class="table-text">
                            <div>{{ $students->major->name}}</div>
                        </td>
                        <td class="table-text">
                            <div>{{ $students->phone }}</div>
                        </td>
                        <td class="table-text">
                            <div>{{ $students->email}}</div>
                        </td>
                        <td class="table-text">
                            <div>{{ $students->address }}</div>
                        </td>
                        <td>
                        <form action="{{ url('studentlist/'.$students->id) }}" method="POST">
                            @csrf
                            {{ method_field('DELETE') }}
                            <a href="{{ url('editstudent/'.$students->id.'/edit') }}" class="btn btn-success btn-sm">Edit</a>
                            <button type="submit" class="btn btn-danger btn-sm"> Delete </button>
                        </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>

    <div clss="container mt-5">
    @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>
@endsection