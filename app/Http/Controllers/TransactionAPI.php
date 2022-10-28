<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\TransactionLine;
use App\Models\Transaction;
use App\Models\Product;
use App\Models\ProductStore;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
                'amount'        => $newReq['amount'],
                'total'         => $newReq['total'],
                ]
            );
            //fetch product variants sort by expire date
            $product_stores =    DB::table('product_stores')
                                ->where('product_id',$transactionline->product_id)
                                ->orderby('month_to_expire','asc')->get();
            Log::info($product_stores);

            //getting stock arrangement
            $amount = $newReq['amount'];
            $size = $product_stores->count();
            $array = array();
            $i = 0;
            foreach($product_stores as $product_store){
                
                
                if($amount > $product_store->stock){
                    $array[$i]  = $product_store->stock;
                    $amount = $amount - $product_store->stock;
                    $i++;
                }
                else{
                    $array[$i] = $amount;
                    break;
                    
                }
                
            }
            Log::info($array);

            $product_stores =    DB::table('product_stores')
            ->where('product_id',$transactionline->product_id)
            ->orderby('month_to_expire','asc')->take($i+1)->get();
            Log::info($product_stores);

            //decrease values from respective stock
            $j = 0;
            foreach($product_stores as $product_store){
                $product_store->stock = $product_store->stock - $array[$j];
                $stock_change = DB::table('product_stores')
                            ->where('sku', $product_store->sku)
                            ->update(['stock' => $product_store->stock]);
                $j++;
            }

            

            
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
