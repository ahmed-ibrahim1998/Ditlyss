<?php

namespace Modules\Order\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

/** @see \Modules\Order\Entities\Order */
class OrderResourceCollection extends ResourceCollection
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
