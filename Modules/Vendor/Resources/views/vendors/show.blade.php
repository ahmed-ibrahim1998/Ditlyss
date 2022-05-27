@extends('admin::layouts.master')
@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="card-title text-capitalize"><a href="{{route('vendor.index')}}"><i class="fa fa-list mr-5"></i></a> Branch {{$vendor->name}}</div>
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
                        <td>{{$vendor->name}}</td>
                    </tr>
                    <tr>
                        <td>Categories</td>
                        <td>
                            @foreach($vendor->categories as $cat)
                                <spane class="badge badge-success d-inline m-1">{{$cat->name}}</spane>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td>Logo</td>
                        <td>
                            <img src="{{$vendor->getFirstMediaUrl('logo')}}" alt="logo" width="100" height="100" class="image-input-circle">
                        </td>
                    </tr>
                    <tr>
                        <td>Is Active</td>
                        <td>
                            @if($vendor->is_active)
                                <span class="badge badge-circle badge-success">Yes</span>
                            @else
                                <span class="badge badge-circle badge-danger">No</span>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <td>Is Featured</td>
                        <td>
                            @if($vendor->is_featured)
                                <span class="badge badge-circle badge-success">Yes</span>
                            @else
                                <span class="badge badge-circle badge-danger">No</span>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <td>Order</td>
                        <td>{{$vendor->order}}</td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td>{{$vendor->phone}}</td>
                    </tr>

                    <tr>
                        <td>Address</td>
                        <td>{{$vendor->address}}</td>
                    </tr>
                    <tr>
                        <td>Commission</td>
                        <td>{{$vendor->commission}}</td>
                    </tr>
                    <tr>
                        <td>Users</td>
                        <td>
                            @foreach($vendor->users as $user)
                                <div class="m-1">
                                    <label>Name: </label>
                                    <spane class="badge badge-info m-1">{{$user->name}}</spane>
                                    <label>Branch: </label>
                                    <spane class="badge badge-info m-1">{{\Modules\Vendor\Entities\Branch::find($user->pivot->branch_id)->name??''}}</spane>
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
