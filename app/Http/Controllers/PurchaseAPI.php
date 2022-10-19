<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\PurchaseLine;
use App\Models\Purchase;
use App\Models\Product;
use App\Http\Requests\PurchaseLinePostRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;


class PurchaseAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchase = PurchaseLine::all();

        return response()->json([
            'status' => true,
            'purchaseline' => $purchase
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        Log::info($request); 
        // $array = json_decode($request, true);
        $purchase = new Purchase;
        //Retrieve the currently authenticated user's ID...
        $purchase->user_id = Auth::User()->id;
        Log::info(Auth::user());
        $purchase->sub_total = $request['total'];
        $purchase->supplierid = 11;
        $purchase->date = now();
        $purchase->save();

        foreach($request['data'] as $newReq)
        {
            $purchaseline = PurchaseLine::create([
                'product_id'    => $newReq['product_id'],
                'purchase_id'   => $purchase->id,
                'product_name'  => $newReq['name'],
                'unit_price'    => $newReq['price'],
                'unit'          => $newReq['unit'],
                'batch_no'      => 112,
                'amount'        => $newReq['amount'],
                'total'         => $newReq['total'],
                'expire_date'   => 12
                ]
            );
            $product = Product::findorfail($newReq['product_id']);
            $product->stock = $product->stock + $newReq['amount'];
            
            $product->save();
        }
        return response()->json([
            'status' => true,
            'message' => "Purchase Line Created Successfully!",
            'purchaseLine' => $purchaseline
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
