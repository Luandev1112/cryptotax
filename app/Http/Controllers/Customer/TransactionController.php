<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    public function index()
    {
        return view("pages.customer.transactions.index");
    }
}
