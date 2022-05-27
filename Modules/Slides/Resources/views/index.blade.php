@extends('admin::layouts.master')
@section('title', __('slides::menu.slides'))
@section('content')
<div class="card card-custom shadow-sm">
    <div class="card-header bg-light">
        <div class="card-title">
            <span class="card-icon">
                <i class="fas fa-image"></i>
            </span>
            <h3 class="card-label fw-bolder">@lang('slides::menu.slides')</h3>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12 text-right">
                <a href="{{ route('slides.create') }}" class="btn btn-light-primary float-end mb-3">
                    <i class="fas fa-plus-circle"></i> @lang('slides::cruds.add-new-slide')
                </a>
            </div>
        </div>
        <table class="table table-bordered table-row-dashed text-center table-row-gray-300 align-middle gs-0 gy-4">
            <thead class="bg-light fw-bolder">
                <tr>
                    <th>@lang('slides::cruds.photo')</th>
                    <th>@lang('slides::cruds.title')</th>
                    <th>@lang('slides::cruds.created_by')</th>
                    <th>@lang('slides::cruds.created_at')</th>
                    <th>@lang('slides::cruds.actions')</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($slides as $slide)
                <tr>
                    <td>
                        @if($slide->getFirstMediaUrl('slides') != NULL)
                            <img class="mx-auto" src="{{ $slide->getFirstMediaUrl('slides') }}" alt="Product Image" width="50">
                        @else
                            @lang('slides::messages.no-photo-available')
                        @endif
                    </td>
                    <td>{{ $slide->getTranslatedField('title') }}</td>
                    <td>{{ $slide->user->name }}</td>
                    <td>{{ $slide->created_at->toFormattedDateString() }}</td>
                    <td>
                        <a href="{{ route('slides.edit', $slide->id) }}" class="btn btn-icon btn-light-success">
                            <i class="fas fa-edit"></i>
                        </a>
                        @component('slides::components.delete-component.button')
                            @slot('id',$slide->id)
                        @endcomponent
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5">
                        @lang('slides::messages.no-data-available')
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@component('slides::components.delete-component.delete-modal') @endcomponent
@endsection

@push('javascript')
    @component('slides::components.delete-component.delete-function')
        @slot('route', 'slides.destroy')
    @endcomponent
@endpush