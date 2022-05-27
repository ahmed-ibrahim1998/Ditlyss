@extends('admin::layouts.master')
@section('title', isset($product) ? __('product::cruds.edit') : __('product::menu.products'))
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0 pb-0">
                @foreach ($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card card-custom shadow-sm">
        <div class="card-header bg-light">
            <div class="card-title">
                @isset($product)
                    <span class="card-icon">
                <i class="fas fa-edit"></i>
            </span>
                    <h3 class="card-label fw-bolder">@lang('product::cruds.edit') | {{ $product['name'] }}</h3>
                @else
                    <span class="card-icon">
                <i class="fas fa-plus-circle"></i>
            </span>
                    <h3 class="card-label fw-bolder">@lang('product::cruds.products.add-new-product')</h3>
                @endisset
            </div>
        </div>
        @isset($product)
            {!! Form::open(['method' => 'PUT', 'url' => route('products.update', $product->id), 'files' => true]) !!}
        @else
            {!! Form::open(['method' => 'POST', 'url' => route('products.store'), 'files' => true]) !!}
        @endisset
        <div class="card-body">
            <div class="mb-5 text-center">
                {!! Form::label('photo', __('product::cruds.products.photo'), ['class' => 'form-label']) !!}
                @component('product::components.photo')
                    @slot('name', 'photo')
                    @isset($product)
                        @slot('path', $product->getFirstMediaUrl('products'))
                    @endisset
                @endcomponent
            </div>
            @isset($product)
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                @foreach (\App\Models\Language::all() as $key => $language)
                    <div class="mb-5">
                        {!! Form::label('name', __('product::cruds.products.name'). ' ( '.$language->name.' )', ['class' => 'form-label']) !!}
                        <input type="text" class="form-control form-control-solid" name="name[{{$language->prefix}}]" value="{{$product->getTranslation('name', $language->prefix)}}">
                    </div>
                @endforeach
            @else
                @foreach ($languages as $key => $language)
                    <div class="mb-5">
                        {!! Form::label('name', __('product::cruds.products.name'). ' ( '.$language->name.' )', ['class' => 'form-label']) !!}
                        <input type="text" class="form-control form-control-solid" name="name[{{$language->prefix}}]">
                    </div>
                @endforeach
            @endisset

            <div class="mb-5">
                {!! Form::label('price', __('product::cruds.products.price'), ['class' => 'form-label']) !!}
                {!! Form::number('price', $product->price ?? null , ['class' => 'form-control form-control-solid', 'placeholder' => __('product::cruds.type-here')]) !!}
            </div>

            <div class="mb-5">
                {!! Form::label('is_active', __('product::cruds.products.status'), ['class' => 'form-label']) !!}
                {!! Form::select('is_active', [
                    '1' => __('product::cruds.products.active'),
                    '0' => __('product::cruds.products.inactive'),
                ] , $product->status ?? null , ['class' => 'form-control form-control-solid']) !!}
            </div>

            <div class="mb-5">
                {!! Form::label('product_category_id', __('product::cruds.products.category'), ['class' => 'form-label']) !!}
                <select name="cat_id" id="cat_id" data-control="select2" class="form-select form-control form-control-solid">
                    @forelse ($categories as $cat)
                        <option value="{{ $cat->id }}" {{ isset($product) && $product->product_category_id == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                    @empty
                        <option disabled>@lang('product::messages.no-data-available')</option>
                    @endforelse
                </select>
            </div>


            <div class="mb-5">
                {!! Form::label('product_category_id', __('product::cruds.products.branch'), ['class' => 'form-label']) !!}
                <select name="branch_id" id="branch_id" data-control="select2" class="form-select form-control form-control-solid">
                    @forelse (\Modules\Vendor\Entities\Branch::all() as $branch)
                        <option value="{{ $branch->id }}" {{ isset($product) && $product->branch_id == $branch->id ? 'selected' : '' }}>{{ $branch->name }}</option>
                    @empty
                        <option disabled>@lang('product::messages.no-data-available')</option>
                    @endforelse
                </select>
            </div>

            <h5 class="fw-bolder mb-5 mt-5">
                @lang('product::cruds.products.product-attributes')
            </h5>
            <button class="btn btn-lg btn-info" type="button" onclick="addAttribute(0)">
                <i class="fas fa-plus-circle"></i> @lang('product::cruds.products.add-attribute')
            </button>
            <div class="appendAttributes" id="attributesDiv"></div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-light-success">
                <i class="fas fa-check-circle"></i>
                @isset($product) @lang('product::cruds.update') @else @lang('product::cruds.create') @endisset
            </button>
        </div>
        {!! Form::close() !!}
    </div>
@endsection

@push('javascript')
    @if (!isset($product))
        @include('product::products.scripts')
    @endif
@endpush
