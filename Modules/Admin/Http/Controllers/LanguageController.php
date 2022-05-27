<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;

class LanguageController extends Controller
{
    public function setLang(\Request $request, string $language)
    {
        if (array_key_exists($language, config('admin.languages'))) {
            session()->put('app-locale', $language);
            app()->setLocale($language);
        }
        return redirect()->back();
    }
}
