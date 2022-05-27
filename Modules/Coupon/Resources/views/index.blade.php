@extends('admin::layouts.master')

@section('title' , __('coupon::menu.coupons'))

@section('content')
<div class="card card-custom shadow-sm">
    <div class="card-header bg-light">
        <div class="card-title">
            <span class="card-icon">
                <i class="fas fa-tags"></i>
            </span>
            <h3 class="card-label fw-bolder">@lang('coupon::menu.coupons')</h3>
        </div>
    </div>
    <div class="card-body">
        <a href="{{ route('coupons.create') }}" class="btn btn-sm btn-light-primary float-end mb-3">
            <i class="fas fa-plus-circle"></i> @lang('coupon::cruds.add-new-coupon')
        </a>
        <table class="table table-row-dashed text-center table-row-gray-300 align-middle gs-0 gy-4">
            <thead class="bg-light">
                <tr class="fw-bolder text-muted">
                    <td>@lang('coupon::cruds.name')</td>
                    <td>@lang('coupon::cruds.code')</td>
                    <td>@lang('coupon::cruds.start_date')</td>
                    <td>@lang('coupon::cruds.status')</td>
                    <td>@lang('coupon::cruds.count')</td>
                    <td>@lang('coupon::cruds.created-at')</td>
                    <td>@lang('coupon::cruds.actions')</td>
                </tr>
            </thead>
            <tbody>
                @forelse ($coupons as $coupon)
                    <tr class="fw-bolder">
                        <td>{{ $coupon->name}}</td>
                        <td>{{ $coupon->code }}</td>
                        <td>{{ $coupon->start_date }}</td>
                        <td>
                            @if ($coupon->expiration_date < date('Y-m-d', strtotime(now())))
                                <span class="badge bg-danger">
                                    @lang('coupon::cruds.expired')
                                </span>
                            @else
                            <span class="badge bg-success">
                                @lang('coupon::cruds.working')
                            </span>
                            @endif
                        </td>
                        <td>{{ $coupon->count }}</td>
                        <td>{{ $coupon->created_at->toFormattedDateString() }}</td>
                        <td>
                            <a href="{{ route('coupons.edit', $coupon->id) }}" class="btn btn-icon btn-light-success">
                                <i class="fas fa-edit"></i>
                            </a>
                            @component('coupon::components.delete-component.button')
                                @slot('id',$coupon->id)
                            @endcomponent
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">
                            @lang('coupon::messages.no-data-available')
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{$coupons->links()}}
    </div>
</div>
@component('coupon::components.delete-component.delete-modal') @endcomponent

@endsection

@push('javascript')
    @component('coupon::components.delete-component.delete-function')
        @slot('route', 'coupons.destroy')
    @endcomponent
@endpush
