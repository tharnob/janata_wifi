<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stock;

class stockMarketDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Stock::paginate(15);
        return view('stock', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'trade_code' => 'required|string',
            'high' => 'required|numeric',
            'low' => 'required|numeric',
            'open' => 'required|numeric',
            'close' => 'required|numeric',
            'volume' => 'required|string'

        ]);

        $stock_data = new Stock([
            'date' => $request->get('date'),
            'trade_code' => $request->get('trade_code'),
            'high' => $request->get('high'),
            'low' => $request->get('low'),
            'open' => $request->get('open'),
            'close' => $request->get('close'),
            'volume' => $request->get('volume')
        ]);

        $stock_data->save();
        return redirect()->back()->with('message','Your Data Added Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $row = Stock::find($id);
        return view('view',compact('row'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = Stock::find($id);
        return view('edit',compact('row'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Stock::find($id);

        $request->validate([
            'date' => 'required',
            'trade_code' => 'required',
            'high' => 'required',
            'low' => 'required',
            'open' => 'required',
            'close' => 'required',
            'volume' => 'required'

        ]);

        $data->date = $request->date;
        $data->trade_code = $request->trade_code;
        $data->high = $request->high;
        $data->low = $request->low;
        $data->open = $request->open;
        $data->close = $request->close;
        $data->volume = $request->volume;

        $data->save();
        return redirect()->route('stock.index')->with('msg','Data Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Stock::find($id); 
        $data->delete();
        return redirect()->route('stock.index')->with('delete','Data Deleted Successfully!');
    }
}
