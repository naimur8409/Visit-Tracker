@extends('layouts.main')
@section('main-content')
<div class="main-content-wrap sidenav-open d-flex flex-column">
    <!-- ============ Body content start ============= -->
    <div class="main-content">
        <div class="breadcrumb">
            <h1>Datatables</h1>
            <ul>
                <li><a href="{{route('home')}}">Dashboard</a></li>
                <li>List of client visit</li>
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
                    <h4 class="card-title mb-3">List of all visits</h4>
                    <div class="table-responsive">
                        <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#SL</th>
                                    <th>Visit Name</th>
                                    <th>Organization Name</th>
                                    <th>Person Name</th>
                                    <th>Project Type</th>
                                    <th>Address</th>
                                    <th>Phone </th>
                                    <th>Visited By</th>
                                    <th>Comments</th>
                                    <th>TD/DA</th>
                                    <th>Paid By</th>
                                    <th>Response</th>
                                    <th>Remarks</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($visits as $i => $item)
                                <tr>
                                   <td>{{$i+1}}</td>
                                   <td>{{ $item->visit_name }}</td>
                                   <td>{{ $item->client->client_project_name }}</td>
                                   <td>{{  $item->client->client_name }}</td>
                                    <td>
                                       @forelse ($item -> project_types as $type)
                                       <span class="badge badge-pill badge-outline-primary p-2 m-1"><strong>{{$type->type_name}}</strong></span>
                                       @empty
                                           
                                       @endforelse
                                    </td>
                                    <td>{{  $item->client->address }}</td>
                                   
                                    <td>{{ $item->client->phone }}</td>

                                    <td>
                                        @forelse ($item -> users as $user)
                                        <span class="badge badge-pill badge-outline-primary p-2 m-1"><strong>{{$user->name}}</strong></span>
                                        @empty
                                            
                                        @endforelse
                                    </td>

                                     <td>{{ $item->comments }} </td>
                                   
                                     <td>
                                        {{ $item->td_or_da }}
                                         <form action="{{route('visit_update',$item->id)}}" method="post">
                                            @csrf
                                            @if($item->td_or_da_status == 0)
                                                <input type="hidden" value="1" name="td_or_da_status">
                                                
                                            <button class="btn btn-danger btn-sm btn-rounded m-1" type="submit">Pending</button>
                                            @endif 
                                            @if($item->td_or_da_status == 1)
                                                <input type="hidden" value="0" name="td_or_da_status">
                                            <button class="btn btn-success btn-sm btn-rounded m-1" type="submit">Paid</button>

                                            @endif
                                         </form>
                                     </td>
                                     <td>{{$item->paid_by}} </td>
                                     
                                     <td>{{ $item->response }}</td>
                                     
                                     <td>{{ $item->remarks }}</td>
                                     <td>
                                        <a href="" data-toggle="modal" data-target="#id{{ $item->id }}" class="btn btn-primary btn-sm m-1 text-white" >Update response and remakrs </a>
                                        
                                        @if($item->td_or_da_status == 1)
                                        <a href="{{ route('invoice',$item->id) }}" target="_blank" class="btn btn-info btn-sm m-1 text-white" >Create invoice</a>
                                        @endif
                                     </td>
                                    {{--  ======================Remark Modal========================  --}}

                                     <div class="modal fade" id="id{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-2" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle-2"> Update Response and Remarks</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="card mb-5">
                                                        <div class="card-body">
                            
                                                            <form action="{{route('update_remarks',$item->id )}}" method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="form-group row">
                                                                    <div class="col-sm-10">
                                                                        <label for="lastName1">Response</label>
                                                                    <textarea name="response" class="form-control" rows="3" placeholder="Enter ...">
                                                                        @isset($item){{$item->response}}@else @endIf</textarea>
                                                                    </div>
                                                                </div>
                            
                                                                <div class="form-group row">
                                                                    <div class="col-sm-10">
                                                                        <label for="lastName1">Remarks</label>
                                                                        <textarea name="remarks" class="form-control" rows="3" placeholder="Enter ...">
                                                                            @isset($item){{$item->remarks}}@else @endIf
                                                                        </textarea>
                                                                    </div>
                                                                </div>
                                                                
                                                            <button class="btn btn-primary ml-2" type="submit">Save</button>
                                                            </form>
                                                        </div>
                                                    </div>
                            
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </tr>
                            @endforeach
                               
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#SL</th>
                                    <th>Visit Name</th>
                                    <th>Organization Name</th>
                                    <th>Person Name</th>
                                    <th>Project Type</th>
                                    <th>Address</th>
                                    <th>Phone </th>
                                    <th>Visited By</th>
                                    <th>Comments</th>
                                    <th>TD/DA</th>
                                    <th>Paid By</th>
                                    <th>Response</th>
                                    <th>Remarks</th>
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
