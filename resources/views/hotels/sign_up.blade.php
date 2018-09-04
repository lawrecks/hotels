<!doctype html>
<html>
<head>
    <title>Create an account</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../../../assets/css/sign up.css">
</head>
<body>
<nav style="padding-top: 0;padding-bottom: 0" class="navbar navbar-default">
    <div class="navbar-header">
        <a href="{{url('hotels')}}"><img src="../../../assets/img/hotel.png" alt="hotel.ng"></a>
    </div>
</nav>
<div class="container">
    @if($errors -> any())
        @foreach($errors -> all() as $error)
            <ul class="alert alert-warning" style="display: block">
                <li style="list-style: none">{{$error}}</li>
            </ul>
        @endforeach
    @endif
    <div class="row main">
        <div class="col-md-12 col-x1-12">
            <header class="clearfix">
                <h2>Create an account</h2>
            </header>
            <form action="{{url('hotels/sign_up')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <input required class="data form-control" type="text" name="username" placeholder="Enter Username">
                </div>
                <div class="form-group">
                    <input required class="data form-control" type="number" name="phone" placeholder="Phone Number">
                </div>
                <div class="form-group">
                    <input required class="data form-control" type="email" name="email" placeholder="e-mail">
                </div>
                <div class="form-group">
                    <input required class="data form-control" type="password" name="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <input required class="data form-control" type="password" name="confirm_password" placeholder="Confirm Password">
                </div>
                <div class="form-group">
                    <input required class="data form-control" type="text" name="city" placeholder="City">
                </div>
                <div class="form-group">
                    <input required class="data form-control" type="text" name="bank" placeholder="Bank Name">
                </div>
                <div class="form-group">
                    <input required class="data form-control" type="number" name="account" placeholder="Account Number">
                </div>
                <div class="form-group">
                    <input required class="data form-control" type="text" name="accountname" placeholder="Account name">
                </div>
                <div class="form-group">
                <button id="button" class="btn btn-primary btn-block" type="submit">REGISTER</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="../../../assets/js/jquery-3.3.1.min.js"></script>
<script src="../../../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>