<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Session;
use App\Customer;
use App\Order;
use App\OrderDetail;
use App\Payment;
use App\Shipping;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    public function index(){
        return view('front-end.checkout.registration');
    }

    public function validateRegInfo($request){
        $this->validate($request, [
            'firstName' => 'required|regex:/^[\pL\s\-]+$/u|max:20|min:2',
            'lastName' => 'required|regex:/^[\pL\s\-]+$/u|max:20|min:2',
            'email' => 'required|email',
            'password' => 'required|min:6|max:16',
            'confirmPassword' => 'required_with:password|same:password',
            'phoneNo' => 'required',
            'address' => 'required'
        ]);
    }
//    public function saveBasicRegInfo($request){
//
//        $customer = new Customer();
//
//        $customer->firstName = $request->firstName;
//        $customer->lastName = $request->lastName;
//        $customer->email = $request->email;
//        $customer->password = $request->password;
//        $customer->address = $request->address;
//        $customer->save();
//
//    }
    public function customerSignUp(Request $request){

        $this->validateRegInfo($request);
//        $this->saveBasicRegInfo($request);
        $customer = new Customer();

        $customer->firstName = $request->firstName;
        $customer->lastName = $request->lastName;
        $customer->email = $request->email;
        $customer->password = $request->password;
        $customer->phoneNo = $request->phoneNo;
        $customer->address = $request->address;
        $customer->save();

        $customerId = $customer->id;
        Session::put('customerId',$customerId);
        Session::put('customerName',$customer->firstName.' '.$customer->lastName);

        $data = $customer->toArray();
        Mail::send('front-end.mails.confirmation-mail', $data, function ($message) use ($data) {
            $message->to($data['email']);
            $message->subject('Confirmation mail');
        });

        return redirect('/checkout/shipping');
    }


    public function shippingForm(){
        $customer = Customer::find(Session::get('customerId'));
        return view('front-end.checkout.shipping-info', ['customer'=>$customer]);
    }
    public function saveShippingInfo(Request $request){
        $shipping = new Shipping();
        $shipping->full_name = $request->full_name;
        $shipping->email_address = $request->email_address;
        $shipping->phone_number = $request->phone_number;
        $shipping->address = $request->address;
        $shipping->save();

        Session::put('shippingId', $shipping->id);
        return redirect('/checkout/payment');
    }
    public function paymentForm() {
        return view('front-end.checkout.payment');
    }
    public function newOrder(Request $request) {
        $paymentType = $request->payment_type;
        if($paymentType == 'Cash') {
            $order = new Order();
            $order->customer_id = Session::get('customerId');
            $order->shipping_id = Session::get('shippingId');
            $order->order_total = Session::get('orderTotal');
            $order->save();

            $payment = new Payment();
            $payment->order_id = $order->id;
            $payment->payment_type = $paymentType;
            $payment->save();

            $cartProducts = Cart::content();
            foreach ($cartProducts as $cartProduct) {
                $orderDetail = new OrderDetail();
                $orderDetail->order_id = $order->id;
                $orderDetail->product_id = $cartProduct->id;
                $orderDetail->product_name = $cartProduct->name;
                $orderDetail->product_price = $cartProduct->price;
                $orderDetail->product_quantity = $cartProduct->qty;
                $orderDetail->save();
            }
            Cart::destroy();
            return redirect('/complete/order');

        } else if($paymentType == 'Paypal') {

        } else if($paymentType == 'Bkash') {

        }
    }
    public function completeOrder() {
        return 'success';
    }


}
