<!-- Modal -->
<div class="modal fade" id="addNewCityModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">@lang('locations::cruds.cities.new-city')</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="{{route('cities.store')}}">
                @csrf
                <div class="modal-body">
                    <div class="mb-5">
                        <label for="country_id" class="form-label">@lang('locations::cruds.countries.country')</label>
                        <select id="country_id" name="country_id" class="form-control form-control-solid">
                            @foreach ($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @foreach ($languages as $key => $language)
                        <div class="mb-5">
                            <label for="">Name in {{$language->prefix}}</label>
                            <input type="text" name="{{$language['prefix']}}" class="form-control form-control-solid">
                        </div>
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-light-success">@lang('locations::cruds.create')</button>
                    <button type="button" class="btn btn-sm btn-light-danger" data-bs-dismiss="modal">@lang('locations::cruds.cancel')</button>
                </div>
            </form>
        </div>
    </div>
</div>
