<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\PurchaseLine;
use App\Models\Purchase;
use App\Models\Product;
use App\Models\ProductStore;
use App\Http\Requests\PurchaseLinePostRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Carbon\Carbon;


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
        $purchase->supplier_id = $request['supplier_id'];
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
                'batch_no'      => $newReq['batch_no'],
                'amount'        => $newReq['amount'],
                'total'         => $newReq['total'],
                'expire_date'   => $newReq['expire_date']
                ]
            );

            //condition if current batch-no and expire date match exisiting record

            //get the expire date difference from current date
            
            $product_store = new ProductStore;
            $product_store->product_id  = $newReq['product_id'];
            $product_store->name        = $newReq['name'];
            $product_store->batch_no    = $newReq['batch_no'];
            $product_store->expire_date = $newReq['expire_date'];
            $product_store->stock       = $newReq['amount'];
            $product_store->status      = "st";
            $product_store->flag        = 1;
            $product_store->month_to_expire = 1;

            $product_store->save();

            //remaining date refresh
            $productstores = ProductStore::all();
            $now = Carbon::now();
            $stock = 0;
            foreach($productstores as $productstore){
                $expire_date = Carbon::parse($productstore->expire_date);
                Log::info($expire_date);
                $diff_in_months = $now->diffInMonths($expire_date);
                Log::info($diff_in_months);
                $productstore->month_to_expire = $diff_in_months;
                Log::info($productstore->month_to_expire);
                $stock = $stock + $productstore->stock;
                $productstore->save();  
            }            

            $product = Product::findorfail($newReq['product_id']);
            //save variant stock count sum
            $product->stock = $stock;
            $product->purchase_price = $newReq['price'];
            
            $product->retail_price = $newReq['price'] + ($newReq['price'] * 0.2);
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
