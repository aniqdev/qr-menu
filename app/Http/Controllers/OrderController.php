<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Payments\MonobankPaymentService;

class OrderController extends Controller
{
    public function orders()
    {
    	

    	return view('admin.payments.orders');
    }
}
