@extends('admin::layouts.master')
@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="card-title text-capitalize"><a href="{{route('consultation.index')}}"><i class="fa fa-list mr-5"></i></a> Consultation</div>
        </div>
        <div class="card-body">
            <table class="table table-striped gy-7 gs-7">
                <thead>
                <tr class="fw-bold fs-6 text-gray-800 border-bottom border-gray-200">
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>User Name</td>
                        <td>{{$consultation->user->name}}</td>
                    </tr>

                    <tr>
                        <td>Gender</td>
                        <td>{{$consultation->gender}}</td>
                    </tr>
                    <tr>
                        <td>Age</td>
                        <td>{{$consultation->age}}</td>
                    </tr>
                    <tr>
                        <td>Height</td>
                        <td>{{$consultation->height}}</td>
                    </tr>
                    <tr>
                        <td>Weight</td>
                        <td>{{$consultation->weight}}</td>
                    </tr>
                    <tr>
                        <td>Physical Activity</td>
                        <td>{{$consultation->physical_activity}}</td>
                    </tr>

                    </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
