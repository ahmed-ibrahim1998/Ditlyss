<?php

namespace App\Observers;

use Modules\Product\Entities\Product;


class ProductObserver
{
    /**
     * Handle the Product "created" event.
     *
     * @param  \Modules\Product\Entities\Product  $product
     * @return void
     */
    public function created(Product $product)
    {
        //
    }

    /**
     * Handle the Product "updated" event.
     *
     * @param  \Modules\Product\Entities\Product  $product
     * @return void
     */
    public function updated(Product $product)
    {
        //
    }

    /**
     * Handle the Product "deleted" event.
     *
     * @param  \Modules\Product\Entities\Product  $product
     * @return void
     */
    public function deleted(Product $product)
    {
        //
    }

    /**
     * Handle the Product "restored" event.
     *
     * @param  \Modules\Product\Entities\Product  $product
     * @return void
     */
    public function restored(Product $product)
    {
        //
    }

    /**
     * Handle the Product "force deleted" event.
     *
     * @param  \Modules\Product\Entities\Product  $product
     * @return void
     */
    public function forceDeleted(Product $product)
    {
        //
    }
}
