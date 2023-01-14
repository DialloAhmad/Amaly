
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Amaly') }}</title>

  <link rel="dns-prefetch" href="//fonts.gstatic.com">

  <!-- Custom fonts for this template-->
  <link href="{{asset('vendor/fontawesome5/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
  <link href="{{asset('css/sb-admin-2.min.css') }}"   rel="stylesheet">
  <link rel="stylesheet" href="{{asset('css/datatables.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
  <link rel="stylesheet" href="{{asset('css/styleinscription.css')}}">
  
  <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('vendor/datatables/datatables.bootstrap4.min.css')}}">
  <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet')}}">
  {{-- <link rel="stylesheet" href="{{ asset('css/BOOTSTRAP/css/boostrap.css') }}">
  <link href="{{ asset('css/BOOTSTRAP/css/bootstrap.css') }}"> --}}
  {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
  @yield('head')

</head>