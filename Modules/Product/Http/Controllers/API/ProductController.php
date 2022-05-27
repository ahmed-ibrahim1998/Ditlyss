<?php

namespace Modules\Product\Http\Controllers\API;

use Illuminate\Routing\Controller;
use Modules\Product\Entities\Product;
use Modules\Product\Entities\ProductCategory;
use Modules\Product\Http\Resources\ProductCollection;
use Modules\Vendor\Entities\Vendor;

class ProductController extends Controller
{


    public function index(): ProductCollection
    {
        return new ProductCollection(Product::paginate(10));
    }

    public function show(Product $product): ProductCollection
    {
        return new  ProductCollection(collect($product));
    }

    public function getCategoryProducts(ProductCategory $productCategory): ProductCollection
    {
        return new ProductCollection($productCategory->products()->paginate(10));
    }

    public function getVendorProducts(Vendor $vendor): ProductCollection
    {
        return new  ProductCollection($vendor->products()->without('productAttributes')->paginate(10));
    }


}
