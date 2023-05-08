@extends('layout.app')

@section('content')
    <nav class="navbar nav-bg">
        <div class="container ">
            <div class="d-flex justify-content-between w-100 ">
                Navbar
                <p class="pt-2">
                    <a href="{{route('student#list')}}" class="text-dark ms-2 text-decoration-none text-secondary "> Students</a>
                    <a href="#" class="text-secondary text-decoration-none "> Majors</a>
                </p>
                
            </div>
        </div>
    </nav>
     <div class="card w-75 m-auto">
        <div class="card-header"><h4 class=" ms-4">Major Edit</h4></div>
         
         <form action="{{ url('editmajor/'.$user->id) }}" method="POST" class=" mt-3  ">
             @csrf
             {{method_field('put')}} 
             <div class="mt-3">
                 <label for="task" class="col-sm-12 control-label text-dark">Name</label>

                 <div class="mt-3">
                     <input type="text" name="name" id="task-name" class="form-control" placeholder="name" value="{{$user->name}}">
                 </div>
             </div>
                <span class="text-danger">{{$errors->first('name')}}</span>
             <div class="mt-3">
                 <div >
                    <a href="{{route('student#list')}}"  class="btn btn-secondary text-light" >Back</a>
                     <button type="submit" class="btn btn-primary text-light float-end">Update</button>
                 </div>
             </div>
         </form>
     </div>
     @endsection
