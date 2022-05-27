<div>

    <x-admin::input-select :oldValue="$order->area_id" model="order.area_id" name="area_id" label="Area" :options="\Modules\Locations\Entities\Area::all()" optionsValueField="id" optionsDisplayField="name"></x-admin::input-select>
    <x-admin::input-select :oldValue="$order->client_id" model="order.client_id" name="client_id" label="Customer" :options="\App\Models\User::whereIs('client')->get()" optionsValueField="id" optionsDisplayField="name"></x-admin::input-select>
    <x-admin::input-select :oldValue="$order->driver_id" model="order.driver_id" name="driver_id" label="Driver" :options="\App\Models\User::whereIs('driver')->get()" optionsValueField="id" optionsDisplayField="name"></x-admin::input-select>
    <x-admin::input-select name="vendor_id" label="Vendor" :options="\Modules\Vendor\Entities\Vendor::all()" optionsValueField="id" optionsDisplayField="name"></x-admin::input-select>
    <x-admin::input-select :oldValue="$order->Branch_id" model="order.Branch_id" name="branch_id" label="Branch" :options="\Modules\Vendor\Entities\Branch::all()" optionsValueField="id" optionsDisplayField="name"></x-admin::input-select>
    <x-admin::input-select :oldValue="$order->status_id" model="order.status_id" name="status_id" label="Status" :options="\Modules\Order\Entities\OrderStatus::all()" optionsValueField="id" optionsDisplayField="name"></x-admin::input-select>
    <x-admin::input-text model="order.address" name="address" label="Address"></x-admin::input-text>

    <x-admin::input-number model="order.subtotal" name="subtotal" label="Subtotal"></x-admin::input-number>
    <x-admin::input-number model="order.delivery_fees" name="delivery_fees" label="Delivery Fees"></x-admin::input-number>
    <x-admin::input-number model="order.discount" name="discount" label="Discount"></x-admin::input-number>
    <x-admin::input-number model="order.total" name="total" label="Total"></x-admin::input-number>

    <x-admin::input-datapicker model="order.prepared_at" name="prepared_at" label="Prepared at"></x-admin::input-datapicker>
    <x-admin::input-datapicker model="order.handed_at" name="handed_at" label="Handed at"></x-admin::input-datapicker>
    <x-admin::input-datapicker model="order.delivered_at" name="delivered_at" label="Delivered at"></x-admin::input-datapicker>
    <x-admin::input-text model="order.payment_url" name="payment_url" label="Payment Url"></x-admin::input-text>
    <hr>
    <div class="card">
        <div class="card-header">
            <div class="card-title d-flex w-100">
                <h4 class="text-capitalize">product</h4>
                <button title="Add Product" wire:click="addProduct" class="btn btn-info ml-auto"><i class="fa fa-plus"></i></button>
            </div>
        </div>
        <div class="card-body">
            @foreach($products as $productIndex=>$product)
                <div class="row">
                    <div class="col d-flex">
                        <x-admin::input-select-no-select2 model="products.{{$productIndex}}.id"
                                                          mergeContainerStyle="width:90%" :options="$selectFromProducts"
                                                          label="Choice a Product: "
                                                          optionsDisplayField="name" optionsValueField="id" name="product-{{$productIndex}}"></x-admin::input-select-no-select2>
                        <x-admin::input-number classes="ml-3" name="qty-{{$productIndex}}" label="Qty" model="products.{{$productIndex}}.qty"></x-admin::input-number>
                        <button wire:click="addAttribute({{$productIndex}})" title="Add Attribute" type="button" class="btn btn-info align-self-center m-2"><i class="fa fa-plus"></i></button>
                        <button wire:click="removeProduct({{$productIndex}})" title="Remove Product" type="button" class="btn btn-danger align-self-center m-2"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                @foreach($product['attributes'] as $attributeIndex=>$attribute)
                    <div class="row">
                        <div class="col d-flex">
                            <x-admin::input-select-no-select2
                                :options="\Modules\Product\Entities\Product::find($product['id'])->productAttributes"
                                optionsDisplayField="name"
                                id="attribute-{{$productIndex}}-{{$attributeIndex}}"
                                optionsValueField="id" label="Choice attribute"
                                name="attribute-{{$attributeIndex}}" model="products.{{$productIndex}}.attributes.{{$attributeIndex}}.id"></x-admin::input-select-no-select2>
                            <button type="button" class="align-self-center m-2 btn btn-danger" wire:click="removeAttribute({{$productIndex}},{{$attributeIndex}})"><i class="fa fa-minus"></i></button>
                        </div>
                        @if($at = \Modules\Product\Entities\ProductAttribute::find($attribute['id']))
                            @foreach($attribute['id'] ? \Modules\Product\Entities\ProductAttribute::find($attribute['id'])->choices:[] as $choiceIndex=>$choice)
                                @if($at->type==='single')
                                    <div class="col align-self-center">
                                        <div class="form-check form-check-custom form-check-solid">
                                            <input wire:model="products.{{$productIndex}}.attributes.{{$attributeIndex}}.choice" class="form-check-input" type="radio" value="{{$choice['id']}}" id="choice-{{$attributeIndex}}-{{$choiceIndex}}"/>
                                            <label class="form-check-label" for="choice-{{$choiceIndex}}">
                                                {{$choice['name']}}
                                            </label>
                                        </div>
                                    </div>
                                @else
                                    <div class="col align-self-center">
                                        <div class="form-check form-check-custom form-check-solid">
                                            <input wire:model="products.{{$productIndex}}.attributes.{{$attributeIndex}}.choice" class="form-check-input" type="checkbox" value="{{$choice['id']}}" id="choice-{{$attributeIndex}}-{{$choiceIndex}}"/>
                                            <label class="form-check-label" for="choice-{{$choiceIndex}}">
                                                {{$choice['name']}}
                                            </label>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    </div>
                @endforeach
                <hr>
            @endforeach
        </div>
    </div>

    <div class="row">
        <div class="col">
            <button type="button" class="btn btn-primary float-right" wire:click="save">Save</button>
        </div>
    </div>

</div>

@push('javascript')
    <script>
        $(document).ready(function () {
            $('#area_id').on('change', (e) => livewire.emit('areaSelected', e.target.value));
            $('#client_id').on('change', (e) => livewire.emit('clientSelected', e.target.value));
            $('#driver_id').on('change', (e) => livewire.emit('driverSelected', e.target.value));
            $('#branch_id').on('change', (e) => livewire.emit('branchSelected', e.target.value));
            $('#status_id').on('change', (e) => livewire.emit('statusSelected', e.target.value));
            $('#prepared_at').on('apply.daterangepicker', (e) => livewire.emit('preparedAtChanged', e.target.value));
            $('#handed_at').on('apply.daterangepicker', (e) => livewire.emit('handedAtChanged', e.target.value));
            $('#delivered_at').on('apply.daterangepicker', (e) => livewire.emit('deliveredAtChanged', e.target.value));
            $('#vendor_id').on('change', (e) => window.livewire.emit('vendorSelected', e.target.value));

            @if($order->exists)
            window.livewire.emit('vendorSelected', {{$order->load('branch.vendor')->branch->vendor->id}})
            @endif
            window.livewire.on('sendingBranches', (branches) => {
                $('#branch_id').empty();
                for (const branch in branches) {
                    let newOption = new Option(branches[branch], branch, false, false);
                    $('#branch_id').append(newOption).trigger('change');
                }
            })

            window.livewire.on('productNotSelected', function ($data) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'error',
                    title: 'No Product Selected'
                })
            });

            window.livewire.on('branchNotSelected', function ($data) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'error',
                    title: 'No Branch Selected'
                })
            });
        });
    </script>
@endpush
