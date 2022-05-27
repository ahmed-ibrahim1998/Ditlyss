@extends('admin::layouts.master')

@section('title' , __('coupon::menu.coupons'))

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('coupons.index') }}" class="btn btn-light-danger mb-3">
                <i class="fas fa-arrow-circle-left"></i> @lang('coupon::cruds.back')
            </a>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger fw-bolder mb-0 pb-0">
            <ul type="disc">
                @foreach ($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title">
                @isset($coupon)
                    <span class="card-icon">
                <i class="fas fa-edit"></i>
            </span>
                    <h3 class="card-label fw-bolder">
                        @lang('coupon::cruds.edit') | {{ $coupon->name }}
                    </h3>
                @else
                    <span class="card-icon">
                    <i class="fas fa-plus-circle"></i>
                </span>
                    <h3 class="card-label fw-bolder">
                        @lang('coupon::cruds.add-new-coupon')
                    </h3>
                @endisset
            </div>
        </div>
        @isset($coupon)
            {!! Form::open(['method' => 'PUT', 'url' => route('coupons.update', $coupon->id)]) !!}
            <input type="hidden" name="coupon_id" value="{{ $coupon->id }}">
        @else
            {!! Form::open(['method' => 'POST', 'url' => route('coupons.store')]) !!}
        @endisset
        <div class="card-body">
            @isset($coupon)
                @foreach ($languages as $lang)
                    <div class="mb-5">
                        {!! Form::label('coupon_name', __('locations::cruds.countries.name'). ' ( '.$lang->name.' )', ['class' => 'form-label']) !!}
                        <input type="text" name="languages[{{ $lang->prefix }}][value]" value="{{ $coupon->getTranslation('name', $lang->prefix) }}" class="form-control form-control-solid">
                    </div>
                @endforeach
            @else
                @foreach ($languages as $key=>$lang)
                    <div class="mb-5">
                        {!! Form::label('coupon_name', __('coupon::cruds.name'). ' ( '.$lang->name.' )', ['class' => 'form-label']) !!}
                        <input type="text" name="name[{{ $lang->prefix }}]" class="form-control form-control-solid">
                    </div>
                @endforeach
            @endisset


            <div class="mb-5">
                {!! Form::label('code', __('coupon::cruds.code'), ['class' => 'form-label']) !!}
                {!! Form::text('code', $coupon->code ?? null, ['class' => 'form-control form-control-solid', 'placeholder' => __('coupon::cruds.code')]) !!}
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-5">
                        {!! Form::label('usage_rule', __('coupon::cruds.usage_rule'), ['class' => 'form-label']) !!}
                        {!! Form::select('usage_rule', [
                            'all_customers' => __('coupon::cruds.all_customers'),
                            'new_customers' => __('coupon::cruds.new_customers'),
                        ], $coupon->usage_rule ?? 'all_customers', ['class' => 'form-control form-control-solid']) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-5">
                        {!! Form::label('free_delivery', __('coupon::cruds.free_delivery'), ['class' => 'form-label']) !!}
                        {!! Form::select('free_delivery', [
                            '0' => __('coupon::cruds.yes'),
                            '1' => __('coupon::cruds.no'),
                        ], $coupon->free_delivery ?? 'yes' , ['class' => 'form-control form-control-solid']) !!}
                    </div>
                </div>
            </div>


            <div class="mb-5">
                {!! Form::label('amount', __('coupon::cruds.amount'), ['class' => 'form-label']) !!}
                <div class="input-group">
                    <div class="input-group-prepend">
                        {!! Form::select('type', [
                            'fixed' => __('coupon::cruds.fixed'),
                            'percentage' => __('coupon::cruds.percentage'),
                        ], $coupon->type ?? 'fixed', ['class' => 'form-control form-control-solid']) !!}
                    </div>
                    {!! Form::number('amount', $coupon->amount ?? null, ['class' => 'form-control form-control-solid']) !!}
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-5">
                        {!! Form::label('start_date', __('coupon::cruds.start_date'), ['class' => 'form-label']) !!}
                        {!! Form::date('start_date', $coupon->start_date ?? date('Y-m-d', strtotime(now())), ['class' => 'form-control form-control-solid']) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-5">
                        {!! Form::label('expiration_date', __('coupon::cruds.expiration_date'), ['class' => 'form-label']) !!}
                        {!! Form::date('expiration_date', $coupon->expiration_date ?? null, ['class' => 'form-control form-control-solid']) !!}
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-6">
                    <div class="mb-5">
                        {!! Form::label('count', __('coupon::cruds.count'), ['class' => 'form-label']) !!}
                        {!! Form::number('count', $coupon->count ?? null, ['class' => 'form-control form-control-solid', 'placeholder' => __('coupon::cruds.count')]) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-5">
                        {!! Form::label('uses_per_customer', __('coupon::cruds.uses_per_customer'), ['class' => 'form-label']) !!}
                        {!! Form::number('uses_per_customer', $coupon->uses_per_customer ?? null, ['class' => 'form-control form-control-solid', 'placeholder' => __('coupon::cruds.uses_per_customer')]) !!}
                    </div>
                </div>
            </div>


            <div class="mb-5">
                {!! Form::label('min_value', __('coupon::cruds.min_value'), ['class' => 'form-label']) !!}
                {!! Form::number('min_value', $coupon->min_value ?? null, ['class' => 'form-control form-control-solid', 'placeholder' => __('coupon::cruds.min_value')]) !!}
            </div>

            <div class="mb-5">
                {!! Form::label('description', __('coupon::cruds.description'), ['class' => 'form-label']) !!}
                {!! Form::textarea('description', $coupon->description ?? null, ['class' => 'form-control form-control-solid', 'placeholder' => __('coupon::cruds.description'), 'rows' => 2]) !!}
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-light-success">
                <i class="fas fa-check-circle"></i> @lang('coupon::cruds.create')
            </button>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
