<?php

namespace Modules\Client\Http\Controllers\API;

use App\Models\User;
use Illuminate\Routing\Controller;
use Modules\Client\Http\Requests\API\UpdateClientRequest;

class ClientController extends Controller
{

    public function index()
    {
        $client = User::paginate(10);
        return $client;

    }

    public function show(User $client)
    {
        return $client;
    }

    public function update(UpdateClientRequest $request, User $client)
    {
        $client->update($request->all());

        return $client;
    }

    public function destroy(User $client)
    {
        $client->delete();
        return $client;
    }

    public function getAuthUser()
    {
        return Auth()->user();
    }
}
