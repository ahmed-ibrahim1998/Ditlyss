<?php

namespace Modules\Trainers\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Trainers\Entities\Trainer;
use Yajra\DataTables\Facades\DataTables;

class TrainersController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        if (\request()->ajax()) {
            return DataTables::of(Trainer::orderBy('id', 'desc'))
                ->editColumn('name', function ($trainer) {
                    return $trainer->name;
                })->addColumn('logo', function ($trainer) {
                    return '<div class="symbol symbol-75px"><img class="symbol-label" src="' . $trainer->getFirstMediaUrl('logo') . '"></div>';
                })->addColumn('is_active', function ($trainer) {
                    return $trainer->is_active ? '<spane class="badge badge-success">Yes</spane >' : '<spane class="badge badge-danger">No</spane>';
                })->editColumn('is_featured', function ($trainer) {
                    return $trainer->is_featured ? '<spane class="badge badge-success">Yes</spane >' : '<spane class="badge badge-danger">No</spane>';
                }) ->editColumn('specialty', function ($trainer) {
                    return $trainer->specialty;
                }) ->editColumn('definition', function ($trainer) {
                    return $trainer->definition;
                })->addColumn('actions', function ($trainer) {
                    return '<div class="d-flex">' .
                        '<a class="btn btn-primary mr-1" href="' . route('trainer.show', $trainer) . '"><i class="fa fa-eye"></i></a>' .
                        '<a class="btn btn-info mr-1" href="' . route('trainer.edit', $trainer) . '"><i class="fa fa-edit"></i></a>' .
                        '<form method="POST" onsubmit="deleteTrainer(event)" action="' . route('trainer.destroy', $trainer) . '">' . '<input name="_token" type="hidden" value="' . csrf_token() . '"> <input name="_method" type="hidden" value="DELETE"> <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button></form>' .
                        '</div>';
                })->rawColumns(['actions', 'is_featured', 'is_active', 'logo'])->make(true);
        }
        return view('trainers::trainers.index');
    }


    public function create()
    {
        return view('trainers::trainers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name.*' => 'required',
            'specialty' => 'required',
            'definition' => 'required'
        ]);
        $request['is_active'] ?? 0;
        $request['is_featured'] ?? 0;

        $trainer = Trainer::create($request->all());
        if ($request->hasFile('logo')) {
            $trainer->addMediaFromRequest('logo')->toMediaCollection('logo');
        }
        toast(__('trainers::messages.created-successfully'), 'success');
        return redirect()->route('trainer.index');
    }

    /**
     * Show the specified resource.
     * @param Trainer $vendor
     * @return Application|Factory|\Illuminate\Contracts\View\View
     */
    public function show(Trainer $trainer)
    {
        return view('trainers::trainers.show', compact('trainer'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Trainer $trainer)
    {
        return view('trainers::trainers.edit', compact('trainer'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, Trainer $trainer)
    {
        $request->validate([
            'name.*' => 'required',
            'price' => 'required',
            'specialty' => 'required',
            'definition' => 'required'
        ]);
        $request['is_active'] ?? 0;
        $request['is_featured'] ?? 0;
        $trainer->update($request->all());
        if ($request->hasFile('logo')) {
            $trainer->addMediaFromRequest('logo')->toMediaCollection('logo');
        }
        toast(__('vendor::messages.updated-successfully'), 'success');
        return redirect()->route('trainer.index');

    }

    /**
     * Remove the specified resource from storage.
     * @param ConsultationPackage $trainer
     * @return RedirectResponse
     */
    public function destroy(Trainer $trainer)
    {
        $trainer->delete();
        toast(__('vendor::messages.deleted-successfully'), 'success');
        return back();
    }
}
