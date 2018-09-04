<?php
use App\Role;
use App\User;
use Illuminate\Support\Facades\Auth;
//$otherUsers = User::where('role_id', 3);
$otherUsers = User::all();
$data = Auth::user();
$roles = Role::where('id','>', Role::$SA)->get();
//dd($data['role_id']);
?>
@extends('hotels.master')
@section('title')
    <title>Create a user</title>
@stop


@section('admin_content')
    @if($errors -> any())
        @foreach($errors -> all() as $error)
            <ul class="alert alert-warning" style="display: block">
                <li style="list-style: none">{{$error}}</li>
            </ul>
        @endforeach
    @endif
    <style>
        .main{
            width: 70%;
            background:#f5f8fa;
            horiz-align: center;
            margin: auto;
            margin-top: 40px;
            box-shadow: -9px 9px 16px 5px rgba(0,0,0,0.2);
        }
        h3{
            font-weight: 500;
            color:#17A2B8;
            margin-top: 20px;
        }
    </style>
    <div class="container">
        <div class="row main">
            <div class="col-md-12 col-x1-12">
                <header class="clearfix">
                    <h3><strong><span class="fa fa-user"></span> Create a New User</strong></h3>
                </header>
                <form action="{{url('hotels/admin/create_user')}}" method="post">
                    {{csrf_field()}}
                    <div style="display:flex">
                        <div style="flex:2; width:40%; margin:20px 20px 0 0">
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
                        </div>
                        <div style="flex:1;width:40%;margin-top:20px">
                            <div class="form-group">
                                <input required class="data form-control" type="number" name="account" placeholder="Account Number">
                            </div>
                            <div class="form-group">
                                <input required class="data form-control" type="text" name="accountname" placeholder="Account name">
                            </div>
                            <div class="form-group">
                                <select required class="data form-control custom-select" name="role_id">
                                    <option value="">Select role...</option>
                                    @foreach($roles as $role)
                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button id="button" class="btn btn-info btn-block" type="submit"><strong>Add User <span class="fa fa-user-plus"></span></strong></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
