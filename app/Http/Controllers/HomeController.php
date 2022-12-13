<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\MidtransController;

class HomeController extends Controller
{
    public function bayar()
    {
        $token = MidtransController::config();
        return $token;
    }

    public function index()
    {
        $terbaru = Produk::latest()->limit(3)->get();
        
        return view('home', compact('terbaru'));
    }

    public function detail($id)
    {
        $produk = Produk::where('uuid', $id)->first();

        return view('detail', compact('produk'));
    }
}
