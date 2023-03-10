<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Buyer;
use App\Models\Item;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Transaction::all();
        return view('transaction.index', compact('data'))->with('buyer','item');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $buyer = Buyer::all();
        $item = Item::all();
        return view('transaction.create', compact('buyer','item'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request -> validate([
            'item_id' => 'required',
            'buyer_id' => 'required',
            'tanggal' => 'required',
            'jenis_pembayaran' => 'required',
        ]);
        $data = $request->all();
        Transaction::create($data);
        return redirect('/transaction');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        return view('transaction.detail', compact('transaction'))->with('buyer','item');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        $buyer = Buyer::all();
        $item = Item::all();
        return view('transaction.edit', compact('transaction','buyer','item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        $request -> validate([
            'item_id' => 'required',
            'buyer_id' => 'required',
            'tanggal' => 'required',
            'jenis_pembayaran' => 'required',
        ]);

        $datalama = Transaction::findOrfail($transaction->id);
        $databaru = $request->all();
        $datalama -> update($databaru);
        return redirect('/transaction');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        Transaction::destroy($transaction->id);
        return redirect('/transaction');
    }
}
