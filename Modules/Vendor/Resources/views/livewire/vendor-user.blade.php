<div>
    <div class="card">
        <div class="card-header">
            <div class="card-title text-capitalize justify-content-between w-100">
                <h5>Adding Vendor Users</h5>
                <button type="button" class="btn btn-primary ml-auto" wire:click="addNewUser"><i class="fa fa-plus"></i></button>
            </div>
        </div>
        <div class="card-body">

        </div>
    </div>
    @foreach($users as $index=>$user)
        <div class="row">
            <div class="col">
                <div class="form-group mb-5">
                    <label for="users">User: </label>
                    <select wire:model="users.{{$index}}.user_id" class="form-select form-select-lg form-select-solid" data-placeholder="Select an option" data-allow-clear="true" name="users[]">
                        <option></option>
                        @foreach(\App\Models\User::all() as $item)
                            <option value="{{ $item['id']}}" {{$item['id']===old('vendor_id') ? 'selected':''}}>{{ $item->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="form-group mb-5">
                    <label for="users">Branch: </label>
                    <select wire:model="users.{{$index}}.branch_id" class="form-select form-select-lg form-select-solid" data-placeholder="Select an option" data-allow-clear="true" name="branches[]">
                        <option></option>
                        @foreach(\Modules\Vendor\Entities\Branch::all() as $item)
                            <option value="{{ $item['id']}}" {{$item['id']===old('vendor_id') ? 'selected':''}}>{{ $item->name}}</option>
                        @endforeach
                    </select>
                </div>

            </div>
            <div class="col-1 align-self-center">
                <button class="btn btn-danger" type="button" wire:click="removeUser({{$index}})"><i class="fa fa-minus"></i></button>
            </div>
        </div>
    @endforeach
    <hr>
</div>
