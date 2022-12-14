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
             //get the expire date difference from current date
            
             $now = Carbon::now();
             $stock = 0;
             $product_store = new ProductStore;
             $product_store->product_id  = $newReq['product_id'];
             $product_store->name        = $newReq['name'];
             $product_store->batch_no    = $newReq['batch_no'];
             $product_store->expire_date = $newReq['expire_date'];
             $product_store->stock       = $newReq['amount'];
             $product_store->unit_price  = $newReq['price'];
             //set month to expire
             $expire_date = Carbon::parse($product_store->expire_date);
             $diff_in_months = $now->diffInMonths($expire_date);
             $product_store->month_to_expire = $diff_in_months;
 
             $product_store->save();

            //save current purchase invoice
            $purchaseline = PurchaseLine::create([
                'product_id'    => $newReq['product_id'],
                'purchase_id'   => $purchase->id,
                'product_name'  => $newReq['name'],
                'sku'           => $product_store->sku,
                'unit_price'    => $newReq['price'],
                'amount'        => $newReq['amount'],
                'total'         => $newReq['total'],
                ]
            );

            //condition if current batch-no and expire date match exisiting record
           
            //get the current product
            $product = Product::findorfail($newReq['product_id']);
            //save variant stock count sum
            //call out specific variant
            $product_variants = ProductStore::where('product_id',$newReq['product_id'])->get();
            foreach($product_variants  as $product_variant){
                $stock = $stock + $product_variant->stock;
            }

            $product->stock = $stock;
            $product->purchase_price = $newReq['price'];
            $product->retail_price = $newReq['price'] + ($newReq['price'] * 0.3);
            $product->wholesale = $newReq['price']  + ($newReq['price'] * 0.2);
            $product->save();
            //remaining date refresh

            $productstores = ProductStore::all();
            //refresh months to expire with every purchase
            foreach($productstores as $productstore){  
                //get the expire date          
                $expire_date = Carbon::parse($productstore->expire_date);
                //calculate diff in months from now   
                $diff_in_months = $now->diffInMonths($expire_date);
    
                $productstore->month_to_expire = $diff_in_months;

                $productstore->save();  
            }            
 

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
