<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeController extends Controller
{
    public function qrCodePage()
    {
        $company = auth()->user()->company;

        return view('admin.qr-code', [
            'company' => $company,
        ]);
    }

    public function cafeQrCodeImage()
    {
        $company = auth()->user()->company;

        $cafeLink = route('cafe.links-page', $company->slug);

        return response(QrCode::encoding('UTF-8')->format('png')->size(400)->generate($cafeLink))->header('Content-Type', 'image/png');

    }

    public function menuQrCodeImage()
    {
        $company = auth()->user()->company;

        $menuLink = route('cafe.menu', $company->slug);

        return response(QrCode::encoding('UTF-8')->format('png')->size(400)->generate($menuLink))->header('Content-Type', 'image/png');
    }
}
