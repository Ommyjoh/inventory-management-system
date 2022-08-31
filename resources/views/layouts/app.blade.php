<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Panel</title>
    <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 11]>
    	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    	<![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('backend/dist/assets/images/favicon.ico')}}" type="image/x-icon">

    <!-- vendor css -->
    <link rel="stylesheet" href="{{ asset('backend/dist/assets/css/style.css')}}">

    {{-- toast message css --}}
    <link rel="stylesheet" href="{{  asset ('backend/plugins/toastr/toastr.min.css')}}">

    <link rel="stylesheet" href="{{  asset ('backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">

    @stack('css')

    @livewireStyles


</head>
<body class="">
	<!-- [ Pre-loader ] start -->
	<div class="loader-bg">
		<div class="loader-track">
			<div class="loader-fill"></div>
		</div>
	</div>
	<!-- [ Pre-loader ] End -->
    
	<!-- [ navigation menu ] start -->
	@include('layouts.partials.aside')
	<!-- [ navigation menu ] end -->
    
	<!-- [ Header ] start -->
	@include('layouts.partials.navbar')
	<!-- [ Header ] end -->
	
	

<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        {{ $slot }}
    </div>
</div>

    {{-- jquery --}}
    <script src="{{  asset ('backend/plugins/jquery/jquery.min.js')}}"></script>


    <!-- Required Js -->
    <script src="{{ asset('backend/dist/assets/js/vendor-all.min.js')}}"></script>
    <script src="{{ asset('backend/dist/assets/js/plugins/bootstrap.min.js')}}"></script>
    <script src="{{ asset('backend/dist/assets/js/pcoded.min.js')}}"></script>

    {{-- toast message js --}}
    <script src="{{  asset ('backend/plugins/toastr/toastr.min.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

    @stack('js')
    @livewireScripts
</body>

</html>
