<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        @lang('product::cruds.products.add-new-product')
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group text-center">
                        <div class="image-input image-input-empty  image-input-circle text-center">
                            <div class="image-input image-input-circle">
                                @if($product->exists && !$logo)
                                    <img class="image-input-wrapper w-125px h-125px" src="{{$product->getFirstMediaUrl('products')}}" alt="logo">
                                @elseif($logo)
                                    <img class="image-input-wrapper w-125px h-125px" src="{{$logo->temporaryUrl()}}" alt="logo">
                                @else
                                    <img class="image-input-wrapper w-125px h-125px" src="{{asset('assets/media/avatars/blank.png')}}" alt="logo default">
                                @endif
                            </div>
                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                   data-kt-image-input-action="change"
                                   data-bs-toggle="tooltip"
                                   data-bs-dismiss="click"
                                   title="Change avatar">
                                <i class="bi bi-pencil-fill fs-7"></i>
                                <input type="file" wire:model="logo" name="logo" id="logo">
                            </label>
                        </div>
                    </div>

                    @foreach(\App\Models\Language::all() as $lang)
                        <x-admin::input-text name="name[]" id="name_{{$lang->prefix}}" label="Name in {{$lang->prefix}}" model="product.name.{{$lang->prefix}}"></x-admin::input-text>
                    @endforeach

                    <x-admin::input-number name="price" label="{{trans('product::cruds.products.price')}}" model="product.price"></x-admin::input-number>
                    <x-admin::input-select name="cat_id" label="{{trans('product::cruds.products.category')}}" model="product.cat_id" :options="\Modules\Product\Entities\ProductCategory::all()" optionsDisplayField="name" optionsValueField="id"></x-admin::input-select>
                    <x-admin::input-select name="vendor_id" label="Vendor" :options="\Modules\Vendor\Entities\Vendor::all()" optionsValueField="id" optionsDisplayField="name"></x-admin::input-select>
                    <x-admin::input-select model="product.Branch_id" name="branch_id" label="Branch" :options="\Modules\Vendor\Entities\Branch::all()" optionsValueField="id" optionsDisplayField="name"></x-admin::input-select>
                    <x-admin::input-number name="rating" label="{{trans('product::cruds.products.over-all-rating')}}" model="product.overall_rating"></x-admin::input-number>


                    <div class="form-group">
                        <label class="form-label">{{trans('product::cruds.categories.is_active')}}</label>
                        <div class="form-check form-switch form-check-custom form-check-solid">
                            <input class="form-check-input" type="checkbox" wire:model="product.is_active" id="is_active" value="1" checked="checked"/>
                            <label class="form-check-label" for="flexSwitchChecked">{{trans('product::cruds.categories.is_active')}}</label>
                        </div>
                    </div>


                    <div>
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="card-header align-items-center">
                                        <div class="card-title">{{trans('product::cruds.products.add-attribute')}}</div>
                                        <button class="btn btn-primary" type="button" wire:click="addNewAttribute"><i class="fa fa-plus"></i></button>
                                    </div>
                                    <div class="card-body">

                                        @foreach($attributes as $index=>$attribute)
                                            <div class="row border-bottom-1 mb-5 p-5">
                                                <div class="col">
                                                    <div class="row">
                                                        <div class="col">
                                                            <button type="button" class="btn btn-danger float-right" wire:click="removeAttribute({{$index}})"><i class="fa fa-minus"></i></button>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        @foreach(\App\Models\Language::all() as $lang)
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label class="form-label">{{trans('product::cruds.products.attribute-name')}} in {{$lang->prefix}}</label>
                                                                    <input type="text" wire:model="attributes.{{$index}}.name.{{$lang->prefix}}" name="attribute_name[{{$index}}][{{$lang->prefix}}]" class="form-control form-control-solid">
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                        <div class="col">
                                                            <div class="form-group" style="width: 90%">
                                                                <label class="form-label">{{trans('product::cruds.products.attribute-type')}}</label>
                                                                <select name="type[]" class="form-control form-control-solid" wire:model="attributes.{{$index}}.type">
                                                                    <option value="single">Single</option>
                                                                    <option value="multi">Multi</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label class="form-label" for="min">Min</label>
                                                                <input type="number" step="0.1" class="form-control-solid form-control" wire:model="attributes.{{$index}}.min">
                                                            </div>
                                                        </div>
                                                        <div class="col  d-flex align-items-end">
                                                            <div class="form-group">
                                                                <label class="form-label" for="min">Max</label>
                                                                <input type="number" step="0.1" class="form-control-solid form-control" wire:model="attributes.{{$index}}.max">
                                                            </div>
                                                            <button type="button" class="btn btn-primary ml-1" title="add new choice" wire:click="addNewChoice({{$index}})"><i class="fa fa-plus"></i></button>
                                                        </div>
                                                    </div>

                                                    @foreach($attribute['choices'] as $choiceIndex => $choice)
                                                        <div class="row">
                                                            @foreach(\App\Models\Language::all() as $lang)
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <label class="form-label">{{trans('product::cruds.products.choice-name')}} in {{$lang->prefix}}</label>
                                                                        <input type="text" name="choice_name[{{$index}}][{{$choiceIndex}}][{{$lang->prefix}}]" wire:model="attributes.{{$index}}.choices.{{$choiceIndex}}.name.{{$lang->prefix}}" class="form-control form-control-solid">
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                            <div class="col d-flex align-items-end">
                                                                <div class="form-group" style="width: 90%">
                                                                    <label class="form-label">{{trans('product::cruds.products.additional-price')}}</label>
                                                                    <input type="number" step="0.1" name="additional_price[{{$index}}][{{$choiceIndex}}][]" class="form-control form-control-solid" wire:model="attributes.{{$index}}.choices.{{$choiceIndex}}.additional_price">
                                                                </div>
                                                                <button type="button" class="btn btn-danger ml-1" wire:click="removeChoice({{$index}},{{$choiceIndex}})"><i class="fa fa fa-minus"></i></button>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <button type="button" class="btn btn-primary float-right" wire:click="save">{{trans('admin::cruds.save')}}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@push('javascript')
    <script>
        $('#vendor_id').on('change', (e) => window.livewire.emit('vendorSelected', e.target.value));
        $('#cat_id').on('change', (e) => window.livewire.emit('categorySelected', e.target.value));
        $('#branch_id').on('change', (e) => window.livewire.emit('branchSelected', e.target.value));
        window.livewire.on('sendingBranches', (branches) => {
            $('#branch_id').empty();
            for (const branch in branches) {
                let newOption = new Option(branches[branch], branch, false, false);
                $('#branch_id').append(newOption).trigger('change');
            }
        })
    </script>
@endpush
