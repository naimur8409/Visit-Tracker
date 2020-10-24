<!DOCTYPE html>
<html lang="en" dir="">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Ringer Soft LTD</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet" />
    <link href="{{asset('dist-assets/css/themes/lite-purple.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('dist-assets/css/plugins/perfect-scrollbar.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('dist-assets/css/plugins/datatables.min.css') }}" />

    <link rel="stylesheet" href="{{asset('dist-assets/css/plugins/sweetalert2.min.css')}}" />
        
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

</head>
<body class="text-left" onload="successAlert()">
    <div class="app-admin-wrap layout-sidebar-large">
        
 
    @include('include.header')
    @include('include.sideBar')
	@yield('main-content')
     </div>
    @include('include.search_ui')

	@include('include.script')
</body>

</html>