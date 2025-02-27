<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;

/**
 * Class StockController
 * @package App\Http\Controllers
 */
class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stocks = Stock::paginate();

        return view('stocks.index', compact('stocks'))
            ->with('i', (request()->input('page', 1) - 1) * $stocks->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stock = new Stock();
        return view('stocks.create', compact('stock'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $stock = request()->except('_token');
        if($request->hasFile('img')){
            $filename = request('img')->getClientOriginalName();
            $stock['img'] = $request->file('img')->storeAs('public', $filename);
        }

        request()->validate(Stock::$rules);
        Stock::insert($stock);
        // $stock = Stock::create($request->all());

        return redirect()->route('stocks.index')
            ->with('success', 'Stock created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $stock = Stock::find($id);

        return view('stocks.show', compact('stock'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stock = Stock::find($id);

        return view('stocks.edit', compact('stock'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Stock $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stock $stock)
    {

        // $stock = request()->except('_token');
        // if($request->hasFile('img')){
        //     $filename = request('img')->getClientOriginalName();
        //     $stock['img'] = $request->file('img')->storeAs('public', $filename);
        // }

        // request()->validate(Stock::$rules);
        // Stock::update($stock);
        // // $stock = Stock::create($request->all());

        // return redirect()->route('stocks.index')
        //     ->with('success', 'Stock updated successfully.');



        request()->validate(Stock::$rules);

        $stock->update($request->all());

        return redirect()->route('stocks.index')
            ->with('success', 'Stock updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $stock = Stock::find($id)->delete();

        return redirect()->route('stocks.index')
            ->with('success', 'Stock deleted successfully');
    }
}
