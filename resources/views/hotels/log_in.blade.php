<!doctype html>
<html>
<head>
    <title>Account Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../../../assets/css/log-in.css">
</head>
<body>
<nav style="padding-top: 0;padding-bottom: 0" class="navbar navbar-default">
    <div class="navbar-header">
        <a href="{{url('hotels')}}"><img src="../../../assets/img/hotel.png" alt="hotel.ng"></a>
    </div>
</nav>
<div class="container">
    @if(Session::has('flash_message'))
        <div class="alert alert-success">
            {{session('flash_message')}}
            @if(Session::has('flash_message_close'))
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            @endif
        </div>
    @endif

    <div class="row main jumbotron">
        <div class="col-md-12 col-x1-12">
            <header class="clearfix">
                <h2>Account Login</h2>
            </header>
            <form action="{{url('hotels/log_in')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <input class="data form-control" type="text" name="email" placeholder="Enter Email">
                </div>
                <div class="form-group">
                    <input class="data form-control" type="password" name="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <input id="button" class="btn btn-primary btn-block" type="submit" name="REGISTER"
                           value="LOG IN">
                </div>
                <div>

                </div>
            </form>
            @if (Session::has('flash_message_error'))
                <div class="alert alert-warning">
                    {{session('flash_message_error') }}
                </div>
            @endif
        </div>
    </div>
</div>

<script src="../../../assets/js/jquery-3.3.1.min.js"></script>
<script src="../../../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>