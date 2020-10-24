@extends('layouts.main')
        @section('main-content')
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <div class="breadcrumb">
                    <h1>Users</h1>
                    <ul>
                        <li><a href="{{route('home')}}">Dashboard</a></li>
                        <li>List of deleted users</li>
                    </ul>
                </div>

                <div class="col-md-12 mb-4">
                    <div class="card text-left">
                        <div class="card-body">
                            <h4 class="card-title mb-3">List of deleted users</h4>
                            {{-- <div id="alert-success" >Success Alert</div> --}}
                           
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
                            <div class="table-responsive">
                                <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#SL</th>
                                            <th>User Name</th>
                                            <th>User Mail</th>
                                            <th>Photo</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $i => $data)
                                        <tr>
                                            <td>{{$i+1}}</td>
                                            <td>{{$data->name}}</td>
                                            <td>{{$data->email}}</td>
                                            <td><img width="50px" alt="{{$data->name}}" src="{{asset('/photos/profile/')}}/{{$data->photo}}" ></td>
                                            <td>
                                                <a href="{{route('user.restore',$data->id)}}"  class="btn btn-success btn-sm m-1 text-white" onclick="confirm('Are You sure')"type="button">Restore User</a>
                                               
                                                <a href="{{route('user.delete_per',$data->id)}}"  class="btn btn-danger btn-sm m-1 text-white" onclick="confirm('Are You sure')" type="button">Delete Permenently</a>
                                                
                                            </td>
                                        </tr>
                                        @endforeach
                                       
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>#SL</th>
                                            <th>User Name</th>
                                            <th>User Mail</th>
                                            <th>Photo</th>
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
   