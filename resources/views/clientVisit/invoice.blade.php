<html lang="en" dir=""><head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width,initial-scale=1">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Invoice | Ringer Soft LTD</title>
   <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">
   <link href="/dist-assets/css/themes/lite-purple.min.css" rel="stylesheet">
   <link href="/dist-assets/css/plugins/perfect-scrollbar.min.css" rel="stylesheet">
</head>

    <body >
            <div class="main-content p-4">
                <div class="row">
                    <div class="col-md-12">
                        
                        <div class="card">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="invoice" role="tabpanel" aria-labelledby="invoice-tab">
                                    <!-- -===== Print Area =======-->
                                    <div id="print-area">
                                        
                                        <div class="row">
                                            <div class="col-md-12 text-center"> 
                                                <img class="" src="{{asset('photos/logo.png')}}" alt="" width="70px">
                                                <h3 class="font-weight-bold">RingerSoft LTD</h3>
                                                <p>House No: 430/576 (3rd Floor),<br>(Opposite to Chittagong Shopping Complex) CDA Avenue,Shalasahar,Chattagram,Bangladesh</p>
                                                <button class="btn btn-info ">INVOICE</button>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <h5 class="font-weight-bold">Visit No</h5>
                                                <p>{{$visits->id}}</p>
                                            </div>
                                            <div class="col-md-6 text-sm-right">
                                                <h5 class="font-weight-bold">Date</h5>
                                                <p><strong> {{$date}} </strong></p>
                                            </div>
                                        </div>
                                        <div class="mt-3 mb-4 border-top"></div>
                                        <div class="row mb-5">
                                            <div class="col-md-6 mb-3 mb-sm-0">
                                                <h5 class="font-weight-bold">Bill From</h5>
                                                <p>Ringer Sotf LT</p>
                                            </div>
                                            <div class="col-md-6 text-sm-right">
                                                <h5 class="font-weight-bold">Bill To</h5>
                                                <p>{{$visits->paid_by}}</p>
                                                <br>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 table-responsive">
                                                <table class="table table-hover mb-4">
                                                    <thead class="bg-gray-300">
                                                        <tr>
                                                            <th scope="col">Client Name</th>
                                                            <th scope="col">Visited By</th>
                                                            <th scope="col">Date of Visit</th>
                                                            <th scope="col">TA/DA</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>{{$visits->client->client_project_name}}</td>
                                                            <td>@forelse ($visits ->users as $user)
                                                                <li>{{$user->name}}</li>
                                                            @empty
                                                                
                                                            @endforelse</td>
                                                            <td>{{$visits->created_at}}</td>
                                                            <td>{{number_format($visits->td_or_da,2)}}</td>
                                                        </tr>
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="d-sm-flex mb-5" data-view="print"><span class="m-auto"></span>
                                        <button class="btn btn-primary mb-sm-0 mb-3 print-invoice" onclick="window.print()">Print Invoice</button>
                                    </div>
                                    <!-- ==== / Print Area =====-->
                                </div>
                                <div class="tab-pane fade" id="edit" role="tabpanel" aria-labelledby="edit-tab">
                                    <!-- ==== Edit Area =====-->
                                    <div class="d-flex mb-5"><span class="m-auto"></span>
                                        <button class="btn btn-primary">Save</button>
                                    </div>
                                    <form>
                                        <div class="row justify-content-between">
                                            <div class="col-md-6">
                                                <h4 class="font-weight-bold">Order Info</h4>
                                                <div class="col-sm-4 form-group mb-3 pl-0">
                                                    <label for="orderNo">Order Number</label>
                                                    <input class="form-control" id="orderNo" type="text" placeholder="Enter order number">
                                                </div>
                                            </div>
                                            <div class="col-md-3 text-right">
                                                <label class="d-block text-12 text-muted">Order Status</label>
                                                <div class="pr-0 mb-4">
                                                    <label class="radio radio-reverse radio-danger">
                                                        <input type="radio" name="orderStatus" value="Pending"><span>Pending</span><span class="checkmark"></span>
                                                    </label>
                                                    <label class="radio radio-reverse radio-warning">
                                                        <input type="radio" name="orderStatus" value="Processing"><span>Processing</span><span class="checkmark"></span>
                                                    </label>
                                                    <label class="radio radio-reverse radio-success">
                                                        <input type="radio" name="orderStatus" value="Delivered"><span>Delivered</span><span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="order-datepicker">Order Date</label>
                                                    <input class="form-control text-right" id="order-datepicker" placeholder="yyyy-mm-dd" name="dp">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-3 mb-4 border-top"></div>
                                        <div class="row mb-5">
                                            <div class="col-md-6">
                                                <h5 class="font-weight-bold">Bill From</h5>
                                                <div class="col-md-10 form-group mb-3 pl-0">
                                                    <input class="form-control" id="billFrom3" type="text" placeholder="Bill From">
                                                </div>
                                                <div class="col-md-10 form-group mb-3 pl-0">
                                                    <textarea class="form-control" placeholder="Bill From Address"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6 text-right">
                                                <h5 class="font-weight-bold">Bill To</h5>
                                                <div class="col-md-10 offset-md-2 form-group mb-3 pr-0">
                                                    <input class="form-control text-right" id="billFrom2" type="text" placeholder="Bill From">
                                                </div>
                                                <div class="col-md-10 offset-md-2 form-group mb-3 pr-0">
                                                    <textarea class="form-control text-right" placeholder="Bill From Address"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 table-responsive">
                                                <table class="table table-hover mb-3">
                                                    <thead class="bg-gray-300">
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Item Name</th>
                                                            <th scope="col">Unit Price</th>
                                                            <th scope="col">Unit</th>
                                                            <th scope="col">Cost</th>
                                                            <th scope="col"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">1</th>
                                                            <td>
                                                                <input class="form-control" value="Product 1" type="text" placeholder="Item Name">
                                                            </td>
                                                            <td>
                                                                <input class="form-control" value="300" type="number" placeholder="Unit Price">
                                                            </td>
                                                            <td>
                                                                <input class="form-control" value="2" type="number" placeholder="Unit">
                                                            </td>
                                                            <td>600</td>
                                                            <td>
                                                                <button class="btn btn-outline-secondary float-right">Delete</button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">2</th>
                                                            <td>
                                                                <input class="form-control" value="Product 1" type="text" placeholder="Item Name">
                                                            </td>
                                                            <td>
                                                                <input class="form-control" value="300" type="number" placeholder="Unit Price">
                                                            </td>
                                                            <td>
                                                                <input class="form-control" value="2" type="number" placeholder="Unit">
                                                            </td>
                                                            <td>600</td>
                                                            <td>
                                                                <button class="btn btn-outline-secondary float-right">Delete</button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <button class="btn btn-primary float-right mb-4">Add Item</button>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="invoice-summary invoice-summary-input float-right">
                                                    <p>Sub total: <span>$1200</span></p>
                                                    <p class="d-flex align-items-center">Vat(%):<span>
                                                            <input class="form-control small-input" type="text" value="10">$120</span></p>
                                                    <h5 class="font-weight-bold d-flex align-items-center">Grand Total:<span>
                                                            <input class="form-control small-input" type="text" value="$">$1320</span></h5>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- ==== / Edit Area =====-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- end of main-content -->
            </div>
            
    <!-- ============ Search UI End ============= -->
    
    <script src="/dist-assets/js/plugins/jquery-3.3.1.min.js"></script>
    <script src="/dist-assets/js/plugins/bootstrap.bundle.min.js"></script>
    <script src="/dist-assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="/dist-assets/js/scripts/script.min.js"></script>
    <script src="/dist-assets/js/scripts/sidebar.large.script.min.js"></script>


    </body>
</html>