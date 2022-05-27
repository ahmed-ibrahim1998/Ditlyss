<?php

namespace Modules\Product\Http\Controllers\API;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Product\Entities\ProductAttribute;
use Modules\Product\Entities\ProductAttributeChoise;

class ProductAttributesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function getProductAttribute()
    {
        // to get product attributes;
        return ProductAttribute::paginate(10);
    }

    public function getChoiceOfProductAttribute(ProductAttribute $productAttribute) {

      return  ProductAttributeChoise::get($productAttribute->id);

    }

}
