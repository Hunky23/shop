<?php

namespace App\Http\Controllers;

use App\Http\Model\Shipping;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ShippingController extends Controller
{
    public function index(): View
    {
        return view('shipping');
    }

    public function costCalculation(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'packageWeight' => 'required|numeric|min:1',
            'shippingMethod' => 'required|string',
        ]);

        if (! $validator->passes()) {
            return response()->json([
                'message' => 'Форма заполнена неверно!'
            ], 422);
        }

        $validateData = $validator->getData();

        $shippingMethod = new Shipping(
            $validateData['packageWeight'],
            $validateData['shippingMethod']
        );

        return response()->json([
            'shippingPrice' => $shippingMethod->getPrice() . 'р.'
        ]);
    }
}
