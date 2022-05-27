<?php

namespace Modules\Coupon\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Coupon\Entities\Coupon;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Contracts\Support\Renderable;
use Modules\Coupon\Http\Requests\StoreCouponRequest;
use Modules\Coupon\Http\Requests\UpdateCouponRequest;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $coupons = Coupon::paginate(10);
        return view('coupon::index', compact('coupons'));
    }

    public function create()
    {
        $languages = Language::all();
        return view('coupon::create', compact('languages'));
    }

    public function store(StoreCouponRequest $request)
    {
        Coupon::create($request->all());
        toast(__('coupon::messages.created-successfully'), 'success')->autoClose(1000);
        return redirect()->route('coupons.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('coupon::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $coupon = Coupon::findOrFail($id);
        $languages = Language::all();
        return view('coupon::create', compact('coupon', 'languages'));
    }

    public function update(UpdateCouponRequest $request, Coupon $coupon)
    {
        $coupon->update($request->all());
        toast(__('coupon::messages.updated-successfully'), 'success')->autoClose(1000);
        return redirect()->route('coupons.index');
    }

    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        toast(__('coupon::messages.deleted-successfully'), 'success')->autoClose(1000);
        return back();
    }
}
