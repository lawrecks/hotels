<?php
use App\Role;
use App\User;
use Illuminate\Support\Facades\Auth;
$users = User::where('role_id', '>', Role::$SA)->get();
//$otherUsers = User::all();
$data = Auth::user();
$roles = Role::where('id','>', Role::$SA)->get();
//dd($data['role_id']);
?>
@extends('hotels.master')
    @section('title')
    <title>Dashboard</title>
    @stop

@section('content')
    <style>
        body{
            font-family: Waree;
        }
        header{
            border-bottom: 1px solid #005cbf;
            color: #007bff;
            margin: 15px 0 15px 0;
            text-align: center;
        }
        #button{
            text-align: center;
        }
        .main {
            width: 70%;
            background: white;
            horiz-align: center;
            margin: auto;
            margin-top: 100px;
            box-shadow: -9px 9px 16px rgba(0, 0, 0, 0.2);
        }
        .container a{
            color: #4e555b;
        }
        .container a:hover{
            text-decoration: none;
            color:#062c33;
        }
        nav{
            padding-bottom:0;
        }
        .nav-item{
            width:30%;
            color: #2c3643;
            text-align: center;
            font-size: 18px;
        }
        .dropdown {
            position: relative;
            display: inline-block;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: white;
            min-width: 160px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
            z-index: 1;
        }
        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }
        .dropdown-content a:hover {
            background-color:#34ce57;
            color:inherit;
        }
        /* Show the dropdown menu on hover */
        .dropdown:hover .dropdown-content {
            display: block;
        }
        /* Change the background color of the dropdown button when the dropdown content is shown */
        /*.dropdown:hover .dropbtn {*/
        /*background-color: white;*/
        /*}*/
        .b2 a{
            color:red;
        }
        .b2 a:hover{
            color:white;
            text-decoration: none;
        }
    </style>
    <div class="container text-center">
        <h3><strong><span class="fa fa-user"></span> {{$data['username']}} ({{$data->role->name}})</strong></h3>
        <div class="row main jumbotron">
            <h5>Welcome to hotels.ng, click <a href="#">here</a> to see hotels in {{$data['city']}} </h5>
        </div>
    </div>
@stop
@section('admin_content')
    @if(Session::has('flash_message'))
        <div class="alert alert-success">
            {{session('flash_message')}}
            @if(Session::has('flash_message_close'))
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            @endif
        </div>
    @endif
    <h5 class="text-center"><strong><span class="fa fa-user"></span> {{$data['username']}} ({{$data['role_id'] == \App\Role::$SA ? 'Super Admin':'Admin'}})</strong></h5>
    <div class="main jumbotron">
        {{--@php(dd($data->username));--}}
        <div class="users">
            <div style="display:flex;">
                <h5 style="flex:4"><strong><span class="fa fa-address-book"></span> Registered Users</strong></h5>
                <a role="button" href="{{url('hotels/admin/create_user')}}" class="btn btn-info" style="flex:1; margin-right:10px"><span class="fa fa-plus"></span><strong> Create new user </strong></a>
                <a role="button" href="{{url('hotels/admin/add_role')}}" class="btn btn-info" style="flex:1"><span class="fa fa-plus"></span><strong> Add role </strong></a>
            </div>

            <table class="table table-bordered table-hover text-center">
                <tr>
                    <th>Username</th>
                    <th>Phone no.</th>
                    <th>E-mail</th>
                    <th>Role</th>
                    <th>Change Role</th>
                    <th>Delete</th>
                </tr>
            @foreach($users as $user)
                    <tr>
                        <td>{{$user->username}}</td>
                        <td>{{$user->phone_no}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role->name}}</td>
                            <td>
                                <select class="custom-select" onchange="window.location='{{url('hotels/change_role/'.$user->id)}}/' + this.value">
                                    <option value="">Change Role...</option>
                                    @foreach($roles as $role)
                                        <option value="{{$role->id}}">
                                           {{$role->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                        @if ($user->role_id == \App\Role::$SA || $user->role_id == \App\Role::$A)
                            <td><button class="btn disabled btn-default b1" style="cursor: not-allowed"><a href="#" style="cursor: not-allowed"><strong><span class="fa fa-trash"></span> Delete</strong></a></button></td>
                        @else
                            <td><button class="btn btn-outline-danger b2" data-toggle="modal" data-target="#delete_{{$user->id}}">
                                    <strong><span class="fa fa-trash"></span> Delete</strong>
                                </button>
                                <div id="delete_{{$user->id}}" class="modal fade" role="dialog">
                                    <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Delete User</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure you want to delete <strong>{{$user->username}}</strong>?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                                                <button type="button" class="btn btn-outline-danger b2" >
                                                    <a href="{{url('hotels/admin/delete',$user->id)}}"><strong><span class="fa fa-trash"></span>Delete</strong></a>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        @endif
                    </tr>
            @endforeach
            </table>
        </div>
    </div>
@stop

{{--make sure an admin cannot delete himself--}}

{{--create allowance for super admins(having more privileges than other admins)--}}

{{--confirm password should be inclusive in the register form--}}

{{--change the table structure for admin and add headers--}}

{{--create roles in the database(such as managers, teachers)--}}

{{--an admin should be able to assign any role to a user--}}

{{--when a change is made inside in the table,do not require the whole page to load--}}
{{--rather a spinner should be used--}}
