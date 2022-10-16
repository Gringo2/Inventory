<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Category;
use App\Models\Measurement;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $suppliers = Supplier::all();
        $categories = Category::all();
        $measurements = Measurement::all();
        return view('Products.create',['suppliers' => $suppliers, 
        'categories' => $categories , 'measurements' => $measurements]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $validated = $request->validated();

        $product = new Product;

        $product->product_name = $request->input('product_name');
        $product->description = $request->input('description');
        $product->brand = $request->input('brand');
        $product->measurment = $request->input('measurment');
        $product->quantity = $request->input('quantity');
        $product->batch_no = $request->input('batch_no');
        $product->expiry_date = $request->input('expiry_date');

        $product->save();

        return redirect()
            ->route('products.create')
            ->with('success','product is created! Product Name:'.
            $request->input('product_name').'Brand:'.
            $request->input('brand'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findorfail($id);
        return view('Products.list',['product'=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('Products.edit',[
            'product' => Product::findorfail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductRequest $request, $id)
    {
        $validated = $request->validated();

        $product = Product::findorfail($id);

        $product->product_name = $request->input('product_name');
        $product->description = $request->input('description');
        $product->brand = $request->input('brand');
        $product->quantity = $request->input('quantity');
        $product->save();

        

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

        $products = Product::all();
        return view('Products.list',['products' => $products]);
    }
}
