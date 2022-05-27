<div class="container">
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{route('consultation-package.store')}}">
                @csrf

                @foreach(\App\Models\Language::all() as $lang)
                    <div class="form-group mb-5">
                        <label for="">Name in {{$lang->prefix}} - ({{$lang->name}})</label>
                        <input name="name[{{$lang->prefix}}]" type="text" class="form-control form-control-solid" placeholder="Package name in {{$lang->name}}" wire:model="package.name.{{$lang->prefix}}">
                        @error("name.$lang->prefix")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                @endforeach

                <div class="form-group mb-5">
                    <label for="">Price</label>
                    <input type="number" step="any" name="price" class="form-control form-control-solid" placeholder="Package price here .." wire:model="package.price">
                    @error('price')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <x-admin::input-select name="vendor_id" label="Vendor" :options="\Modules\Vendor\Entities\Vendor::all()" optionsValueField="id" optionsDisplayField="name"></x-admin::input-select>
                <hr>
                <div class="row">
                    <div class="col">
                        <button type="button" class="btn btn-primary" wire:click="addAttribute"><i class="fa fa-plus-square"></i></button>
                    </div>
                </div>

                @foreach($attributes as $index=>$attribute)
                    <div class="row">
                        <div class="col">
                            <button type="button" class="btn btn-danger float-right" wire:click="removeAttribute({{$index}})"><i class="fa fa-minus"></i></button>
                            @foreach(\App\Models\Language::all() as $lang)
                                <div class="form-group mb-5">
                                    <label for="">Name in {{$lang->prefix}} - ({{$lang->name}})</label>
                                    <input name="name[{{$lang->prefix}}]" type="text" id="attributes-{{$index}}-name-{{$lang->prefix}}" class="form-control form-control-solid" placeholder="Attribute name in {{$lang->name}}" wire:model="attributes.{{$index}}.name.{{$lang->prefix}}">
                                    @error("name.$lang->prefix")
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            @endforeach
                            <div class="form-group">
                                <label for="type">Type: </label>
                                <select class="form-control form-control-solid" name="type" id="attributes-{{$index}}-type" wire:model="attributes.{{$index}}.type">
                                    <option value="required">Required</option>
                                    <option value="optional">Optional</option>
                                </select>
                            </div>

                        </div>
                    </div>
                    <hr>
                @endforeach
                <button type="button" class="btn btn-success float-right" wire:click="save"><i class="fa fa-save"></i> Save</button>
            </form>
        </div>
    </div>
</div>

@push('javascript')
    <script>
        $('#vendor_id').on('change', (e) => window.livewire.emit('vendorSelected', e.target.value));
    </script>
@endpush
