<?php

namespace App\Http\Controllers;

use App\CategoryModel;
use App\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = ProductModel::all();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = CategoryModel::all();
        return view('products.create', compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'quantity' => 'required',
            'buy_price' => 'required',
            'sell_price' => 'required',
        ]);

        $product = new ProductModel();
        $product->name = $request->name;
        $product->category_id = $request->cat;
        $product->qty = $request->quantity;
        $product->buy_price = $request->buy_price;
        $product->sell_price = $request->sell_price;
        $product->save();

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = ProductModel::where('id',$id)->first();
        return view('products.detail', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = ProductModel::where('id',$id)->first();
        $cats = CategoryModel::all();
        return view('products.edit', compact('product', 'cats'));
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
        $validatedData = $request->validate([
            'name' => 'required',
            'quantity' => 'required',
            'buy_price' => 'required',
            'sell_price' => 'required',
        ]);

        $product = ProductModel::where('id', $id)->first();
        $product->name = $request->name;
        $product->category_id = $request->cat;
        $product->qty = $request->quantity;
        $product->buy_price = $request->buy_price;
        $product->sell_price = $request->sell_price;
        $product->save();

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = ProductModel::where('id', $id)->first();
        $product->delete();

        return redirect()->route('product.index');
    }

    public function statistic(Request $request){
        return view('products.statistic');
    }

    public function statisticApi(Request $request){
        $data = DB::table('products')
            ->join('category', 'category.id', 'products.category_id')
            ->selectRaw('count(products.category_id) as total, category.name')
            ->groupBy('category.id')
            ->get();

        return response()->json(['values' => $data]);
    }
}
