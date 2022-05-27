<?php

namespace Modules\Locations\Http\Controllers\Api;

use Illuminate\Routing\Controller;
use Modules\Locations\Entities\Area;
use Modules\Locations\Entities\City;
use Modules\Locations\Entities\Country;
use Modules\Locations\Transformers\Area as AreaResource;
use Modules\Locations\Transformers\City as CityResource;
use Modules\Locations\Transformers\Country as CountryResource;

class LocationsController extends Controller
{


    public function countries()
    {
        return CountryResource::collection(Country::paginate(10));
    }


    public function cities()
    {
        return CityResource::collection(City::paginate(10));
    }


    public function areas()
    {
        return AreaResource::collection(Area::paginate(10));
    }

    public function getCityAreas(City $city)
    {
        return CityResource::make($city->areas);
    }

    public function getCountryCities(Country $country)
    {
        return CountryResource::make($country->cities);
    }
}
