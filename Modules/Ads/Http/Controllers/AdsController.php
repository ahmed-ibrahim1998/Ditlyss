<?php

namespace Modules\Ads\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Ads\Entities\Ad;
use Modules\Ads\Http\Requests\AdsRequest;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $ads = Ad::all();
        return view('ads::ads.index',compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('ads::ads.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(AdsRequest $request)
    {
        //
        $ad = new Ad();

        if($request->is_active)
            $ad->is_active = 1;
        else
            $ad->is_active = 0;

        if($request->is_photo)
            $ad->is_photo = 1;
        else
            $ad->is_photo =0;

        $ad->name = $request->name;
        $ad->video_url = $request->video_url;
        $ad->url = $request->url;
        $ad->position = $request->position;
        $ad->location = $request->location;
        $ad->priority = $request->priority;
        $ad->link_id = $request->link_id;
        $ad->link_model = $request->link_model;

        if($file = $request->file('photo')){
            $name =str_replace(' ' , '_' ,time() . '_' . $file->getClientOriginalName()) ;
            $file->move('media/images/ads', $name);
            $ad->photo = $name;
        }

        $ad->save();

        return redirect()->route('ads.index');

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('ads::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $ad = Ad::find($id);
        return view('ads::ads.edit', compact('ad'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(AdsRequest $request, $id)
    {
        //
        $ad = Ad::find($id);

        if($request->is_active)
            $ad->is_active = 1;
        else
            $ad->is_active = 0;

        if($request->is_photo)
            $ad->is_photo = 1;
        else
            $ad->is_photo =0;

        $ad->name = $request->name;
        $ad->video_url = $request->video_url;
        $ad->url = $request->url;
        $ad->position = $request->position;
        $ad->location = $request->location;
        $ad->priority = $request->priority;
        $ad->link_id = $request->link_id;
        $ad->link_model = $request->link_model;

        if($file = $request->file('photo')){
            $name =str_replace(' ' , '_' ,time() . '_' . $file->getClientOriginalName()) ;
            $file->move('media/images/ads', $name);
            $ad->photo = $name;
        }

        $ad->save();

        return redirect()->route('ads.edit' , $id);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
