<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $order_items=OrderItem::all();
        return view('Admin.OrderItems.AllOrderItems',compact('order_items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $orders=Order::all();
        $products=Product::all();
       return view('Admin.OrderItems.AddOrderItem' ,compact('orders','products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request )
    {
        $request->validate([
            'quantity' => 'required|integer'
        ]);

        OrderItem::create([
            'order_id' => $request->order_id ,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity
        ]);

        return redirect()->route('orderitems.create')->with('msg','Stored Successfully !');
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $or_pr_id )
    {
        $ids=explode(',',$or_pr_id);

        $orders=Order::all();
        $products=Product::all();
     $old_orderItems=OrderItem::where('order_id', $ids[0])
     ->where('product_id', $ids[1])
     ->first();

    //  return $old_orderItems;

       return view('Admin.OrderItems.Edit' ,compact('old_orderItems','orders','products'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$or_pr_id)
    {
        $request->validate([
            'quantity' => 'required|integer'
        ]);

        $ids=explode(',',$or_pr_id);
    DB::table('order_items')
              ->where('order_id', $ids[0])
              ->where('product_id', $ids[1])
              ->update([

                    'order_id' => $request->order_id,
                    'product_id' => $request->product_id,
                    'quantity' => $request->quantity
              ]);

        return redirect()->route('orderitems.index')->with('msg','Upated Successfully !');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $or_pr_id)
    {
        $ids=explode(',',$or_pr_id);

        DB::table('order_items') ->where('order_id', $ids[0])
        ->where('product_id', $ids[1])
        ->delete();

        return redirect()->route('orderitems.index')-> with('msg','Deleted Successfully !');
    }
}