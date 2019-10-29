<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Shetabit\Payment\Facade\Payment;
use Shetabit\Payment\Invoice;

class GatewayController extends Controller
{
    public function index()
    {

        $invoice = (new Invoice)->amount(1000);

        return Payment::purchase($invoice, function($driver, $transactionId) {
            // store transactionId in database, we need it to verify payment in future.
        })->pay();


    }

    public function verify()
    {
        return Payment::purchase(
            (new Invoice)->amount(1000),
            function($driver, $transactionId) {
                // store transactionId in database.
                // we need the transactionId to verify payment in future
            }
        )->pay();

    }
}
