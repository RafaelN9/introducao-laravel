<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IdiomaController extends Controller {
    public function setLocale(Request $request) {
        $locale = $request->input('locale');
        if (in_array($locale, ['en', 'pt'])) {
            app()->setLocale($locale);
            session()->put('locale', $locale);
        }
        return back();
    }
}
