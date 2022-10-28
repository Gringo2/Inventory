<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\PurchaseLine;
use App\Http\Requests\PurchaseRequest;
use Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $purchases = Purchase::orderBy('date', 'desc')->get();
        foreach($purchases as $purchase){
            $date = Carbon::parse($purchase->date);
            $purchase->date = $date->toFormattedDateString();
        }
        return view('Purchases.history', ['purchases' => $purchases]);
    }

    /**
     * Show the form for creating a new resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {   
        

        $products = Product::all();
        $purchase = new Purchase;
        $suppliers = Supplier::all();
        return view('Purchases.create', ['products' => $products , 'purchase' => $purchase , 'suppliers' => $suppliers]);
        // $purchases = Purchase::all();
        // return view('Purchases.createpurchase', ['purchases' => $purchases]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\PurchaseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PurchaseRequest $request)
    {   
        $validated = $request->validated();
        $purchase = $request->user()->purchases()->create($validated);

        return redirect()
        ->route('purchase.create')
        ->with('success','Purchase is created!' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $purchase = Purchase::findorFail($id);
        $purchaselines = DB::table('purchase_lines')->where('purchase_id',$id)->get();
        $date = Carbon::parse($purchase->date);
        $purchase->date = $date->toDayDateTimeString();
        return view('Purchases.show',['purchase'=>$purchase , 'purchaselines' => $purchaselines]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
