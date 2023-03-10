<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Supply;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Item::all();
        return view('item.index', compact('data'))->with('supplier');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sup = Supply::all();
        return view('item.create', compact ('sup'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate ([
            'nama_barang'=> 'required',
            'supplier_id'=> 'required',
            'harga'=> 'required',
            'stok'=> 'required',
        ]);
        $data = $request->all();
        Item::create($data);
        return redirect('/item');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        return view('item.detail', compact('item'))->with('supplier');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        $sup = Supply::all();
        return view('item.edit', compact('item','sup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $request -> validate([
            'nama_barang'=> 'required',
            'supplier_id'=> 'required',
            'harga'=> 'required',
            'stok'=> 'required',
        ]);
        $datalama = Item::findOrfail($item->id);
        $databaru = $request->all();
        $datalama -> update($databaru);
        return redirect('/item');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        Item::destroy($item->id);
        return redirect('/item');

    }
}
