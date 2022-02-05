<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Promotion;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;

class PromotionController extends BaseController
{


    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        if ($request->input('user_id') != null) {
            foreach ($request->input('user_id') as $user_id) {
                $promotion = Promotion::where([['user_id', $user_id], ['product_id', $request->input('product_id')]])->first();

                $promotion->delete();
            }
        } else {
            $promotion = Product::where('id', $request->input('product_id'))->first();

            $promotion->update(['promotion' => null]);
        }

        $promotion->save();

        return $this->sendResponse([$promotion], 'Promotion has been Deleted');
    }
    /**
     * Store the resource in storage
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        if ($request->input('users') != null) {
            foreach ($request->input('users') as $user_id) {
                $promotion = Promotion::where([['user_id', $user_id], ['product_id', $request->input('product_id')]])->first();

                if ($promotion != null) {
                    $promotion->update(['promotion' => $request->input('promotion')]);
                } else {
                    $promotion = Promotion::create(['user_id' => $user_id, 'product_id' => $request->input('product_id'), 'promotion' => $request->input('promotion')]);
                }
            }
        } else {
            $promotion = Product::where('product_id', $request->input('product_id'))->update(['promotion' => $request->input('promotion')]);
        }

        $promotion->save();

        return $this->sendResponse($promotion, 'Promotion Information has been created');
    }
}
