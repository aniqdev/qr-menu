<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    public function monobankReturnUrl(Request $request)
    {
        echo json_encode([
            'method' => $request->method(),
            'headers' => $request->header(),
            'request' => $request->all(),
        ]);
    }

    public function monobankWebHook(Request $request)
    {
        telegram_bot([
            'method' => $request->method(),
            'headers' => $request->header(),
            'request' => $request->all(),
        ]);
    }

    public function checkout()
    {
        $link = MonobankPaymentService::getPaymentLink();

        return redirect($link);
    }
}
