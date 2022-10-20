<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\TransactionLine;
use App\Models\Transaction;
use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class TransactionAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchase = TransactionLine::all();

        return response()->json([
            'status' => true,
            'purchaseline' => $purchase
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Log::info($request); 
        // $array = json_decode($request, true);
        $transaction = new Transaction;
        //Retrieve the currently authenticated user's ID...
        $transaction->user_id = Auth::User()->id;
        Log::info(Auth::user());
        $transaction->sub_total = $request['total'];
        $transaction->customerid = $request['customer_id'];
        $transaction->date = now();
        $transaction->save();

        foreach($request['data'] as $newReq)
        {
            $transactionline = TransactionLine::create([
                'product_id'    => $newReq['product_id'],
                'transaction_id'   => $transaction->id,
                'product_name'  => $newReq['name'],
                'unit_price'    => $newReq['price'],
                'unit'          => $newReq['unit'],
                'batch_no'      => 112,
                'amount'        => $newReq['amount'],
                'total'         => $newReq['total'],
                'expire_date'   => 12/11/11
                ]
            );
            $product = Product::findorfail($newReq['product_id']);
            $product->stock = $product->stock - $newReq['amount'];
            
            $product->save();
        }
        return response()->json([
            'status' => true,
            'message' => "Transaction Line Created Successfully!",
            'transactionline' => $transactionline
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
