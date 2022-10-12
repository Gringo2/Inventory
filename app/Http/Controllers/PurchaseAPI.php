<?php

namespace App\Http\Controllers;
use App\Models\PurchaseLine;
use App\Http\Requests\PurchaseLinePostRequest;
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
     * @param  App\Http\Requests\PurchaseLinePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PurchaseLinePostRequest $request)
    {
        $validated = $request->validated();
        $purchaseline = PurchaseLine::create($request->all());

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
