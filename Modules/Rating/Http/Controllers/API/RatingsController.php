<?php

namespace Modules\Rating\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Order\Entities\Order;

class RatingsController extends Controller
{
    public function ratables(Request $request)
    {
        return $request['type']::all();
    }
}
