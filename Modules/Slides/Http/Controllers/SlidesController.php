<?php

namespace Modules\Slides\Http\Controllers;

use App\Models\Language;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Slides\Entities\Slide;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Contracts\Support\Renderable;
use Modules\Slides\Http\Requests\StoreSlidesRequest;

class SlidesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $slides = Slide::with('translates')->paginate(10);
        return view('slides::index', compact('slides'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $languages = Language::all();
        return view('slides::create-edit', compact('languages'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(StoreSlidesRequest $request)
    {
        $request['created_by'] = auth()->user()->id;
        $slide = Slide::create($request->except(['languages', 'button_text', 'description']));
        
        if($request->hasFile('photo')) {
            $slide->addMediaFromRequest('photo')->toMediaCollection('slides');
        }
        
        foreach($request->description as $description_key => $description) {
            $slide->translates()->create($description);
        }
        foreach($request->button_text as $buttonTextKey => $button_text) {
            $slide->translates()->create($button_text);
        }
        foreach($request->languages as $language => $lang) {
            $slide->translates()->create($lang);
        }

        Alert::success(__('slides::messages.created-successfully'));
        return redirect()->route('slides.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('slides::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $slide = Slide::findOrFail($id);
        $languages = Language::all();
        return view('slides::create-edit', compact('slide', 'languages'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(StoreSlidesRequest $request, $id)
    {
        $slide = Slide::findOrFail($id);
        $slide->update($request->except(['languages', 'button_text', 'description']));

        if($request->hasFile('photo')) {
            $slide->addMediaFromRequest('photo')->toMediaCollection('slides');
        }

        foreach($request->description as $description_key => $description) {
            $slide->translates()->whereLanguageId($description['language_id'])->whereKey('description')->update($request->description[$description_key]);
        }

        foreach($request->button_text as $buttonTextKey => $button_text) {
            $slide->translates()->whereLanguageId($button_text['language_id'])->whereKey('button_text')->update($request->button_text[$buttonTextKey]);
        }

        foreach($request->languages as $title_key => $title) {
            $slide->translates()->whereLanguageId($title['language_id'])->whereKey('title')->update($request->languages[$title_key]);
        }

        Alert::success(__('slides::messages.updated-successfully'));
        return redirect()->route('slides.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $slide = Slide::findOrFail($id);
        $slide->translates()->delete();
        $slide->media()->delete();
        $slide->delete();
        Alert::success(__('slides::messages.deleted-successfully'));
        return back();
    }
}
