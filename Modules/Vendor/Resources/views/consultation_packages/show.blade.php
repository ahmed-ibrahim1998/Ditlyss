@extends('admin::layouts.master')
@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="card-title text-capitalize"><a href="{{route('consultation-package.index')}}"><i class="fa fa-list mr-5"></i></a> Consultation Package {{$consultationPackage->name}}</div>
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
                        <td>Name</td>
                        <td>{{$consultationPackage->name}}</td>
                    </tr>

                    <tr>
                        <td>price</td>
                        <td>{{$consultationPackage->price}}</td>
                    </tr>

                    <tr>
                        <td>Vendor Name</td>
                        <td>{{$consultationPackage->vendor->name}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



@endsection
