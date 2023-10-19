<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeController extends Controller
{
    public function qrCodePage()
    {
        $company = auth()->user()->company;

        $companyType = request('company_type', 'cafe');

        return view('admin.qr-code', [
            'company' => $company,
            'companyType' => $companyType,
        ]);
    }

    public function cafeQrCodeImage()
    {
        $company = auth()->user()->company;

        $companyType = request('company_type', 'cafe');

        $cafeLink = route($companyType . '.links-page', $company->slug);

        return response(QrCode::encoding('UTF-8')->format('png')->size(400)->generate($cafeLink))->header('Content-Type', 'image/png');

    }

    public function menuQrCodeImage()
    {
        $company = auth()->user()->company;

        $menuLink = route('cafe.menu', $company->slug);

        return response(QrCode::encoding('UTF-8')->format('png')->size(400)->generate($menuLink))->header('Content-Type', 'image/png');
    }
}
