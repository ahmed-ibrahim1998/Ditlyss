<script>
    let choice_index = 0;
    let attribute_index = 0;
    function addAttribute() {
        choice_index = 0;
        $('.appendAttributes').append(`
            <div class="mb-5 mt-10">
                <div class="row">
                    @foreach ($languages as $key => $lang)
                    <div class="col-md-6">
                        <div class="mb-5">
                            <input type="hidden" name="attributes[${attribute_index}][attribute][translates][{{ $key }}][language_id]" value="{{ $lang->id }}">
                            {!! Form::label('attribute_name', __('product::cruds.products.attribute-name'). ' ( '.$lang->name.' )', ['class' => 'form-label']) !!}
                            <input type="hidden" name="attributes[${attribute_index}][attribute][translates][{{ $key }}][key]" value="name" class="form-control">
                            <input type="text" placeholder="@lang('product::cruds.type-here')" name="attributes[${attribute_index}][attribute][translates][{{ $key }}][value]" class="form-control form-control-solid">
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="mt-5 appendChoices">
                    <div class="row">
                        @foreach ($languages as $k => $choice_trans)
                        <div class="col-md-4">
                            <input type="hidden" name="attributes[${attribute_index}][choices][${choice_index}][translates][{{ $k }}][language_id]" value="{{ $choice_trans->id }}">
                            {!! Form::label('choice_name', __('product::cruds.products.choice-name'). ' ( '.$choice_trans->name.' )', ['class' => 'form-label']) !!}
                            <input type="hidden" name="attributes[${attribute_index}][choices][${choice_index}][translates][{{ $k }}][key]" value="name" class="form-control">
                            <input type="text" placeholder="@lang('product::cruds.type-here')" name="attributes[${attribute_index}][choices][${choice_index}][translates][{{ $k }}][value]" class="form-control form-control-solid">
                        </div>
                        @endforeach
                        <div class="col-md-4">
                            {!! Form::label('price', __('product::cruds.products.additional-price'), ['class' => 'form-label']) !!}
                            <div class="input-group">
                                <input type="number" name="attributes[${attribute_index}][choices][${choice_index}][additional_price]" class="form-control form-control-solid" placeholder="{{ __('product::cruds.type-here') }}">
                                <button class="btn btn-light-success" type="button" data-attribute="${attribute_index}" data-choice="${choice_index}" onclick="addExtraChoice(this)">
                                    <i class="fas fa-plus-circle"></i> @lang('product::cruds.products.extra-choice')
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `);
        attribute_index++;
    }

    function addExtraChoice(button) {
        let current_choice_index = $(button).data('choice');
        let current_attribute_index = $(button).data('attribute');
        current_choice_index++;
        $(button).closest('.appendChoices').append(`
            <div class="row mt-5 choiceDiv">
                @foreach ($languages as $ck => $choice_trans_k)
                <div class="col-md-4">
                    <input type="hidden" name="attributes[${current_attribute_index}][choices][${current_choice_index}][translates][{{ $ck }}][language_id]" value="{{ $choice_trans_k->id }}">
                    {!! Form::label('choice_name', __('product::cruds.products.choice-name'). ' ( '.$choice_trans_k->name.' )', ['class' => 'form-label']) !!}
                    <input type="hidden" name="attributes[${current_attribute_index}][choices][${current_choice_index}][translates][{{ $ck }}][key]" value="name" class="form-control">
                    <input type="text" placeholder="@lang('product::cruds.type-here')" name="attributes[${current_attribute_index}][choices][${current_choice_index}][translates][{{ $ck }}][value]" class="form-control form-control-solid">
                </div>
                @endforeach
                <div class="col-md-4">
                    {!! Form::label('price', __('product::cruds.products.additional-price'), ['class' => 'form-label']) !!}
                    <div class="input-group">
                        <input type="number" name="attributes[${current_attribute_index}][choices][${current_choice_index}][additional_price]" class="form-control form-control-solid" placeholder="{{ __('product::cruds.type-here') }}">
                        <button class="btn btn-light-danger" type="button" onclick="removeChoice(this)">
                            <i class="fas fa-minus-circle"></i> @lang('product::cruds.products.remove-choice')
                        </button>
                    </div>
                </div>
            </div>
        `);
        $(button).data('choice', current_choice_index);
    }

    function removeChoice(button) {
        $(button).closest('.choiceDiv').remove();
    }
</script>