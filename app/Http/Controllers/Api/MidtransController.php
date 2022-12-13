<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MidtransController extends Controller
{
    public static function config($total)
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'Mid-server-xduIC_uU514fLOQVKQdWdRva';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = true;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
        
        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $total,
            ),
            'customer_details' => array(
                'first_name' => auth()->user()->nama_depan,
                'last_name' => auth()->user()->nama_belakang,
                'email' => auth()->user()->email,
                'phone' => auth()->user()->telepon,
            ),
        );
        
        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return $snapToken;
    }
}
