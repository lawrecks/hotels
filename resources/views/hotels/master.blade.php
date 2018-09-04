<?php
use Illuminate\Support\Facades\Auth;

$data= Auth::user();
$users = \App\User::all();

?>
<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8">
    @yield('title')
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    {{--{{Html::style('assets/libs/bootstrap/css/bootstrap.min.css')}}--}}
    <link rel="stylesheet" type="text/css" href="../../../assets/assets/fonts/line-awesome/css/line-awesome.min.css">
    <link rel="stylesheet" href="../../../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../../../assets/css/all.css">
    <link rel="stylesheet" href="../../../assets/css/admin.css">
    {{--<!-- END GLOBAL MANDATORY STYLES -->--}}
    <style>
        body{
            font-family: "Montserrat", sans-serif;
            font-size: 14px;
        }
    </style>
</head>
<!-- END HEAD -->
<body>
    @include('hotels.header')
    <hr>
    @if($data['role_id'] == \App\Role::$SA || $data['role_id'] == \App\Role::$A)
        <div class="ks-page-container" style="flex: 5">
            @yield('admin_content')
        </div>
        @else
        <div class="ks-page-container" style="flex: 5">
            @yield('content')
        </div>
    @endif


<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="../../../assets/libs/jquery/jquery.min.js"></script>
<script src="../../../assets/libs/bootstrap/js/bootstrap.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
</body>
</html>