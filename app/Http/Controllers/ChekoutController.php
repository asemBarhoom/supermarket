<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ChekoutController extends Controller
{
    public function scan(Request $request)
    {
        $request->validate([
            'products'=>'required',
            'products.*'=>'required|exists:products,product_code',
        ]);

        $total = 0;

        foreach ($request->products as $product) {

            $qty = $request->qty[$product][0];
            $product = Product::where('product_code',$product)->first();
            $price  = $product->price;

            if ($product->product_code == Product::FR1_TYPE && $qty > 1 )
            {

                $qty = ($qty%2==0)? $qty/2 : $qty - $qty%2; // 1.	If you buy one Fruit Tea get another for free
            }

            if ($product->product_code == Product::SR1_TYPE && $qty>=3)
            {
                $price = 4.5; //2.	If you buy 3 or more Strawberry price drop for $4.5
            }

            $total += $qty*$price;
        }

        return view('product.index',['total'=>$total,'products'=>Product::get(),'selectedProducts'=>$request->products,'qty'=>$request->qty]);

    }
}
