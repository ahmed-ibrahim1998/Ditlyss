<?php

namespace Modules\Rating\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Rating\Entities\Rating;

class RatingController extends Controller
{

    public function index()
    {
        $ratings = Rating::all();
        return view('rating::index', compact('ratings'));
    }

    public function create()
    {
        return view('rating::create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Rating $rating)
    {
        return view('rating::show');
    }

    public function edit($id)
    {
        return view('rating::edit');
    }

    public function update(Request $request, Rating $rating)
    {
        //
    }

    public function destroy(Rating $rating)
    {
        $rating->delete();
        toast(__('rating::messages.deleted-successfully'), 'success');
        return redirect()->back();
    }
}
