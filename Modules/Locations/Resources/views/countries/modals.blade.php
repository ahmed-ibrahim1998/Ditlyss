<!-- Add New Country Modal -->
<div class="modal fade" id="addNewCountryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">@lang('locations::cruds.countries.new-country')</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('countries.store')}}" method="post">
                @csrf
                <div class="modal-body">
                    @foreach ($languages as $key => $language)
                    <div class="mb-5">
                        <label class="form-label">Name in {{$language->prefix}}</label> <span class="text-danger fw-bolder">*</span>
                        <input type="text" name="{{$language->prefix}}" value="{{old($language->prefix), ''}}" class="form-control form-control-solid">
                    </div>
                    @endforeach
                    <div class="mb-5">
                        <label class="form-label">@lang('locations::cruds.countries.country-number-prefix')</label>
                        <span class="text-danger fw-bolder">*</span>
                        {!! Form::number('number_prefix', null, ['class' => 'form-control form-control-solid', 'placeholder' => __('locations::cruds.type-here')]) !!}
                        <span class="form-text text-muted">
                            @lang('locations::cruds.countries.ex-20-996')
                        </span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-light-success">@lang('locations::cruds.create')</button>
                    <button type="button" class="btn btn-sm btn-light-danger" data-bs-dismiss="modal">@lang('locations::cruds.cancel')</button>
                </div>
            </form>
        </div>
    </div>
</div>
