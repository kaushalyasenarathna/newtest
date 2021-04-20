<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Order::select(
            'orders.id',
            'orders.quentity',
            'orders.price',
            'orders.created_at',
            'orders.updated_at',
            'products.product_name as product_id',
            
            'customers.customer_name as customer_id'
        )
        ->join('customers', 'customers.id', '=', 'orders.customer_id')
        ->join('products', 'products.id', '=', 'orders.product_id')
        ->get();
   

        return view('order.index')->with(compact('order'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Order $order, $product, Customer $customer )
    {
        $product = Product::find($product);
        $order = $product->order;
        $customer = Customer::all();
     

        return view('order.create', compact('product', 'order', 'customer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'product_id' => 'required',
        //     'customer_id' => 'required',
            
        //     'quentity' => 'required',
        //     ' price' => 'required',
        //     ]);
   
        $order = new Order();
        $order->customer_id = $request->customer_id;
        $order->product_id = $request->product_id;
        $order->quentity = $request->quentity;
        $order->price=$request->price* $request->quentity;
        $order->save();

     
        return redirect()->route('product.index')->with('add', 'Record Added');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order ,Customer $customer,Product $product)
    {
        $product = Product::get();
        $customer = Customer::get();
        return view('order.edit', compact('order','product','customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $order->update($request->all());

        return redirect()->route('order.index')->with('add', 'Record edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order )
    {
        $order->delete();

        return redirect()->route('order.index')->with('add', 'Record Delete');
    }
}
