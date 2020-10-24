@extends('layouts.main')
@section('main-content')
<div class="main-content-wrap sidenav-open d-flex flex-column">
    <!-- ============ Body content start ============= -->
    <div class="main-content">
        <div class="breadcrumb">
            <h1>Visit</h1>
            <ul>
                <li><a href="{{route('home')}}">Dashboard</a></li>
                <li>Edit My visits</li>
            </ul>
        </div> 
        <div class="col-md-12 mb-4">
            <div class="card text-left">
                <div class="card-body">
                    <h4 class="card-title mb-3">Edit my visit</h4>
                   
                    <form action="{{route('visit.update_my_visit',$visit->id)}}" method="POST">
                     @csrf
                      <div class="row">

                        {{--  =========Client project Name Id====  --}}
                        
                        <div class="col-md-6 form-group mb-3">
                           <label for="picker1"> Project Name</label>
                           <select class="form-control "  name="client_id" >
                              <option value="">Select One</option>
                              @foreach ($clients as $client)
                              <option value="{{$client->id}}"
                                 @if($visit->client_id == $client->id )
                                 selected="selected"
                                 @endif
                                 >{{$client->client_project_name}}</option>
                              @endforeach
                               
                           </select>
                       </div>


                        {{--  =========Visit Name====  --}}

                          <div class="col-md-6 form-group mb-3">
                              <label for="visitname">Visit name</label>
                              <input name="visit_name" class="form-control" id="visitname" value="{{$visit->visit_name}}" type="text" >
                          </div>
                          
                        {{--  =========Project type====  --}}
                        
                        <div class="col-md-6 form-group mb-3">
                           <label for="picker1">Project Type</label>
                           <select name="project_type[] " class="form-control select2"  name="client_id" multiple="multiple" data-placeholder="Select types">
                              <option value="">Select types</option>
                              @foreach ($types as $type)
                              <option value="{{$type->id}}"

                                 @forelse ($visit->project_types as $item)
                                 @if($item->id == $type->id )
                                 selected="selected"
                                 @endif
                                 @empty
                                     
                                 @endforelse

                                 >{{$type->type_name}}</option>
                          @endforeach
                           </select>
                       </div>
                          
                       {{--  =========Visited By====  --}}
                       
                       <div class="col-md-6 form-group mb-3">
                          <label for="picker1">Visited By</label>
                          <select name="visitor_id[]" class="form-control select2"  multiple="multiple" data-placeholder="Select types">
                              <option value="">Select visitors</option>
                              @foreach ($users as $user)
                              <option value="{{$user->id}}"
                                 
                                 @forelse ($visit->users as $item)
                                 @if($item->id == $user->id )
                                 selected="selected"
                                 @endif
                                 @empty
                                     
                                 @endforelse>{{$user->name}}</option>
                              @endforeach
                          </select>
                      </div>

                       {{--  =========Comments====  --}}

                          <div class="col-md-6 form-group mb-3">
                              <label for="lastName1">Comments</label>
                           <textarea name="comments" class="form-control" rows="3" >{{$visit->comments}}</textarea>
                          </div>
                          
                       {{--  =========TD/DA====  --}}

                          <div class="col-md-6 form-group mb-3">
                              <label for="phone">TD/DA</label>
                              <input name="taOrDa" class="form-control" id="phone" value="{{$visit->td_or_da}}" >
                          </div>
                          

                       {{--  =========Paid By====  --}}
                       
                       <div class="col-md-6 form-group mb-3">
                         <label for="picker1">Paid By</label>
                         <select name="paid_by" class="form-control "  data-placeholder="Paid by">
                             <option value="">Paid by</option>
                             @foreach ($users as $user)
                             <option value="{{$user->name}}"
                              @if($visit->paid_by == $user->name)
                              selected="selected"
                              @endif
                              >{{$user->name}}</option>
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
                              <button class="btn btn-primary">Update</button>
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
