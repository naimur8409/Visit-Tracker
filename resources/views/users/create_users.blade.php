@extends('layouts.main')
        @section('main-content')
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <div class="breadcrumb">
                    <h1>Users</h1>
                    <ul>
                        <li><a href="{{route('home')}}">Dashboard</a></li>
                        <li>Create new user</li>
                    </ul>
                </div>
                <div class="col-md-12 mb-4">
                    <div class="card-body">
                        <div class="card-title mb-3">Create new user</div>
                    <form action="{{route('user.store')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 form-group mb-3">
                                    <label for="firstName1">Name</label>
                                    <input name="name" class="form-control" id="firstName1" type="text" placeholder="Enter your first name">
                                </div>
                                <div class="col-md-6 form-group mb-3">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input name="email" class="form-control" id="exampleInputEmail1" type="email" placeholder="Enter email">
                                    <!--  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                </div>
                                <div class="col-md-6 form-group mb-3">
                                    <label for="phone">Password</label>
                                    <input name="password" class="form-control" type="password" id="phone" placeholder="Enter password">
                                </div>

                                <div class="col-md-6 form-group mb-3">
<br>
                                    <label >User's role </label><br>
                                    @foreach ($roles as $item)
                                    <label class="switch pr-5 switch-danger mr-3"><span>{{$item->name}}</span>
                                        <input name="role_id" type="checkbox"  value="{{$item->id}}"><span class="slider"></span>
                                    </label>
                                    @endforeach
                                       

                                     
                                </div>
                                <div class="col-md-12">
                                    <button class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                
            </div>
            <div class="app-footer">
                
                @include('include.footer')
            </div>
            <!-- fotter end -->
        </div>
        @endsection
   