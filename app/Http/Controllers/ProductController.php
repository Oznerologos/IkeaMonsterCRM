<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;

class ProductController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with("users")->latest()->get();

        return $this->sendResponse($products, 'Product list');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Products\ProductRequest  $request
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $product = Product::create($request->all());

        return $this->sendResponse($product, 'Product Created Successfully');
    }
    /**
     * Update the resource in storage
     *
     * @param  \App\Http\Requests\Products\ProductRequest  $request
     * @param $id
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $product->update($request->all());

        return $this->sendResponse($product, 'Product Information has been updated');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


        $product = Product::findOrFail($id);

        $product->delete();

        return $this->sendResponse([$product], 'Product has been Deleted');
    }


    public function show($id)
    {
        $product = Product::find($id);

        return $this->sendResponse($product, 'product list');
    }
}
