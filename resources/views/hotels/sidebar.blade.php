<?php
use App\Role;
use Illuminate\Support\Facades\Auth;

$data = Auth::user();
$roles = Role::all();
?>
<header class="dropdown nav-item" style="margin: 0;">
    <h5>{{$data['username']}}</h5>
    <br><p>{{$data['role_id'==\App\Role::$SA ? 'Super Admin' : 'Admin']}}</p>
    <div>
        <a href="#">Profile</a>
        <a href="#">Change Password</a>
    </div>
</header>