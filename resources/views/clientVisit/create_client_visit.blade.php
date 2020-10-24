@extends('layouts.main')
        @section('main-content')
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <div class="breadcrumb">
                    <h1>Create visit info</h1>
                    <ul>
                        <li><a href="{{route('home')}}">Dashboard</a></li>
                        <li>Create visit info</li>
                    </ul>
                </div>
                
                <div class="col-md-12 mb-4">
                  

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
                  {{--  ====================Add Client========================  --}}
                  <div class="accordion" id="accordionExample">
                      <div class="card ul-card__border-radius">
                          <div class="card-header">
                              <h6 class="card-title mb-0"><a class="text-default collapsed btn btn-primary" data-toggle="collapse" href="#accordion-item-group1" aria-expanded="false">
                                      Create New Client</a></h6>
                          </div>
                          <div class="collapse" id="accordion-item-group1" data-parent="#accordionExample" style="">
                           <div class="card-body"> 
                              <form action="{{route('client.store')}}" method="POST">
                                 @csrf
                                 <div class="row row-xs">
                                    <div class="col-md-3 mt-3 mt-md-0">
                                        <label for="personName">Organization name</label>
                                        <input name="client_project_name" class="form-control" type="text" placeholder="Enter organization name">
                                    </div>
                                    <div class="col-md-3 mt-3 mt-md-0">
                                        <label for="personName">Person name</label>
                                        <input name="client_name" class="form-control" id="personName" type="text" placeholder="Enter person name">
                                    </div>
                                    <div class="col-md-3 mt-3 mt-md-0">
                                        <label for="personName">Address</label>
                                        <input name="address" class="form-control" type="text" placeholder="Enter address">
                                    </div>
                                    <div class="col-md-3 mt-3 mt-md-0 mb-2">
                                        <label for="personName">Phone Number</label>
                                        <input name="phone" class="form-control" type="text" placeholder="Enter phone">
                                    </div>
                                    <div class="col-md-1 mt-3 mt-md-0">
                                        <button class="btn btn-primary btn-block">Create</button>
                                    </div>
                                </div>
                              </form>
                          </div>
                          </div>
                      </div>
                  </div>
                  <br>
                  {{--  ====================Add Project type========================  --}}
                  <div class="accordion" id="accordionExample">
                      <div class="card ul-card__border-radius">
                          <div class="card-header">
                              <h6 class="card-title mb-0"><a class="text-default collapsed btn btn-primary" data-toggle="collapse" href="#accordion-item-group2" aria-expanded="false">
                                      Create New Project Type</a></h6>
                          </div>
                          <div class="collapse" id="accordion-item-group2" data-parent="#accordionExample" style="">
                           <div class="card-body"> 
                              <form action="{{route('project_type.store')}}" method="POST">
                                 @csrf
                                 <div class="row row-xs">
                                    <div class="col-md-4">
                                        <input name="type_name" class="form-control" type="text" placeholder="Enter project type name">
                                    </div>
                                    <div class="col-md-1 mt-3 mt-md-0">
                                        <button class="btn btn-primary btn-block">Create</button>
                                    </div>
                                </div>
                              </form>
                          </div>
                          </div>
                      </div>
                  </div>

                  {{--  ====================================Add client Visit Info====================================  --}}
                  <div class="card-body">
                     <div class="card-title mb-3">Form Inputs</div>
                     <form action="{{route('storeVisit')}}" method="POST">
                        @csrf
                         <div class="row">

                           {{--  =========Organization name====  --}}
                            <div class="col-md-6 form-group mb-3">
                              <label for="picker1"> Organization Name</label>
                              <select class="form-control"  name="client_id" >
                                 <option value="">Select One</option>
                                 @foreach ($clients as $client)
                                 <option value="{{$client->id}}">{{$client->client_project_name}}</option>
                                 @endforeach
                                  
                              </select>
                            </div>
                            
                           {{--  =========Visit Name====  --}}

                            <div class="col-md-6 form-group mb-3">
                                <label for="visitname">Visit name</label>
                                <input name="visit_name" class="form-control" id="visitname" type="text" placeholder="Enter visit name">
                            </div>
                           {{--  =========Project type====  --}}
                           
                           <div class="col-md-6 form-group mb-3">
                              <label for="picker1">Project Type</label>
                              <select name="project_type[] " class="form-control select2"  name="client_id" multiple="multiple" data-placeholder="Select types">
                                 <option value="">Select types</option>
                                 @foreach ($types as $type)
                                 <option value="{{$type->id}}">{{$type->type_name}}</option>
                             @endforeach
                              </select>
                          </div>
                             
                          {{--  =========Visited By====  --}}
                          
                          <div class="col-md-6 form-group mb-3">
                             <label for="picker1">Visited By</label>
                             <select name="visitor_id[]" class="form-control select2"  multiple="multiple" data-placeholder="Select types">
                                 <option value="">Select visitors</option>
                                 @foreach ($users as $user)
                                 <option value="{{$user->id}}">{{$user->name}}</option>
                                 @endforeach
                             </select>
                         </div>

                          {{--  =========Visited By====  --}}

                             <div class="col-md-6 form-group mb-3">
                                 <label for="lastName1">Comments</label>
                                 <textarea name="comments" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                             </div>
                             
                          {{--  =========TD/DA====  --}}

                             <div class="col-md-6 form-group mb-3">
                                 <label for="phone">TD/DA</label>
                                 <input name="taOrDa" class="form-control" id="phone" placeholder="Enter TD/DA">
                             </div>
                             

                          {{--  =========Paid By====  --}}
                          
                          <div class="col-md-6 form-group mb-3">
                            <label for="picker1">Paid By</label>
                            <select name="paid_by" class="form-control "  data-placeholder="Paid by">
                                <option value="">Paid by</option>
                                @foreach ($users as $user)
                                <option value="{{$user->name}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                             
                          {{--  =========Response====  --}}
                          @if(auth()->user()->hasRole('admin'))
                              <div class="col-md-6 form-group mb-3">
                                 <label for="lastName1">Response</label>
                                 <textarea name="response" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                              </div>
                              
                          {{--  =========Remarks====  --}}

                          <div class="col-md-6 form-group mb-3">
                           <label for="lastName1">Remarks</label>
                           <textarea name="remarks" class="form-control" rows="1" placeholder="Enter ..."></textarea>
                        </div>

                        @endif
                             <div class="col-md-12">
                                 <button class="btn btn-primary">Submit</button>
                             </div>
                         </div>
                     </form>
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
   