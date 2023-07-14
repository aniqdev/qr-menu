<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QrCodeController extends Controller
{
    public function qrCodePage()
    {
        $company = auth()->user()->company;

        $cafeLink = route('cafe.view', $company->slug);

        $menuLink = route('cafe.menu', $company->slug);

        return view('admin.qr-code', [
            'cafe_link' => $cafeLink,
            'menu_link' => $menuLink,
            'cafe_link_qr_src' => '',
            'menu_link_qr_src' => '',
        ]);
    }
}
