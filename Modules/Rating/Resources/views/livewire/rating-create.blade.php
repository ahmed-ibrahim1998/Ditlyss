<div class="row">
    <div class="col">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">

                            <div class="mb-5" x-data>
                                <label class="form-label">Order: </label>
                                <select class="form-control form-control-solid" x-on:change="$wire.selectOrder($event.target.value)">
                                    <option value=""></option>
                                    @foreach($orders as $option)
                                        <option value="{{$option['id']}}">{{$option['id']}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-5" x-data>
                                <label class="form-label">User: </label>
                                <select class="form-control form-control-solid" wire:model="user_id">
                                    @foreach($users as $user)
                                        <option value="{{$user['id']}}">{{$user['name']}}</option>
                                    @endforeach
                                </select>
                            </div>

                            @if($order)
                                <div class="border border-2 p-5 mb-5">
                                    <div class="mb-5">
                                        <lable class="form-label" for="packaging">{{__('rating::menu.packaging')}}</lable>
                                        <input wire:model="packaging" class="form-control form-control-solid" type="number" name="packaging" id="packaging" max="5" min="0" placeholder="Please enter a number between 0 to 5 ">
                                    </div>

                                    <div class="mb-5">
                                        <lable class="form-label" for="packaging">{{__('rating::menu.delivery_time')}}</lable>
                                        <input wire:model="delivery_time" class="form-control form-control-solid" type="number" name="delivery_time" id="delivery_time" max="5" min="0" placeholder="Please enter a number between 0 to 5 ">
                                    </div>

                                    <div class="mb-5">
                                        <lable class="form-label" for="packaging">{{__('rating::menu.value_against_price')}}</lable>
                                        <input wire:model="value_for_price" class="form-control form-control-solid" type="number" name="value_for_price" step="0.1" id="value_for_price" max="5" min="0" placeholder="Please enter a number between 0 to 5 ">
                                    </div>
                                </div>
                            @endif
                            @if($products)
                                <div class="border p-5 border-2 mb-5">
                                    @foreach($products as $index=>$product)
                                        <div class="mb-5 input-group align-items-center ">
                                            <lable class="form-label text-capitalize mr-2">{{$product->getTranslatedField('name')}}</lable>
                                            <input wire:model="ratings.{{$product->id}}" class="form-control form-control-solid" type="number" step="0.1" max="5" min="0" placeholder="Please enter a number between 0 to 5 ">
                                        </div>
                                    @endforeach
                                </div>
                            @endif

                            @if($order)
                                <div class="border-2 p-5 border mb-5">
                                    <div class="mb-5 input-group align-items-center ">
                                        <lable class="form-label text-capitalize mr-2">{{__('rating::menu.driver_rating')}}</lable>
                                        <input wire:model="driver_rating" class="form-control form-control-solid" type="number" step="0.1" max="5" min="0" placeholder="Please enter a number between 0 to 5 ">
                                    </div>
                                </div>
                            @endif
                            <div class="row">
                                <div class="col">
                                    <button wire:click="saveRatings" class="btn btn-primary float-right">{{__('rating::menu.save')}}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
