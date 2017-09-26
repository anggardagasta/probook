@extends('base.headeradmin')
@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">User</li>
    </ol>
    <!-- Example DataTables Card-->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-table"></i> Data User
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Email</th>
                        <th>Type</th>
                        <th>Verified</th>
                        <th>Last Updated</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        @foreach ($users as $user)
                            <td>{{$user->id}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->type}}</td>
                            @if ($user->verified=='no')
                                <td>
                                    <a href="{{URL::to('verified',$user->id)}}" class="btn btn-danger">
                                        <span class="glyphicon glyphicon-remove"></span>&nbsp;No
                                    </a>
                                </td>
                            @else
                                <td>
                                    <button class="btn btn-success">
                                        <span class="glyphicon glyphicon-ok"></span>&nbsp;Yes&nbsp;
                                    </button>
                                </td>
                            @endif
                            <td>{{$user->updated_at}}</td>
                    </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@stop