<!doctype html>
<html>
<head>
    <title>Welcome Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../../../assets/css/welcome.css">
</head>
<body>
    <nav style="padding-top: 0;padding-bottom: 0" class="navbar navbar-default">
        <div class="navbar-header">
            <img src="../../../assets/img/hotel.png" alt="hotel.ng">
        </div>
        <div class="nav nav-justified">
            <div class="dropdown nav-item" style="margin-right: 10px; margin-top:10px">
                <button class="btn btn-outline-success"><a class="dropbtn">Hi! {{$data['username']}}</a></button>
                <div class="dropdown-content">
                    <a href="#">Update Profile</a>
                    <a href="#">Change Password</a>
                </div>
            </div>
            <div class="nav-item" style="margin-right: 10px; margin-top:10px">
                <button class="btn btn-outline-danger b2"><a href="{{url('hotels/logout')}}">Log out</a></button>
            </div>
        </div>
    </nav>


    <div class="container">
        <div class="row main jumbotron">
            <h2>Hello! {{$data['username']}}</h2>
            <h5>Welcome to hotels.ng, click <a href="#">here</a> to see hotels in {{$data['city']}} </h5>
        </div>
    </div>


<script src="../../../assets/js/jquery-3.3.1.min.js"></script>
<script src="../../../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>