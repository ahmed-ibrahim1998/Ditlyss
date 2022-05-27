<?php

namespace Modules\Product\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Modules\Product\Entities\ProductCategory;
use Modules\Product\Http\Resources\ProductCategoryCollection;

class ProductCategoryController extends Controller
{
    public function index(): ProductCategoryCollection
    {
        return new ProductCategoryCollection(ProductCategory::paginate(10));
    }


}
