<?php

namespace Modules\Order\Http\Controllers\Client\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Order\Entities\Order;
use Modules\Order\Entities\OrderProduct;
use Modules\Order\Entities\OrderProductAttribute;
use Modules\Order\Entities\OrderProductAttributeChoices;
use Modules\Order\Http\Resources\OrderResourceCollection;
use Modules\Product\Entities\Product;
use Modules\Product\Entities\ProductAttributeChoise;

class   OrderController extends Controller
{

    public function index(): OrderResourceCollection
    {
        return new OrderResourceCollection(auth()->user()->orders()->with('products.pivot.orderProductAttribute')->orderBy('id', 'desc')->paginate(10));
    }

    public function store(Request $request)
    {
        $request->validate([
            'area_id' => ['required', 'exists:areas,id'],
            'branch_id' => ['required', 'exists:branches,id'],
            'products' => ['required', 'array'],
        ]);
        $order = auth()->user()->orders()->create($request->all());

        if ($request['products']) {

            $order->products()->sync([]);
            foreach ($request['products'] as $productIndex => $product) {
                $p = Product::find($product['id']);
                $orderProduct = OrderProduct::create([
                    'order_id' => $order['id'],
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
        return new OrderResourceCollection(collect($order->load('products.pivot.orderProductAttribute')));
    }

    public function show(Order $order): OrderResourceCollection
    {
        return new OrderResourceCollection(collect($order->load('products.pivot.orderProductAttribute')));
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return response()->noContent()->setStatusCode(Response::HTTP_NO_CONTENT);
    }

}
