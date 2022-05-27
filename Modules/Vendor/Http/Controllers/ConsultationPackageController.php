<?php

namespace Modules\Vendor\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Vendor\Entities\ConsultationPackage;
use Yajra\DataTables\Facades\DataTables;

class ConsultationPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        if (\request()->ajax()) {
            return DataTables::of(ConsultationPackage::with('vendor')->orderBy('id', 'desc'))
                ->editColumn('name', function ($consultationPackage) {
                    return $consultationPackage->name;
                })->editColumn('vendor_id', function ($consultationPackage) {
                    return $consultationPackage->vendor->name ?? '';
                })->addColumn('actions', function ($consultationPackage) {
                    return '<div class="d-flex">' .
                        '<a class="btn btn-primary mr-1" href="' . route('consultation-package.show', $consultationPackage) . '"><i class="fa fa-eye"></i></a>' .
                        '<a class="btn btn-info mr-1" href="' . route('consultation-package.edit', $consultationPackage) . '"><i class="fa fa-edit"></i></a>' .
                        '<form method="POST" onsubmit="deleteConsultationPackage(event)" action="' . route('consultation-package.destroy', $consultationPackage) . '">' . '<input name="_token" type="hidden" value="' . csrf_token() . '"> <input name="_method" type="hidden" value="DELETE"> <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button></form>' .
                        '</div>';
                })->rawColumns(['actions'])->make(true);
            //rawColumns for html
        }

        return view('vendor::consultation_packages.index');
    }


    public function create()
    {
        return view('vendor::consultation_packages.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name.*' => 'required',
            'price' => 'required|numeric',
            'vendor_id' => 'required'
        ]);

        ConsultationPackage::create($request->all());

        toast(trans('vendor::messages.created-successfully'), 'success');

        return redirect()->route('consultation-package.index');
    }

    public function show(ConsultationPackage $consultationPackage)
    {
        return view('vendor::consultation_packages.show', compact('consultationPackage'));
    }

    public function edit(ConsultationPackage $consultationPackage)
    {
        return view('vendor::consultation_packages.edit', compact('consultationPackage'));
    }

    public function update(Request $request, ConsultationPackage $consultationPackage)
    {
        $request->validate([
            'name.*' => 'required',
            'price' => 'required|numeric',
        ]);
        $consultationPackage->update($request->all());

        toast(__('vendor::messages.updated-successfully'), 'success');
        return redirect()->route('consultation-package.index');

    }

    /**
     * Remove the specified resource from storage.
     * @param ConsultationPackage $vendor
     * @return RedirectResponse
     */
    public function destroy(ConsultationPackage $consultationPackage)
    {
        $consultationPackage->delete();
        toast(__('vendor::messages.deleted-successfully'), 'success');
        return back();
    }
}
