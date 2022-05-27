@extends('admin::layouts.master')
@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="card-title text-capitalize"><a href="{{route('branch.index')}}"><i class="fa fa-list mr-5"></i></a> Branch {{$branch->name}}</div>
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
                        <td>{{$branch->name}}</td>
                    </tr>
                    <tr>
                        <td>Vendor</td>
                        <td>{{$branch->vendor->name??''}}</td>
                    </tr>
                    <tr>
                        <td>Area</td>
                        <td>{{$branch->area->name??''}}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>{{$branch->status}}</td>
                    </tr>
                    <tr>
                        <td>Is Active</td>
                        <td>
                            @if($branch->is_active)
                                <span class="badge badge-circle badge-success">Yes</span>
                            @else
                                <span class="badge badge-circle badge-danger">No</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Cuisines</td>
                        <td>
                            @foreach($branch->cuisines as $cuisine)
                                <spane class="badge badge-success d-inline m-1">{{$cuisine->name}}</spane>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>{{$branch->address}}</td>
                    </tr>
                    <tr>
                        <td>Is Featured</td>
                        <td>
                            @if($branch->is_featured)
                                <span class="badge badge-circle badge-success">Yes</span>
                            @else
                                <span class="badge badge-circle badge-danger">No</span>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <td>Delivery Time</td>
                        <td>{{$branch->delivery_time}}</td>
                    </tr>

                    <tr>
                        <td>Delivery Areas</td>
                        <td>
                            @foreach($branch->delivery_areas as $area)
                                <div class="m-1">
                                    <label>Name: </label>
                                    <spane class="badge badge-info m-1">{{$area->name}}</spane>
                                    <label>Min charge: </label>
                                    <spane class="badge badge-info m-1">{{$area->pivot->min_charge}}</spane>
                                    <label>Delivery Fees: </label>
                                    <spane class="badge badge-info m-1">{{$area->pivot->delivery_fees}}</spane>
                                </div>
                            @endforeach
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



@endsection
