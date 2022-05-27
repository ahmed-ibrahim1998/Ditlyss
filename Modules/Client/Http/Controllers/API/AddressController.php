<?php

namespace Modules\Client\Http\Controllers\API;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Client\Entities\ClientAddress;
use Modules\Client\Http\Requests\CreateAddressRequest;
use Modules\Client\Http\Resources\AddressCollection;
use Symfony\Component\HttpFoundation\Response;

class AddressController extends Controller
{

    public function index(): AddressCollection
    {
        return new AddressCollection(Auth::user()->addresses);
    }

    public function store(CreateAddressRequest $request): AddressCollection
    {
        return new AddressCollection(collect(Auth::user()->addresses()->create($request->all())));
    }

    public function update(\Illuminate\Http\Request $request, ClientAddress $address): AddressCollection
    {
        $address->update($request->all());
        return new  AddressCollection(collect($address));
    }

    public function destroy(ClientAddress $address)
    {
        $address->delete();
        return response(null)->setStatusCode(Response::HTTP_NO_CONTENT);
    }
}
