@extends('admin::layouts.master')
@section('title' , __('ads::cruds.ads'))

@section('content')

<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
        <span class="card-icon">
            <i class="fas fa-bars"></i>
        </span>
            <h3 class="card-label fw-bolder">@lang('ads::cruds.ads')</h3>
        </div>
        <div class="card-toolbar">


            <span class="text-muted font-weight-bold mr-4"></span>

            <div class="btn-group">
                <a class="btn btn-primary font-weight-bolder" href="{{route('ads.create')}}">
                    @lang('ads::cruds.create-new-ad')
                    <i class="las la-plus"></i>
                </a>

            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-row-dashed text-center table-row-gray-300 align-middle gs-0 gy-4">
            <thead class="bg-light">
            <tr class="fw-bolder text-muted">
                <td>@lang('ads::cruds.photo')</td>
                <td>@lang('ads::cruds.name')</td>
                <td>@lang('ads::cruds.position')</td>
                <td>@lang('ads::cruds.location')</td>
                <td>@lang('ads::cruds.priority')</td>
                <td>@lang('ads::cruds.status')</td>
                <td>@lang('ads::cruds.created-at')</td>
                <td>@lang('ads::cruds.updated-at')</td>
                <td>@lang('ads::cruds.actions')</td>
            </tr>
            </thead>
            <tbody>

            @forelse($ads as $ad)

                <tr>
                    <td>
                        <div class="symbol symbol-40 symbol-sm flex-shrink-0">
                            <img class="" src="{{$ad->photo == NULL ? asset('media/images/ads/blank.png' ) : asset('media/images/ads/' . $ad->photo) }}" alt="photo">
                        </div>
                    </td>
                    <td>{{$ad->name}}</td>
                    <td>{{$ad->position}}</td>
                    <td>{{$ad->location}}</td>
                    <td>{{$ad->priority}}</td>
                    <td>
                        <span class="label label-lg font-weight-bold badge  {{$ad->getActiveClass()}} label-inline">{{$ad->getActive()}}</span>
                    </td>

                    <td>{{$ad->created_at->diffForHumans()}}</td>
                    <td>{{$ad->updated_at->diffForHumans()}}</td>

                    <td >
                        <a href="{{route('ads.edit', $ad->id)}}" class="btn btn-sm btn-primary btn-icon" title="Edit details">
                            <i class="la la-edit"></i>
                        </a>
                        <a  data-toggle="modal" data-target="#delete" onclick="deleteData(this)" id="{{$ad->id}}" class="btn btn-sm btn-danger btn-icon" title="Delete">
                            <i class="la la-trash"></i>
                        </a>
                    </td>
                </tr>
            @empty
                <tr id="no-data">
                    <td colspan="8" class="text-center">@lang('ads::cruds.no-ads-yet')</td>
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
                <h5 class="modal-title" >@lang('ads::cruds.confirm delete')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">@lang('ads::cruds.are you sure to delete this ad ?')</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">@lang('ads::cruds.back')</button>
                <form class="form" id="deleteAd" method="post">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger font-weight-bold">@lang('ads::cruds.yes, delete')</button>

                </form>
            </div>
        </div>
    </div>
</div>


@endsection


