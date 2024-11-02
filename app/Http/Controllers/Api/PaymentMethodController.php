<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    /**
     * All Payment Method
     */
    public function index()
    {
        $paymentMethods = PaymentMethod::all();

        return response()->json([
            'success' => true,
            'data' => $paymentMethods,
            'message' => 'Sukses menampilkan data'
        ]);
    }

}
