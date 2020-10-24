@extends('layouts.main')
        @section('main-content')
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">

                <div class="col-md-12 mb-4">
                    <div class="card">

                     <div class="card-body">

                        <div class="user-profile mb-4">
                            <div class="ul-widget-card__user-info">
                                <img  class="profile-picture avatar-lg mb-2" src="{{asset('/photos/profile/')}}/{{Auth::user()->photo}}" alt="{{Auth::user()->photo}}"  >
                                <p class="m-0 text-24">{{Auth::user()->name}}</p>
                                <p class="text-muted m-0">{{Auth::user()->roles->first()->name}}</p>
                            </div>
                        </div>

                        <div class=" mt-2">
                            <a class="btn btn-outline-success ul-btn-raised--v2 m-1 float-right" data-toggle="modal" data-target="#exampleModalCenter" type="button">Update Profile</a>
                        </div>
                        
                        <div class=" mt-2">
                            <a class="btn btn-outline-success ul-btn-raised--v2 m-1 float-right" data-toggle="modal" data-target="#changePass" type="button">Change Password</a>
                        </div>
                        {{-- ==============Chnage Password=============== --}}
                        
                        <div class="modal fade" id="changePass" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-2" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle-2"> Change Password</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>

                                    <div class="modal-body">
                                        <div class="card mb-5">
                                            <div class="card-body">
                                                <form action="{{route('user.update',1)}}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group row">
                                                        <div class="col-sm-10">
                                                            <input name="name" value="{{Auth::user()->name}}" class="form-control" id="inputEmail3" type="hidden" placeholder="Full Name">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-sm-10">
                                                            <input name="email" value="{{Auth::user()->email}}" class="form-control" id="inputEmail3" type="hidden" placeholder="Email">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        
                                                        <label class="col-sm-2 col-form-label" for="inputEmail3">New Password</label>
                                                        <div class="col-sm-10">
                                                            <input name="password" class="form-control" id="inputPassword3" type="password">
                                                        </div>
                                                    </div>
                                                    
                                                        

                                                    
                                                    <button class="btn btn-primary ml-2" type="submit">Save changes</button>
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

                        {{-- ==============Update Profile================ --}}
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-2" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content"> 
                                     
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle-2"> Edit profile</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="card mb-5">
                                            <div class="card-body">
                                                <form action="{{route('user.update',2)}}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label" for="inputEmail3">Full Name</label>
                                                        <div class="col-sm-10">
                                                        <input name="name" value="{{Auth::user()->name}}" class="form-control" id="inputEmail3" type="text" placeholder="Full Name">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label" for="inputEmail3">Email</label>
                                                        <div class="col-sm-10">
                                                            <input name="email" value="{{Auth::user()->email}}" class="form-control" id="inputEmail3" type="email" placeholder="Email">
                                                        </div>
                                                    </div>

                                                    
                                                    <input name="password" value="{{Auth::user()->password}}" class="form-control" id="inputPassword3" type="hidden" placeholder="Password">
                                                        

                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend"><span class="input-group-text" id="inputGroupFileAddon01">Upload</span></div>
                                                        <div class="custom-file">
                                                            <input name="photo" class="custom-file-input" id="inputGroupFile01" type="file" aria-describedby="inputGroupFileAddon01">
                                                            <label class="custom-file-label" for="inputGroupFile01">Choose profile photo</label>
                                                        </div>
                                                    </div>

                                                    
                                            <button class="btn btn-primary ml-2" type="submit">Save changes</button>
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
                        
                        <br>
                        <hr>
                        
                        <div class="tab-pane fade active show" id="about" role="tabpanel" aria-labelledby="about-tab">
                            <h4>Personal Information</h4>
                            <hr>
                            <div class="row">
                                <div class="col-md-4 col-6">
                                    <div class="mb-4">
                                        <p class="text-primary mb-1"><i class="i-Lock-User  text-16 mr-1"></i> Full Name</p><span>{{Auth::user()->name}}</span>
                                    </div>
                                </div>
                                <div class="col-md-4 col-6">
                                    <div class="mb-4">
                                        <p class="text-primary mb-1"><i class="i-MaleFemale text-16 mr-1"></i> Email</p><span>{{Auth::user()->email}}</span>
                                    </div>
                                </div>
                                <div class="col-md-4 col-6">
                                    <div class="mb-4">
                                        <p class="text-primary mb-1"><i class="i-Face-Style-4 text-16 mr-1"></i> Role</p><span>{{Auth::user()->roles->first()->name}}</span>
                                    </div>
                                  
                                </div>
                            </div>
                            <hr>
                            
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
      