@extends('layout.app')
@section('content')

    <nav class="navbar nav-bg">
        <div class="container ">
            <div class="d-flex justify-content-between w-100 ">
                Navbar
                <p class="pt-2">
                    <a href="{{route('student#list')}}"  class="text-dark ms-2 text-decoration-none "> Students</a>
                    <a href="#" class="text-secondary text-decoration-none "> Majors</a>
                </p>  
            </div>
        </div>
    </nav>

    <div class="container">
        <button class="btn btn-info mt-5">
        <a href="{{route('create#major')}} "class="text-dark ms-2 text-decoration-none text-white">Create</a>
        </button>
        <div class="card w-75 m-auto">
        <div class="card-header"><h4 class=" ms-4">Major Lists</h4></div>
        <table class="table" style="width:95%;">

        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Actions</th>
        </thead>
        <tbody>
            @foreach ($major as $majors)
                <tr>
                    
                    <td class="table-text">
                        <div>{{ $majors->id }}</div>
                    </td>
                    <td class="table-text">
                        <div>{{ $majors->name }}</div>
                    </td>
                    <td>
                    <form action="{{ url('showmajor/'.$majors->id) }}" method="POST">
                        @csrf
                        {{ method_field('DELETE') }}
                        <a href="{{ url('editmajor/'.$majors->id.'/edit') }}" class="btn btn-success btn-sm">Edit</a>
                        <button type="submit" class="btn btn-danger btn-sm"> Delete </button>
                    </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    </div>

    <div class="container">
        
            @if (session()->has('successDelete'))
                <div class="alert alert-success">
                    {{ session('successDelete') }}
                </div>
            @endif
    </div>
      
    
@endsection