<?php

namespace App\Http\Controllers\Front;

use App\Models\Course;
use App\Models\Cart;
use App\Models\Setting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{ 
    public function add_course(Request $request) {
        $course_id = $request->input('course_id');
        
        if (Auth::check()) {
            $course_check = Course::where('id',$course_id)->where('status','1')->first();

            if ($course_check) {
                if (Cart::where('course_id',$course_id)->where('user_id',Auth::id())->exists()) {
                    return response()->json(['status' => $course_check->name.' Already Added to Cart']);
                } else {
                    $cartItem = new Cart;
                    $cartItem->course_id = $course_id;
                    $cartItem->user_id = Auth::id();
                    $cartItem->course_qty = 1;
                    $cartItem->save();

                    return response()->json(['status' => $course_check->name.' Added to Cart']);
                }
            }
        } else {
            return response()->json(['status' => 'Login to Continue']);
        }
    }

    public function view_cart() {
        $settings = Setting::find(1);
        $cart_count = Cart::count();
        $cartItems = Cart::where('user_id',Auth::id())->get();
        return view('front.cart', compact('cartItems','cart_count','settings'));
    }
}
