<?php


namespace App\Services\Payments;




class MonobankPaymentService
{
    public static function getPaymentLink()
    {
    	$order = (object)[
    		'id' => 555,
    		'price' => 777,
    	];

        $items = [];

        $items[] = [
            "name"=> 'Qr-Menu Premium',
            "qty"=> 3,
            "sum"=> 370 * 100,
            "icon"=> "https://kartinkof.club/uploads/posts/2022-04/1649993997_1-kartinkof-club-p-sonya-kartinki-prikolnie-1.jpg",
            "unit"=> 'month',
        ];

        if (config('app.env') === 'local') {
        	$app_env = 'local';
        	$webHookUrl = 'https://qr-menu.space/mono/webHook';
        	$token = config('app.monobank_test_token');
        }else{
        	$app_env = 'not local';
        	$webHookUrl = route('monobank.webHook');
        	$token = config('app.monobank_token');
        }

        $response = \Http::withHeaders([
            'X-Token' => $token,
        ])->post('https://api.monobank.ua/api/merchant/invoice/create',
            [
                "amount"=> round($order->price * 100),
                "ccy"=> 980, // currency code (UAH - 980)
                "merchantPaymInfo"=> [
                    "reference"=> "$order->id",
                    "destination"=> "Покупка товарів",
                    "basketOrder"=> $items,
                ],
                "redirectUrl"=> route('monobank.returnUrl', $order->id),
                // "webHookUrl"=> "https://eo6ha77i00j3lyf.m.pipedream.net",
                "webHookUrl"=> $webHookUrl,
                "validity"=> 3600,
                "paymentType"=> "debit",
            ]);

        $body = $response->json();



        // dd($body);
        if (isset($body['invoiceId'])) {
            // $order->update([
            //     'transaction_id' => $body['invoiceId'],
            // ]);
        }

        telegram_bot([
        	'app_env' => $app_env,
            'payment_link' => $body,
        ]);

        // dd($response->getStatusCode());

        // if ($response->getStatusCode() != 200) {
        //     throw new \Exception('Payment gateway error');
        // }

        // dump($body);

        // $response->dump();
        return $body['pageUrl'] ?? null;
    }

	public static function checkSign()
	{
		$pubKeyBase64 = config('app.monobank_token');

		$xSignBase64 = request()->header('X-Sign');

		$message = request()->getContent();

		$signature = base64_decode($xSignBase64);

		$publicKey = openssl_get_publickey($pubKeyBase64);

		$result = openssl_verify($message, $signature, $publicKey, OPENSSL_ALGO_SHA256);

		return $result === 1 ? "OK" : "NOT OK";
	}
}
