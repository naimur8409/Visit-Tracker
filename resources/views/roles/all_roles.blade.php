@extends('layouts.main')
        @section('main-content')

        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <div class="breadcrumb">
                    <h1>Role-permission</h1>
                    <ul>
                        <li><a href="{{route('home')}}">Dashboard</a></li>
                        <li>List of role-permission</li>
                    </ul>
                </div>

                <div class="col-md-12 mb-4">
                    <div class="card text-left">
                        {{--  ====================Add Role-permission========================  --}}
                        <div class="card-body">
                            <div class="accordion" id="accordionExample">
                                <div class="card ul-card__border-radius">
                                        <a class="btn btn-info  btn-block m-1 mb-3 collapsed" type="button" data-toggle="collapse" href="#accordion-item-group1" aria-expanded="false">Create a new role or permission</a>
                                        {{-- ================Alerts=========== --}}
                                        @if (count($errors) > 0)
                                            <div class="alert alert-danger alert-dismissible m-4">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            <h5><i class="icon fa fa-ban"></i> Alert!</h5>
                                                @foreach ($errors->all() as $error)
                                                    <p>{{ $error }}</p>
                                                @endforeach
                                            </div>
                                        @endif

                                        @if ($message = Session::get('success'))
                                            <div class="alert alert-success alert-dismissible m-4">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            <h5><i class="icon fa fa-check"></i> Success!</h5>
                                                <strong>{{ $message }}</strong>
                                            </div>

                                        @endif

                                        @if ($message = Session::get('error'))
                                            <div class="alert alert-danger alert-dismissible m-4">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            <h5><i class="icon fa fa-check"></i> Error!</h5>
                                                <strong>{{ $message }}</strong>
                                            </div>

                                        @endif
                                    <div class="collapse" id="accordion-item-group1" data-parent="#accordionExample" style="">
                                    

                                        {{-- ============permission========= --}}
                                        <div class="card-body">
                                            <h4 class="card-title mb-3">Permission</h4>
                                            <form action="{{route('store_permission')}}" method="POST">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-3 form-group mb-3">
                                                        <label for="firstName1">Permission Name</label>
                                                        <input name="name" class="form-control" id="firstName1" type="text" placeholder="Enter your role name">
                                                    </div>
                                                    <div class="col-md-3 form-group mb-3">
                                                        <label for="exampleInputEmail1">Slug</label>
                                                        <input name="slug" class="form-control" id="exampleInputEmail1" type="text" placeholder="Enter slug">
                                                        <!--  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                                    </div>
                    
                                                    {{-- <div class="col-md-6 form-group mb-3">
                                                        <label >Select roles's permissions </label><br>
                                                        @foreach ($permission as $item)
                                                            <label class="switch pr-5 switch-danger mr-3"><span> {{$item->name}}</span>
                                                                <input name="permission_id[]" type="checkbox"  value=" {{$item->id}}"><span class="slider"></span>
                                                            </label>
                                                        @endforeach
                                                    </div> --}}

                                                    <div class="col-md-12">
                                                        <button class="btn btn-primary">Create Permission</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        {{-- =============role========== --}}
                                        <div class="card-body">
                                            <h4 class="card-title mb-3">Role</h4>
                                            <form action="{{route('store_role')}}" method="POST">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-3 form-group mb-3">
                                                        <label for="firstName1">Role Name</label>
                                                        <input name="name" class="form-control" id="firstName1" type="text" placeholder="Enter your role name">
                                                    </div>
                                                    <div class="col-md-3 form-group mb-3">
                                                        <label for="exampleInputEmail1">Slug</label>
                                                        <input name="slug" class="form-control" id="exampleInputEmail1" type="text" placeholder="Enter slug">
                                                        <!--  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                                    </div>
                    
                                                    <div class="col-md-6 form-group mb-3">
                                                        <label >Select roles's permissions </label><br>
                                                        @foreach ($permission as $item)
                                                            {{-- <label class="switch pr-5 switch-danger mr-3"><span> {{$item->name}}</span>
                                                                <input name="permission_id[]" type="checkbox"  value=" {{$item->id}}"><span class="slider"></span>
                                                            </label> --}}
                                                            <label class="checkbox checkbox-outline-primary">
                                                                <input type="checkbox" name="permission_id[]" value="{{$item->id}}"><span>{{$item->name}}</span><span class="checkmark"></span>
                                                            </label>
                                                        @endforeach
                                                        
                    
                                                        
                                                    </div>
                                                    <div class="col-md-12">
                                                        <button class="btn btn-primary">Create role</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- =======================List================ --}}
                        <div class="card-body">
                            <h4 class="card-title mb-3">List of role-permission</h4>
                            {{-- <div id="alert-success" >Success Alert</div> --}}
                           
                            <div class="table-responsive">
                                <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#SL</th>
                                            <th>Role Name</th>
                                            <th>Slug</th>
                                            <th>Permission</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                        @foreach ($roles as $i => $role)
                                            <tr>
                                                <td>{{ $i+1 }}</td>
                                                <td>{{ $role->name }}</td>
                                                <td>{{ $role->slug }}</td>
                                                <td>
                                                    @forelse ($role->permissions as $item)
                                                        {{$item->name}}
                                                    @empty
                                                        
                                                    @endforelse
                                                </td>
                                                <td>
                                                    <a href="{{route('delete_role',$role->id)}}" class="btn btn-danger btn-sm m-1 text-white" type="button">Delete</a>
                                                 
                                                </td>
                                            </tr>
                                        @endforeach
                                       
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>#SL</th>
                                            <th>Role Name</th>
                                            <th>Slug</th>
                                            <th>Permission</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            
            <div class="app-footer">
                
                @include('include.footer')
            </div>
            <!-- fotter end -->
        </div>
        @endsection
   