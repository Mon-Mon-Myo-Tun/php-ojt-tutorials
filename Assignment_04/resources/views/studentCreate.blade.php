@extends('layout.app')
@section('content')
    <nav class="navbar nav-bg mb-5">
        <div class="container ">
            <div class="d-flex justify-content-between w-100">
                <a class="navbar-brand" href="#">Navbar</a>
                <p class="pt-2">
                    <a href="{{route('create#student')}}"  class="text-dark ms-2" style="text-decoration:none;"> Students</a>
                    <a href="{{route('create#major')}}" class="text-secondary" style="text-decoration:none;"> Majors</a>
                </p>
            </div>
        </div>
    </nav>
    <div class="card w-75 m-auto">
        <div class="card-header mt-3"><h4 class=" ms-4">Student Create</h4></div>  
        <div class="card-body ">
            <form action="{{route('add#student')}}" method="post" class="form-control">
            @csrf
                <div >
                    <label for="task" class="text-dark">Name</label>

                    <div class="mt-3">
                        <input type="text" name="name"  class="form-control" placeholder="name">
                    </div>
                </div>
                <small class="text-danger">{{$errors->first('name')}}</small>

                <div >
                    <label for="task" class="text-dark">Major</label>

                    <div class="mt-3">
                    <select class="form-select" aria-label="Default select example" name="major">
                @foreach ($major as $majors)
                    <option value="{{ $majors->id}}">{{ $majors->name }}</option>
                @endforeach
                </select>
                    </div>
                </div>
                <small class="text-danger">{{$errors->first('major')}}</small>

                <div class="mt-3">
                    <label  class=" control-label text-dark">Phone</label>
                    <div class="mt-3">
                        <input type="number" name="phone"  class="form-control" placeholder="09**********">
                    </div>
                </div>
                <small class="text-danger">{{$errors->first('phone')}}</small>


                <div class="mt-3">
                    <label  class="col-sm-12 control-label text-dark ">Email</label>
                    <div class="col-sm-12">
                        <input type="email" name="email"  class="form-control" placeholder="example@gmail.com">
                    </div>
                </div>
                <small class="text-danger">{{$errors->first('email')}}</small>

                <div class="mt-3">
                    <label  class="text-dark ">Address</label>
                    <div class=" mt-4">
                        <textarea name="address" cols="10" rows="2" class=" form-control"></textarea>
                    </div>
                </div>
                <small class="text-danger">{{$errors->first('adress')}}</small>
                <div class="mt-3">
                    <a href="{{route('student#list')}}" class="btn btn-secondary text-light" >Back</a>
                        <button type="submit" class="btn btn-primary text-light float-end">Create</button>
                </div>
            </form>
        </div>
    </div>
@endsection
