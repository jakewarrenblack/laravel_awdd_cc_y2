@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Festival: {{ $festival->title }}</div>

                <div class="card-body">
                    <table id="table-festivals" class="table table-hover">
                        <tbody>
                            <tr>
                                <td>Title</td>
                                <td>{{ $festival->title }}</td>
                            </tr>
                            <tr>
                                <td>Description</td>
                                <td>{{ $festival->description}}</td>
                            </tr>
                            <tr>
                                <td>Location</td>
                                <td>{{ $festival->Location }}</td>
                            </tr>
                            <tr>
                                <td>Start Date</td>
                                <td>{{ $festival->start_date }}</td>
                            </tr>
                            <tr>
                                <td>End Date</td>
                                <td>{{ $festival->end_date }}</td>
                            </tr>
                            <tr>
                                <td>Contact Name</td>
                                <td>{{ $festival->contact_name }}</td>
                            </tr>
                            <tr>
                                <td>Contact Email</td>
                                <td>{{ $festival->contact_name }}</td>
                            </tr>
                            <tr>
                                <td>Contact Phone</td>
                                <td>{{ $festival->contact_phone }}</td>
                            </tr>
                        <tbody>
                    </table>
                    <a href="{{ route('user.festivals.index') }}" class="btn btn-default">Back</a>
                </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
