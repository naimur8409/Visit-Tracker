@extends('layouts.main')
@section('main-content')
<div class="main-content-wrap sidenav-open d-flex flex-column">
    <!-- ============ Body content start ============= -->
    <div class="main-content">
        <div class="breadcrumb">
            <h1>Visit</h1>
            <ul>
                <li><a href="{{route('home')}}">Dashboard</a></li>
                <li>My visits</li>
            </ul>
        </div> 
        <div class="col-md-12 mb-4">
            <div class="card text-left">
                <div class="card-body">
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-card alert-danger" role="alert"><strong class="text-capitalize">Alert!</strong>{{ $error }}
                            <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        </div>
                    @endforeach

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
                    <h4 class="card-title mb-3">My visits</h4>
                   
                    <div class="table-responsive">
                        <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">
                            <thead>
                              <tr>
                                 <th>#SL</th>
                                 <th>Organization Name</th>
                                 <th>Person Name</th>
                                 <th>Visit Name</th>
                                 <th>Project type</th>
                                 <th>My Comments</th>
                                 <th>TD/DA </th>
                                 <th>Respponse</th>
                                 <th>Remarks</th>
                                 <th>Date</th>
                                 <th>Action</th>
                             </tr>
                             </thead>
                             <tbody>
                               
                               @foreach ($visits as $i=> $data)
                               <tr>
                                    <th>{{$i+1}}</th>

                                    <th>{{$data->client->client_project_name}}</th>
                                    <th>{{$data->client->client_name}}</th>
                                    <th>{{$data->visit_name}}</th>
                                    
                                    <th>
                                        @forelse ($data->project_types as $item)
                                        <span class="badge badge-pill badge-outline-primary p-2 m-1"><strong>{{$item->type_name}}</strong></span>
                                        @empty
                                            
                                        @endforelse
                                    </th>
                                    <th>{{$data->comments}}</th>
                                    <th>{{$data->td_or_da}}</th>
                                    <th><span class="text-success">{{$data->response}}</span></th>
                                    <th><span class="text-success">{{$data->remarks}}</span></th>
                                    <th>{{$data->created_at}}</th>
                                    <th>
                                      <a href="{{route('visit.editMyVisit',$data->id)}}" class="btn btn-warning">Edit</a>
                                      <a href="{{route('visit.delete_my_visit',$data->id)}}" class="btn btn-danger" onclick="confirm('Are you sure !')">Delete</a>
                                  </th>
                               </tr>
                               @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#SL</th>
                                    <th>Organization Name</th>
                                    <th>Person Name</th>
                                    <th>Visit Name</th>
                                    <th>Project type</th>
                                    <th>My Comments</th>
                                    <th>TD/DA </th>
                                    <th>Respponse</th>
                                    <th>Remarks</th>
                                    <th>Date</th>
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
