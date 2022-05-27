<div>
    <div class="card">
        <div class="card-header">
            <div class="card-title text-capitalize">
                Adding delivery areas
            </div>
        </div>
        <div class="card-body">

        </div>
    </div>
    <button type="button" class="btn btn-primary" wire:click="addNewBranch"><i class="fa fa-plus"></i></button>
    @foreach($areas as $index=>$branch)
        <div class="row">
            <div class="col">
                <div class="form-group mb-5">
                    <label for="users">Area: </label>
                    <select wire:model="areas.{{$index}}.area_id" class="form-select form-select-lg form-select-solid" data-placeholder="Select an option" data-allow-clear="true" name="areas[]">
                        <option></option>
                        @foreach(\Modules\Locations\Entities\Area::all() as $item)
                            <option value="{{ $item['id']}}" {{$item['id']===old('vendor_id') ? 'selected':''}}>{{ $item->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="form-group mb-5">
                    <label for="users">Min charge: </label>
                    <input type="number" step="0.1" class="form-control-solid form-control" name="min_charge[]" wire:model="areas.{{$index}}.min_charge">
                </div>
            </div>
            <div class="col">
                <div class="form-group mb-5">
                    <label class="text-capitalize">Delivery fees: </label>
                    <input type="number" step="0.1" class="form-control-solid form-control" name="delivery_fees[]" wire:model="areas.{{$index}}.delivery_fees">
                </div>
            </div>
            <div class="col-1 align-self-center">
                <button class="btn btn-danger" type="button" wire:click="removeBranch({{$index}})"><i class="fa fa-minus"></i></button>
            </div>
        </div>
    @endforeach
</div>
