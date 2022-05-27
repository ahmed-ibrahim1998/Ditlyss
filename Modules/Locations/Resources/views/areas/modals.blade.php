<!-- Modal -->
<div class="modal fade" id="addNewAreaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">@lang('locations::cruds.areas.new-area')</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="{{route('areas.store')}}">
                @csrf
                <div class="modal-body">
                    <div class="mb-5">
                        <label for="city_id" class="form-label">@lang('locations::cruds.areas.city')</label>
                        <select id="city_id" name="city_id" class="form-control form-control-solid">
                            @foreach ($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @foreach ($languages as $key => $language)
                    <div class="mb-5">
                        <label for="">Name in {{$language->prefix}}- ({{$language->name}})</label>
                        <input placeholder="@lang('locations::cruds.type-here')" type="text" name="{{$language->prefix}}" class="form-control form-control-solid">
                    </div>
                    @endforeach
                    <div class="mb-5">
                        {!! Form::label('delivery_fees', __('locations::cruds.areas.delivery_fees'), ['class' => 'form-label']) !!}
                        {!! Form::number('delivery_fees', null, ['class' => 'form-control form-control-solid', 'placeholder' => __('locations::cruds.type-here')]) !!}
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
