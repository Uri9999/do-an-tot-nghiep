<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Transfer;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Stripe\Stripe;
use Illuminate\Support\Facades\Session;
use App\Models\Coupon;
use Carbon\Carbon;

class ProductController extends Controller
{
    public function getDetail(Request $request, $id)
    {
        try {
            $product = Product::find($id);
            $specialProducts = Product::where('category_id', $product->category_id)
                ->where('id', '!=', $product->id)
                ->get()->random(3);
            return view('user-.detail')
                ->with('product', $product)
                ->with('specialProducts', $specialProducts);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }

    public function getCart(Request $request)
    {
        $cart = Cart::with('product')
            ->where('user_id', Auth::id())
            ->where('status', Cart::UN_PAID)
            ->get();
        return view('user-.cart')->with('cart', $cart);
    }

    public function addCart(Request $request)
    {
        $product = Product::find($request->productId);
        Cart::firstOrCreate(
            [
                'user_id' => Auth::id(),
                'product_id' => $product->id,
                'status' => Cart::UN_PAID
            ],
            [
                'user_id' => Auth::id(),
                'product_id' => $product->id,
                'total_price' => $request->quantity_detail * $product->prod_price,
                'quantity' => $request->quantity_detail,
                'product_price' => $product->prod_price,
                'product_img' => $product->prod_img,
                'product_name' => $product->prod_name,
            ]
        );
        return redirect()->route('userGetCart');
    }

    public function removeCartProduct(Request $request, $id)
    {
        Cart::destroy($id);
        $cart = Cart::with('product')
            ->where('user_id', Auth::id())->get();
        return redirect()->back()->with('cart', $cart);
    }

    public function updateCart(Request $request)
    {
        try {
            if ($request->ajax()) {
                $cart = Cart::with('product')->where('id', $request['data']['cartId'])->first();
                Cart::where('id', $request['data']['cartId'])
                    ->update([
                        'quantity' => $request['data']['quantity'],
                        'total_price' => $request['data']['quantity'] * $cart->product->prod_price
                    ]);
                return response()->json([
                    'data' => [
                        'cart' => $cart,
                    ],
                    'status' => Response::HTTP_OK
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }

    public function getCheckout(Request $request)
    {
        $discountCode = $request->discount_code;
        $specialProducts = Product::all()->random(3);
        return view('user-.checkout')->with('specialProducts', $specialProducts)
            ->with('discountCode', $discountCode);
    }

    public function checkout(Request $request)
    {
        try {
            // dd($request->all());
            $stripe = new \Stripe\StripeClient(
                env('PRIVATE_KEY_STRIPE')
            );
            $amount = Cart::where('user_id', Auth::id())
            ->where('status', Cart::UN_PAID)
            ->sum('total_price');
            if (isset($request->coupon_code)) {
                $coupon = Coupon::whereDate('expired_date', '>=', Carbon::now())
                    ->where('quantity', '>', 0)
                    ->where('coupon_code', $request->coupon_code)
                    ->first();
                if (isset($coupon)) {
                    $actualAmount = $amount - ($amount * $coupon->coupon_value) / 100;
                }
            }
            $token = $stripe->tokens->create([
                'card' => [
                    'number' => $request->number_card,
                    'exp_month' => $request->mm_card,
                    'exp_year' => $request->year_card,
                    'cvc' => $request->cvc_card,
                ],
            ]);

            $stripe->charges->create([
                'amount' => ($actualAmount ?? $amount) * 100,
                'currency' => 'usd',
                'source' => $token->id,
                'description' => Auth::user()->email,
            ]);

            $transfer = Transfer::create([
                'total_price' => $amount,
                'charge_token' => 'asdfwef',
                'user_id' => Auth::id(),
                'coupon_code' => isset($coupon) ? $coupon->coupon_code : null,
                'coupon_type' => isset($coupon) ? $coupon->type : null,
                'coupon_value' => isset($coupon) ? $coupon->coupon_value : null,
                'actual_price' => $actualAmount ?? $amount 
            ]);

            Cart::where('user_id', Auth::id())
                ->where('status', Cart::UN_PAID)
                ->update([
                    'status' => Cart::PAID,
                    'transfer_id' => $transfer->id
                ]);

            dd('success');
            return view('user-.getHomeIndex');
        } catch (\Throwable $th) {
            Session::flash('message', $th->getMessage());
            return redirect()->back();
        }
    }

    public function getCoupon(Request $request, $code)
    {
        try {
            if ($request->ajax()) {
                $coupon = Coupon::whereDate('expired_date', '>=', Carbon::now())
                    ->where('quantity', '>', 0)
                    ->where('coupon_code', $code)
                    ->firstOrFail();
                return response()->json([
                    'data' => [
                        'coupon' => $coupon,
                    ],
                    'status' => Response::HTTP_OK
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }
}
