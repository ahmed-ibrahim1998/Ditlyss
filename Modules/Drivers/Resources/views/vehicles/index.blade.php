@extends('admin::layouts.master')
@section('title' , __('drivers::cruds.vehicles'))

@section('content')

<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
        <span class="card-icon">
            <i class="fas fa-car"></i>
        </span>
            <h3 class="card-label fw-bolder">@lang('drivers::cruds.vehicles')</h3>
        </div>
        <div class="card-toolbar">


            <span class="text-muted font-weight-bold mr-4"></span>

            <div class="btn-group">
                <a class="btn btn-primary font-weight-bolder" href="{{route('vehicles.create')}}">
                    @lang('drivers::cruds.create-new-vehicle')
                    <i class="las la-plus"></i>
                </a>

            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-row-dashed text-center table-row-gray-300 align-middle gs-0 gy-4">
            <thead class="bg-light">
            <tr class="fw-bolder text-muted">
                <td>@lang('drivers::cruds.plate-number')</td>
                <td>@lang('drivers::cruds.licence-expiration')</td>
                <td>@lang('drivers::cruds.created-at')</td>
                <td>@lang('drivers::cruds.updated-at')</td>
                <td>@lang('drivers::cruds.actions')</td>

            </tr>
            </thead>
            <tbody>

            @forelse($vehicles as $vehicle)

                <tr>
                    <td>{{$vehicle->plate_number}}</td>
                    <td>{{$vehicle->licence_expired_at}}</td>
                    <td>{{$vehicle->created_at->diffForHumans()}}</td>
                    <td>{{$vehicle->updated_at->diffForHumans()}}</td>

                    <td >
                        <a href="{{route('vehicles.edit', $vehicle->id)}}" class="btn btn-sm btn-primary btn-icon" title="Edit details">
                            <i class="la la-edit"></i>
                        </a>
                        <a  data-toggle="modal" data-target="#delete" onclick="deleteData(this)" id="{{$vehicle->id}}" class="btn btn-sm btn-danger btn-icon" title="Delete">
                            <i class="la la-trash"></i>
                        </a>
                    </td>
                </tr>
            @empty
                <tr id="no-data">
                    <td colspan="8" class="text-center">@lang('drivers::cruds.no-vehicles-yet')</td>
                </tr>
            @endforelse

            </tbody>
        </table>
    </div>
</div>


<div class="modal fade" id="delete" tabindex="-1" aria-labelledby="delete" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" >@lang('drivers::cruds.confirm delete')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">@lang('drivers::cruds.are you sure to delete this vehicle ?')</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">@lang('drivers::cruds.back')</button>
                <form class="form" id="deleteVehicle" method="post">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger font-weight-bold">@lang('drivers::cruds.yes, delete')</button>

                </form>
            </div>
        </div>
    </div>
</div>


@endsection


