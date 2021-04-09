<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use App\Models\Course;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class PaymentController extends Controller
{
    private $apiContext;



    public function __construct()
    {
        $paypalConfig = Config::get('paypal');

        // Pay step 2
        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                $paypalConfig['client_id'],     // ClientID
                $paypalConfig['secret']      // ClientSecret
            )
        );

        $this->apiContext->setConfig($paypalConfig['settings']);
    }

    public function checkout( Course $course ){
        return view('payment.checkout', compact('course'));
    }

    public function payWithPayPal(Request $request, Course $course ){


        // User
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $item = new Item();
        $item->setName($course->title)
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($course->price->value);

        $item_list = new ItemList();
        $item_list->setItems(array($item));

        // Price
        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($course->price->value);


        // Transaction
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Compra de curso');

        // Route to confirm if user payment or canceled payment
        //$callbackUrl = url($course . 'pay/status');
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(route('paypal.payment.approved', $course)) // If use continue and approved payment
            ->setCancelUrl(route('payment.checkout', $course)); // If user cancel

        // Generate transaction
        $payment = new Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));

        // Pay Step 4
        try {
            $payment->create($this->apiContext);
            // echo $payment;

            // redirect to external paypal url
            return redirect()->away($payment->getApprovalLink());

            //echo "\n\nRedirect user to approval_url: " . $payment->getApprovalLink() . "\n";
        }
        catch (\PayPal\Exception\PayPalConnectionException $ex) {
            // This will print the detailed information on the exception.
            //REALLY HELPFUL FOR DEBUGGING
            echo $ex->getData();
        }

    }


    public function payWithPayPalApproved(Request $request, Course $course){
        // Get the payment Object by passing paymentId
        // payment id was previously stored in session in
        // CreatePaymentUsingPayPal.php
        $paymentId = $_GET['paymentId'];
        $payment = Payment::get($paymentId, $this->apiContext);

        // ### Payment Execute
        // PaymentExecution object includes information necessary
        // to execute a PayPal account payment.
        // The payer_id is added to the request query parameters
        // when the user is redirected from paypal back to your site
        $execution = new PaymentExecution();
        $execution->setPayerId($_GET['PayerID']);

        // Execute the payment
        // (See bootstrap.php for more on `ApiContext`)
        $payment->execute($execution, $this->apiContext);

        // ENROLLED USER AFTER PAYMENT

        // insert user auth id in course_user table
        $course->students()->attach( auth()->user()->id );

        // redirect user to enrolled course;
        return redirect()->route('courses.status', $course);
    }
}
