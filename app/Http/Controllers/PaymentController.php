<?php

namespace App\Http\Controllers;

use Anand\LaravelPaytmWallet\Facades\PaytmWallet;
use App\Models\Users;
use DB;
use Illuminate\Http\Request;
use Session;

class PaymentController extends Controller
{

    public function index()
    {
        $payment_details = session('payment_details');
        if (!$payment_details || !is_array($payment_details) || count($payment_details) <= 0) {
            flash()->addError('Payment not configured yet');
            return redirect()->back();
        }
        if ($payment_details['payable_amount'] <= 0) {
            flash()->addError("Payable amount cannot be less than 1");
            return redirect()->to($payment_details['cancel_url']);
        }

        $page_data['payment_details'] = $payment_details;
        $page_data['payment_gateways'] = DB::table('payment_gateways')->get();
        return view('payment.index', $page_data);
    }

    public function show_payment_gateway_by_ajax($identifier)
    {
        $page_data['payment_details'] = session('payment_details');
        $page_data['payment_gateway'] = DB::table('payment_gateways')->where('identifier', $identifier)->first();
        return view('payment.' . $identifier . '.index', $page_data);
    }

    public function payment_success($identifier, Request $request)
    {
        $payment_details = session('payment_details');
        $payment_gateway = DB::table('payment_gateways')->where('identifier', $identifier)->first();
        $model_name = $payment_gateway->model_name;
        $model_full_path = str_replace(' ', '', 'App\Models\payment_gateway\ ' . $model_name);

        $status = $model_full_path::payment_status($identifier, $request->all());

        if ($status === true) {
            $success_model = $payment_details['success_method']['model_name'];
            $success_function = $payment_details['success_method']['function_name'];

            $model_full_path = str_replace(' ', '', 'App\Models\ ' . $success_model);
            return $model_full_path::$success_function($identifier);
        } else {
            flash()->addError(get_phrase('Payment failed! Please try again.'));
            redirect()->to($payment_details['cancel_url']);
        }
    }

    public function payment_create($identifier)
    {
        $payment_details = session('payment_details');
        $payment_gateway = DB::table('payment_gateways')->where('identifier', $identifier)->first();
        $model_name = $payment_gateway->model_name;
        $model_full_path = str_replace(' ', '', 'App\Models\payment_gateway\ ' . $model_name);
        $created_payment_link = $model_full_path::payment_create($identifier);
        return redirect()->to($created_payment_link);
    }

    public function payment_razorpay($identifier)
    {
        $payment_details = session('payment_details');
        $payment_gateway = DB::table('payment_gateways')->where('identifier', $identifier)->first();
        $model_name = $payment_gateway->model_name;
        $model_full_path = str_replace(' ', '', 'App\Models\payment_gateway\ ' . $model_name);
        $data = $model_full_path::payment_create($identifier);
        return view('payment.razorpay.payment', compact('data'));
    }

    public function payment_paytm(Request $request)
    {
        $user = Users::where('id', $request->user)->first();
        $payment = PaytmWallet::with('receive');
        $payment->prepare([
            'order' => $user->phone . "_" . rand(1, 1000),
            'user' => auth()->user()->id,
            'mobile_number' => $user->phone,
            'email' => $user->email,
            'amount' => $request->amount,
            'callback_url' => route('payment.status', ['identifier' => 'paytm']),
        ]);
        return $payment->receive();
    }

    public function paytm_paymentCallback()
    {
        $transaction = PaytmWallet::with('receive');
        $response = $transaction->response();
        $order_id = $transaction->getOrderId(); // return a order id
        $transaction->getTransactionId(); // return a transaction id

        // update the db data as per result from api call
        if ($transaction->isSuccessful()) {
            Paytm::where('order_id', $order_id)->update(['status' => 1, 'transaction_id' => $transaction->getTransactionId()]);
            return redirect(route('initiate.payment'))->with('message', "Your payment is successfull.");

        } else if ($transaction->isFailed()) {
            Paytm::where('order_id', $order_id)->update(['status' => 0, 'transaction_id' => $transaction->getTransactionId()]);
            return redirect(route('initiate.payment'))->with('message', "Your payment is failed.");

        } else if ($transaction->isOpen()) {
            Paytm::where('order_id', $order_id)->update(['status' => 2, 'transaction_id' => $transaction->getTransactionId()]);
            return redirect(route('initiate.payment'))->with('message', "Your payment is processing.");
        }
        $transaction->getResponseMessage(); //Get Response Message If Available

        // $transaction->getOrderId(); // Get order id
    }

}
