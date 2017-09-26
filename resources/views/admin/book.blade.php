@extends('base.headeradmin')
@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Book</li>
    </ol>
    <!-- Example DataTables Card-->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-table"></i> Data Booking
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Id Booking</th>
                        <th>Property Name</th>
                        <th>User Email</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Book Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        @foreach ($books as $book)
                            <td>{{$book->id}}</td>
                            <td>{{$book->title}}</td>
                            <td>{{$book->email}}</td>
                            <td>{{$book->start_date}}</td>
                            <td>{{$book->end_date}}</td>
                            <td>{{$book->book_date}}</td>
                    </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@stop