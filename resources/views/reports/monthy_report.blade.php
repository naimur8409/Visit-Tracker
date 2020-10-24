@extends('layouts.main')
        @section('main-content')
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <div class="col-md-12 mb-4">
                    <div class="card text-left">
                        <div class="card">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="invoice" role="tabpanel" aria-labelledby="invoice-tab">
                                    <div class="d-sm-flex mb-5" data-view="print"><span class="m-auto"></span>
                                        <button class="btn btn-primary mb-sm-0 mb-3 print-invoice" onclick="printDiv('printableArea')">Print Report</button>
                                        
                                    </div>
                                  <!-- -===== Print Area =======-->
                                    <div id="print-area">
                                        <div class="row">
                                            <div class="col-md-6 center">
                                            </div>
                                            <div class="col-md-6 text-sm-right">
                                                <div class="card-body">
                                                    
                                                        <form action="{{ route('report_by_month') }}" method="post">
                                                        @csrf
                                                        <div class="row row-xs">
                                                            
                                                            <p><strong>Select Month </strong></p>
                                                            <div class="col-md-5 mt-3 mt-md-0">
                                                                <input class="form-control" name="date" type="month" min="2020-08">
                                                            </div>
                                                            <div class="col-md-2 mt-3 mt-md-0">
                                                                <button class="btn btn-primary btn-block">Search</button>
                                                            </div>
                                                        
                                                        </div>
                                                        </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-3 mb-4 border-top"></div>
                                        
                                      
                                        
                                        <div class="row mb-5">
                                            <div class="col-md-10 mb-3 mb-sm-0">
                                                <h5 class="font-weight-bold">Monthly Visit Report</h5>
                                            </div>
                                        </div>
                                        <div class="row" id="printableArea">
                                          <div class="col-md-12 col-sm-12 table-responsive">
                                              <table class="table table-hover mb-4">
                                                  <thead class="bg-gray-300">
                                                      <tr>
                                                          <th scope="col">#</th>
                                                          <th scope="col">Client Name</th>
                                                          <th scope="col">Address</th>
                                                          <th scope="col">Phone</th>
                                                          <th scope="col">Visit Name</th>
                                                          <th scope="col">Visited By</th>
                                                          <th scope="col">Comments</th>
                                                          <th scope="col">TD or Da</th>
                                                          <th scope="col">Response</th>
                                                          <th scope="col">Remarks</th>
                                                      </tr>
                                                  </thead>
                                                  <tbody>
                                                    @if($total_visit >0)
                                                        @foreach ($visits as $i => $item)
                                                            <tr>
                                                                <th> {{$i+1}}</th>

                                                                <th>{{ $item->client->client_project_name }}</th>

                                                                <th>{{ $item->client->address }}</th>

                                                                <th>{{ $item->client->phone }}</th>

                                                                <th>{{ $item->visit_name }}</th>

                                                                <th>
                                                                    @forelse ($item -> users as $user)
                                                                        {{$user->name}} 
                                                                    @empty
                                                                    
                                                                    @endforelse
                                                                </th>

                                                                <th>{{ $item->comments }}</th>
                                                                <th>{{ $item->td_or_da }}</th>
                                                                <th>{{ $item->response }}</th>
                                                                <th>{{ $item->remarks }}</th>

                                                            </tr>
                                                            
                                                        @endforeach
                                                    @endif
                                                  </tbody>
                                              </table>
                                              
                                          </div>
                                          <div class="col-md-12">
                                              <div class="invoice-summary">
                                              <h6 class="font-weight-bold">Total Visit:  @if($total_visit >0) <span>{{$total_visit}} @endif</span></h6>
                                              
                                              <h6 class="font-weight-bold">Pending TA/DA: @if($total_visit >0) <span>{{$pending_td}} @endif</span></h6>
                                              <h6 class="font-weight-bold">Paid TA/DA: @if($total_visit >0) <span>{{$paid_td}} @endif</span></h6>
                                              
                                              </div>
                                          </div>
                                      
                                       </div>
                                    </div>
                                  <!-- ==== / Print Area =====-->
                                </div>
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
   