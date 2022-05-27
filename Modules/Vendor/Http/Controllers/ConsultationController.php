<?php

namespace Modules\Vendor\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Vendor\Entities\Consultation;
use Yajra\DataTables\Facades\DataTables;

class ConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        if (\request()->ajax()) {
            return DataTables::of(Consultation::with('user')->orderBy('id', 'desc'))
                ->editColumn('user_id', function ($consultation) {
                    return $consultation->user->name ;
                })->editColumn('age', function ($consultation) {
                    return $consultation->age ?? '';
                })->editColumn('weight', function ($consultation) {
                    return $consultation->weight ?? '';
                })->editColumn('height', function ($consultation) {
                    return $consultation->height ?? '';
                })->editColumn('gender', function ($consultation) {
                    return $consultation->gender ?? '';
                })->editColumn('physical_activity', function ($consultation) {
                    return $consultation->physical_activity ?? '';
                })->editColumn('additional_notes', function ($consultation) {
                    return $consultation->additional_notes ?? '';
                })->addColumn('actions', function ($consultation) {
                    return '<div class="d-flex">' .
                        '<a class="btn btn-primary mr-1" href="' . route('consultation.show', $consultation) . '"><i class="fa fa-eye"></i></a>' .
                        '<a class="btn btn-info mr-1" href="' . route('consultation.edit', $consultation) . '"><i class="fa fa-edit"></i></a>' .
                        '<form method="POST" onsubmit="deleteConsultation(event)" action="' . route('consultation.destroy', $consultation) . '">' . '<input name="_token" type="hidden" value="' . csrf_token() . '"> <input name="_method" type="hidden" value="DELETE"> <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button></form>' .
                        '</div>';
                })->rawColumns(['actions'])->make(true);
            //rawColumns for html
        }

        return view('vendor::consultation.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('vendor::consultation.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'age' => 'required',
            'gender' => 'required',
            'height' => 'required',
            'weight' => 'required',
            'physical_activity' => 'required',
            'additional_notes' => 'required'
        ]);

        Consultation::create($request->all());

        toast(trans('vendor::messages.created-successfully'), 'success');

        return redirect()->route('consultation.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(Consultation $consultation)
    {
        return view('vendor::consultation.show', compact('consultation'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Consultation $consultation)
    {
        return view('vendor::consultation.edit', compact('consultation'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, Consultation $consultation)
    {
        $request->validate([
            'age' => 'required',
            'gender' => 'required',
            'height' => 'required',
            'weight' => 'required',
            'physical_activity' => 'required',
            'additional_notes' => 'required'
        ]);
        $consultation->update($request->all());

        toast(__('vendor::messages.updated-successfully'), 'success');
        return redirect()->route('consultation.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Consultation $consultation)
    {
        $consultation->delete();
        toast(__('vendor::messages.deleted-successfully'), 'success');
        return back();
    }
}
