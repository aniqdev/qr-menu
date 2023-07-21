<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeController extends Controller
{
    public function qrCodePage()
    {
        $company = auth()->user()->company;

        $cafeLink = route('cafe.view', $company->slug);

        $menuLink = route('cafe.menu', $company->slug);

        return view('admin.qr-code', [
            'company' => $company,
            'cafe_link' => $cafeLink,
            'menu_link' => $menuLink,
        ]);
    }

    public function cafeQrCodeImage()
    {
        $company = auth()->user()->company;

        $cafeLink = route('cafe.view', $company->slug);

        return response(QrCode::encoding('UTF-8')->format('png')->size(400)->generate($cafeLink))->header('Content-Type', 'image/png');

    }

    public function menuQrCodeImage()
    {
        $company = auth()->user()->company;

        $menuLink = route('cafe.menu', $company->slug);

        return response(QrCode::encoding('UTF-8')->format('png')->size(400)->generate($menuLink))->header('Content-Type', 'image/png');
    }
}
