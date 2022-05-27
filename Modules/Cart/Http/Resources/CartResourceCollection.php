<?php

namespace Modules\Cart\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

/** @see \Modules\Cart\Entities\Cart */
class CartResourceCollection extends ResourceCollection
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection,
        ];
    }
}
