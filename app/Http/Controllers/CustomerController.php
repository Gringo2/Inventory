<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use Illuminate\Http\Request;

class CustomerController extends Controller
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
        return view('Customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCustomerRequest   $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerRequest $request)
    {
        $validated = $request->validated();

        $customer = new Customer;

        $customer->company_name = $request->input('company_name');
        $customer->email = $request->input('email');
        $customer->phone_number = $request->input('phone_number');
        $customer->address  = $request->input('address');

        $customer->save();

        return redirect()
            ->route('customers.create')
            ->with('success','registered customer. Company Name:' .
            $request->input('company_name').'email:'.
            $request->input('email'));


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
        return view('Customers.edit',[
            'customer' => Customer::findorfail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreCustomerRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCustomerRequest $request, $id)
    {
        $validated = $request->validated();

        $customer = Customer::findorfail($id);

        $customer->company_name = $request->input('company_name');
        $customer->email = $request->input('email');
        $customer->phone_number = $request('phone_number');
        $customer->address  = $request('adrress');

        $customer->save();
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

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(){

        $customers = Customer::all();
        return view('Customers.list',['customers' => $customers]);
    }
}
