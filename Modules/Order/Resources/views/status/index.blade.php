@extends('admin::layouts.master')
@section('title', __('order::cruds.order-statuses'))
@section('content')
<div class="row">
    <div class="col-md-4">
        {!! Form::open(['method' => 'POST', 'url' => route('status.store')]) !!}
        <div class="card">
            <div class="card-header border-0 pt-6 mb-5">
                <div class="card-title">
                    <span class="card-icon">
                        <i class="fas fa-list"></i>
                    </span>
                    <h3 class="card-label">@lang('order::cruds.new-order-status')</h3>
                </div>
            </div>
            <div class="card-body">
                <div class="mb-10">
                    @foreach ($statuses as $bg => $name)
                        <span class="badge mx-4 {{ $bg }}">{{ $name }}</span>
                    @endforeach
                </div>
                @foreach ($languages as $key => $language)
                <div class="mb-5">
                    <label class="form-label">@lang('order::cruds.name') ( {{$language->name}} )</label>
                    <input type="text" name="{{$language->prefix}}" placeholder="@lang('order::cruds.type-here')" class="form-control form-control-solid">
                </div>
                @endforeach
                <div class="mb-5">
                    <label class="form-label">@lang('order::cruds.color')</label>
                    <select name="color" class="form-control form-control-solid">
                        @foreach ($statuses as $status_bg => $status_name)
                        <option value="{{ $status_bg }}">{{ $status_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-light-success">
                    <i class="fas fa-check-circle"></i> @lang('order::cruds.create')
                </button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header border-0 pt-6 mb-5">
                <div class="card-title">
                    <span class="card-icon">
                        <i class="fas fa-list"></i>
                    </span>
                    <h3 class="card-label">@lang('order::cruds.order-statuses')</h3>
                </div>
            </div>
            <div class="card-body pt-0 ">
                <div class="table-responsive mb-5">
                    <table class="table text-center table-striped table-row-bordered gy-5 gs-7 border rounded" id="orders_table">
                        <thead>
                            <tr class="fw-bolder fs-6 text-gray-800 border-bottom-2 border-gray-300 bg-gray-200">
                                <th>@lang('order::cruds.name')</th>
                                <th>@lang('order::cruds.color')</th>
                                <th>@lang('order::cruds.created-at')</th>
                                <th>@lang('order::cruds.actions')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($order_statuses as $order_status)
                            <tr>
                                <td>{{ $order_status->name }}</td>
                                <td>
                                    <span class="badge {{ $order_status->color }}">
                                        {{ $statuses[$order_status->color] }}
                                    </span>
                                </td>
                                <td>{{ $order_status->created_at->toFormattedDateString() }}</td>
                                <td>
                                @component('order::components.delete-component.button')
                                    @slot('id',$order_status->id)
                                @endcomponent
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4">
                                    @lang('order::messages.no-data-available')
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@component('order::components.delete-component.delete-modal') @endcomponent
@endsection

@push('javascript')
    @component('order::components.delete-component.delete-function')
        @slot('route', 'status.destroy')
    @endcomponent
@endpush