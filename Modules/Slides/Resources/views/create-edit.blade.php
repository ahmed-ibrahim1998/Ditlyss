@extends('admin::layouts.master')
@section('title', isset($slide) ? __('slides::cruds.edit-slide') : __('slides::cruds.add-new-slide'))
@section('content')
<div class="row">
    <div class="col-md-12">
        <a href="{{ route('slides.index') }}" class="btn btn-light-danger mb-3">
            <i class="fas fa-arrow-circle-left"></i> @lang('slides::cruds.back')
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
<div class="card card-custom shadow-sm">
    <div class="card-header bg-light">
        <div class="card-title">
            @isset($slide)
            <span class="card-icon">
                <i class="fas fa-edit"></i>
            </span>
            <h3 class="card-label fw-bolder">@lang('slides::cruds.edit-slide')</h3>
            @else
            <span class="card-icon">
                <i class="fas fa-plus-circle"></i>
            </span>
            <h3 class="card-label fw-bolder">@lang('slides::cruds.add-new-slide')</h3>
            @endisset
        </div>
    </div>
    @isset($slide)
    {!! Form::open(['method' => 'PUT', 'url' => route('slides.update', $slide->id), 'files' => true]) !!}
    @else
    {!! Form::open(['method' => 'POST', 'url' => route('slides.store'), 'files' => true]) !!}
    @endisset
    <div class="card-body">
        <div class="mb-5 text-center">
            {!! Form::label('photo', __('slides::cruds.photo'), ['class' => 'form-label']) !!}
            @component('slides::components.photo')
                @slot('name', 'photo')
                @isset($slide)
                    @slot('path', $slide->getFirstMediaUrl('slides'))                    
                @endisset
            @endcomponent
        </div>
        <div class="row">
            @foreach ($languages as $key => $language)
            <div class="col-md-6">
                <div class="mb-5">
                    <input type="hidden" name="languages[{{ $key }}][language_id]" value="{{ $language->id }}">
                    {!! Form::label('title', __('slides::cruds.title'). ' ( '.$language->name.' )', ['class' => 'form-label']) !!}
                    <input type="hidden" name="languages[{{ $key }}][key]" value="title" class="form-control">
                    <input type="text" @isset($slide) value="{{ $slide->translates()->where('key', 'title')->whereLanguageId($language->id)->first()->value }}" @endisset placeholder="@lang('slides::cruds.type-here')" name="languages[{{ $key }}][value]" class="form-control form-control-solid">
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            @foreach ($languages as $k => $desc_lang)
            <div class="col-md-6">
                <div class="mb-5">
                    <input type="hidden" name="description[{{ $k }}][language_id]" value="{{ $desc_lang->id }}">
                    {!! Form::label('description', __('slides::cruds.description'). ' ( '.$desc_lang->name.' )', ['class' => 'form-label']) !!}
                    <input type="hidden" name="description[{{ $k }}][key]" value="description" class="form-control">
                    <input type="text" @isset($slide) value="{{ $slide->translates()->where('key', 'description')->whereLanguageId($language->id)->first()->value }}" @endisset placeholder="@lang('slides::cruds.type-here')" name="description[{{ $k }}][value]" class="form-control form-control-solid">
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            @foreach ($languages as $i => $button_text_lang)
            <div class="col-md-6">
                <div class="mb-5">
                    <input type="hidden" name="button_text[{{ $i }}][language_id]" value="{{ $button_text_lang->id }}">
                    {!! Form::label('button-text', __('slides::cruds.button-text'). ' ( '.$button_text_lang->name.' )', ['class' => 'form-label']) !!}
                    <input type="hidden" name="button_text[{{ $i }}][key]" value="button_text" class="form-control">
                    <input type="text" @isset($slide) value="{{ $slide->translates()->where('key', 'button_text')->whereLanguageId($language->id)->first()->value }}" @endisset placeholder="@lang('slides::cruds.type-here')" name="button_text[{{ $i }}][value]" class="form-control form-control-solid">
                </div>
            </div>
            @endforeach
        </div>
        <div class="mb-5">
            {!! Form::label('button_link', __('slides::cruds.button-link'), ['class' => 'form-label']) !!}
            {!! Form::text('button_link', $slide->button_link ?? null , ['class' => 'form-control form-control-solid', 'placeholder' => __('slides::cruds.type-here')]) !!}
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-light-success">
            <i class="fas fa-check-circle"></i>
            @isset($slide)
            @lang('slides::cruds.update')
            @else
            @lang('slides::cruds.create')
            @endisset
        </button>
    </div>
    {!! Form::close() !!}
</div>
@endsection