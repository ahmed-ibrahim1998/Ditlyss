<?php

namespace Modules\Locations\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\Locations\Entities\Area;

class AreaController extends Controller
{
    public function index()
    {
        return Area::paginate(10);
    }
}
