<?php

namespace App\Http\Controllers;
use App\Models\Supplier;
use App\Http\Requests\StoreSupplierRequest;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSupplierRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSupplierRequest $request)
    {
        $validated = $request->validated();

        $supplier = new Supplier;

        $supplier->company_name = $request->input('company_name');
        $supplier->email = $request->input('email');
        $supplier->phone_number = $request->input('phone_number');
        $supplier->address  = $request->input('address');

        $supplier->save();

        return redirect()
            ->route('suppliers.create')
            ->with('success','Registered Supplier. Company Name:' .
            $request->input('company_name'));
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('Suppliers.edit', [
            'supplier' => Supplier::findorfail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreSupplierRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSupplierRequest $request, $id)
    {
        $validated = $request->validated();

        $supplier = Supplier::findorfail($id);

        $supplier->company_name = $request->input('company_name');
        $supplier->email = $request->input('email');
        $supplier->phone_number = $request('phone_number');
        $supplier->address  = $request('adrress');
        
        $supplier->save();
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

    public function list(){

        $suppliers = Supplier::all();
        return view('Suppliers.list',['suppliers' => $suppliers]);
    }
}
