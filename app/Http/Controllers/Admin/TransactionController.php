<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tranzaction;

class TransactionController extends Controller
{
    public function index() {

        $transactions = Tranzaction::all();

        return view('admin.transaction.transaction', compact('transactions'));
    }
}
