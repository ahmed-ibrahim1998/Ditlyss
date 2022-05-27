<?php

namespace Modules\Order\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use Livewire\Component;
use Modules\Locations\Entities\Area;
use Modules\Order\Entities\Order;
use Modules\Order\Entities\OrderProduct;
use Modules\Order\Entities\OrderProductAttribute;
use Modules\Order\Entities\OrderProductAttributeChoices;
use Modules\Product\Entities\Product;
use Modules\Product\Entities\ProductAttributeChoise;
use Modules\Vendor\Entities\Branch;
use Modules\Vendor\Entities\Vendor;

class OrderCreate extends Component
{
    public Order $order;
    public ?Collection $selectFromProducts;
    public ?array $products = [];

    public function mount(Order $order): void
    {
        $this->order = $order;
        $this->selectFromProducts = collect([]);
        if ($this->order->products()->exists()) {
            foreach ($this->order->products as $product) {
                $this->products[] = [
                    'id' => $product['id'],
                    'qty' => $product->pivot->qty,
                    'attributes' => [],
                ];
                if ($product->pivot->orderProductAttribute()->exists()) {
                    foreach ($product->pivot->orderProductAttribute as $attribute) {
                        $this->products[count($this->products) - 1]['attributes'][] = [
                            'id' => $attribute['product_attribute_id'],
                            'choice' => $attribute->OrderProductAttributeChoices->pluck('product_attribute_choice_id')->toArray(),
                        ];
                    }
                }
            }
        }
    }

    protected $listeners = [
        'areaSelected',
        'clientSelected',
        'driverSelected',
        'branchSelected',
        'statusSelected',
        'preparedAtChanged',
        'handedAtChanged',
        'deliveredAtChanged',
        'vendorSelected',
    ];

    protected array $rules = [
        'order.area_id' => 'required|exists:areas,id',
        'order.client_id' => 'required|exists:users,id',
        'order.driver_id' => 'exists:users,id',
        'order.branch_id' => 'exists:branches,id',
        'order.status_id' => 'exists:order_statuses,id',
        'order.subtotal' => 'numeric',
        'order.delivery_fees' => 'numeric',
        'order.discount' => 'numeric',
        'order.total' => 'numeric',
        'order.prepared_at' => 'nullable',
        'order.handed_at' => 'nullable',
        'order.delivered_at' => 'nullable',
        'order.payment_url' => 'required',
    ];


    public function addProduct(): void
    {
        if ($this->order->branch_id)
            $this->products[] = [
                'id' => '',
                'qty' => 1,
                'attributes' => []
            ];
        else {
            $this->emit('branchNotSelected');
        }
    }

    public function removeProduct($index): void
    {
        array_splice($this->products, $index, 1);
    }

    public function addAttribute($index): void
    {
        if ($this->products[$index]['id']) {
            $this->products[$index]['attributes'][] = [
                'id' => null,
                'choice' => [],
            ];
        } else {
            $this->emit('productNotSelected');
        }
    }

    public function removeAttribute($proIndex, $attrIndex): void
    {
        array_splice($this->products[$proIndex]['attributes'], $attrIndex, 1);
    }

    public function areaSelected($item): void
    {
        $this->order->area_id = $item ?? null;
    }

    public function clientSelected($item): void
    {
        $this->order->client_id = $item ?? null;
    }

    public function driverSelected($item): void
    {
        $this->order->driver_id = $item ?? null;
    }

    public function vendorSelected($item): void
    {
        $branches = Vendor::find($item)->branches->pluck('name', 'id');
        $this->emit('sendingBranches', $branches);
    }

    public function branchSelected($item): void
    {
        $this->order->branch_id = $item ?? null;
        $this->selectFromProducts = $this->order->exists ? $this->order->load('branch.products')->branch->products : Branch::with('products')->find($item)->products;
    }

    public function statusSelected($item): void
    {
        $this->order->status_id = $item ?? null;
    }

    public function preparedAtChanged($item): void
    {
        $this->order->prepared_at = $item ? Carbon::parse($item)->format('Y-m-d H:i') : null;
    }

    public function handedAtChanged($item): void
    {
        $this->order->handed_at = $item ? Carbon::parse($item)->format('Y-m-d H:i') : null;
    }

    public function deliveredAtChanged($item): void
    {
        $this->order->delivered_at = $item ? Carbon::parse($item)->format('Y-m-d H:i') : null;
    }


    public function save()
    {
        $this->validate();
        $this->order->save();
        if ($this->products) {
            $this->order->products()->sync([]);
            foreach ($this->products as $productIndex => $product) {
                $p = Product::find($product['id']);
                $orderProduct = OrderProduct::create([
                    'order_id' => $this->order['id'],
                    'product_id' => (int)$product['id'],
                    'qty' => $product['qty'],
                    'price' => (float)$p['price'] * (float)$product['qty'],
                ]);
                if (!empty($product['attributes'])) {
                    foreach ($product['attributes'] as $attribute) {
                        $orderProductAttribute = OrderProductAttribute::create([
                            'order_product_id' => $orderProduct['id'],
                            'product_attribute_id' => $attribute['id'],
                        ]);
                        if (!empty($attribute['choice'])) {
                            foreach ((array)$attribute['choice'] as $ch) {
                                $choice = ProductAttributeChoise::find($ch);
                                OrderProductAttributeChoices::create([
                                    'order_product_attribute_id' => $orderProductAttribute['id'],
                                    'product_attribute_choice_id' => $choice['id'],
                                    'price' => $choice['additional_price']
                                ]);
                            }
                        }
                    }
                }
            }
        }
        toast(trans('order::messages.created-successfully'), 'success');
        return redirect()->route('order.index');
    }

    public function render()
    {

        return view('order::livewire.order-create');
    }
}
