<?php
use App\Role;
use App\User;
use Illuminate\Support\Facades\Auth;
//$otherUsers = User::where('role_id', 3);
$otherUsers = User::all();
$data = Auth::user();
$roles = Role::where('id', '>', 2)->get();
//dd($data['role_id']);
?>
@extends('hotels.master')
@section('title')
    <title>Add a Role</title>
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
                <h3><strong><span class="fa fa-key"></span> Create a New Role</strong></h3>

                <form action="{{url('hotels/admin/add_role')}}" method="post">
                    {{csrf_field()}}
                    <div style="display: flex">
                        <div class="form-group" style="flex: 3; margin-right: 15px">
                            <input required class="data form-control" type="text" name="name" placeholder="Enter new Role">
                        </div>
                        <div class="form-group" style="flex: 1">
                            <button id="button" class="btn btn-info btn-block" type="submit"><strong>Add Role <span class="fa fa-user-plus"></span></strong></button>
                        </div>
                    </div>
                </form>

                <div>
                    <table class="table table-bordered table-hovered">
                        <tr>
                            <th>Created Roles</th>
                            <th>Delete Role</th>
                        </tr>
                            @foreach($roles as $role)
                                <tr>
                                    <td>{{$role->name}}</td>
                                    <td>
                                        <button class="btn btn-outline-danger b2" data-toggle="modal" data-target="#delete_{{$role->id}}">
                                            <strong><span class="fa fa-trash"></span> Delete</strong>
                                        </button>
                                        <div id="delete_{{$role->id}}" class="modal fade" role="dialog">
                                            <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Delete role</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Are you sure you want to delete the role, <strong>{{$role->name}}</strong>?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                                                        <button type="button" class="btn btn-outline-danger b2" >
                                                            <a href="{{url('hotels/role/delete',$role->id)}}"><strong><span class="fa fa-trash"></span>Delete</strong></a>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
