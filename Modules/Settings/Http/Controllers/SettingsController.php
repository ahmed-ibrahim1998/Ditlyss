<?php

namespace Modules\Settings\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Settings\Entities\GeneralSettings;
use RealRashid\SweetAlert\Facades\Alert;

class SettingsController extends Controller
{
    private $settings;

    public function __construct()
    {
        $this->settings = app(GeneralSettings::class);
    }

    public function index()
    {
        return view('settings::index', [
            'settings' => $this->settings
        ]);
    }

    public function update(Request $request)
    {
        foreach ($request->except('_token', '_method') as $key => $value) {
            $this->settings->$key = $value;
        }
        $this->settings->save();
        toast(__('settings::messages.updated-successfully'), 'success');
        return redirect()->back();
    }

}
