<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Category;
use App\Models\Measurement;
use App\Models\ProductStore;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

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
        
        return view('Products.create',['suppliers' => $suppliers, 
        'categories' => $categories]);
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
        $product->measurement = $request->input('measurment');
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
        $productstores = ProductStore::where('product_id',$id)
                                    ->where('stock', '>' ,'0')
                                    ->orderBy('expire_date','desc')
                                    ->get();
        Log::info($productstores);
        $now = Carbon::now();
        foreach($productstores as $productstore){
            $expire_date = Carbon::parse($productstore->expire_date);
            Log::info($expire_date);
            $diff_in_months = $now->diffInMonths($expire_date);
            Log::info($diff_in_months);
            $productstore->month_to_expire = $diff_in_months;
            Log::info($productstore->month_to_expire);
            
        }
        return view('Products.show',['productstores'=>$productstores]);
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
        foreach($products as $product){
            $stock = 0;
        $product_variants = ProductStore::where('product_id',$product->id)->get();
            foreach($product_variants  as $product_variant){
                $stock = $stock + $product_variant->stock;
            }
            $product->stock = $stock;
            $product->save();
        }
        return view('Products.list',['products' => $products]);
    }
}
