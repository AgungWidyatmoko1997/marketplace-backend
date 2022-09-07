<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardTransactionController extends Controller
{
    public function index()
    {
        $sellTransactions = TransactionDetail::with(['transaction.user','product.galleries'])
                            ->whereHas('product', function($product) {
                                $product->where('users_id', Auth::user()->id);
                            })->get();

        $buyTransactions = TransactionDetail::with(['transaction.user','product.galleries'])
                            ->whereHas('transaction', function($transaction) {
                                $transaction->where('users_id', Auth::user()->id);
                            })->get();

        return view('pages.dashboard-transactions', [
            'sellTransactions' => $sellTransactions,
            'buyTransactions' => $buyTransactions
        ]);
    }

    public function details(Request $request, $id)
    {
        $transaction = TransactionDetail::with(['transaction.user','product.galleries'])
                            ->findOrFail($id);

        return view('pages.dashboard-transactions-details', [
            'transaction' => $transaction
        ]);
    }

    public function update(Request $request, $id)
    {
        $item = TransactionDetail::findOrFail($id);

        $item->update([
            'shipping_status' => $request->shipping_status,
            'resi' => $request->resi
        ]);

        return redirect()->route('dashboard-transaction-details', $id);
    }
}
