@extends('layout.app')
@section('content')
    <nav class="navbar nav-bg">
        <div class="container ">
            <div class="d-flex justify-content-between w-100">
                Navbar
                <p class="pt-2">
                    <a href="{{route('student#list')}}"  class="text-dark ms-2 text-decoration-none "> Students</a>
                    <a href="#" class="text-secondary text-decoration-none "> Majors</a>
                </p>
            </div>
        </div>
    </nav>
    <div class="container ">
        <div class="card">
            <div class="card-header">
                <h5>Major Create</h5>
            </div>

        <div class="card-body">
            <form action="{{route('add#major')}}" method="post">
            @csrf
                <div class="mt-3">
                    <label >Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                    <small class="text-danger">{{$errors->first('name')}}</small>
                <div class="mt-3">
                    <a href="{{route('show#list')}}" class="btn btn-secondary text-light" >Back</a>
                    <input type="submit" name="create" class="btn btn-info float-end" value="Create">
                </div>

            </form>
        </div>
    </div>
    </div>
@endsection