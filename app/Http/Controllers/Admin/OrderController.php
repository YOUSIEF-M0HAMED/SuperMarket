<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders=Order::all();
       return view('Admin.Orders.AllOrders',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers= User::all();
        return view('Admin.Orders.AddOrder',compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request )
    {


        Order::create([
            'customer_id' => $request->customer_id
        ]);

        return redirect()->route('orders.create')->with('msg','Stored Successfully !');
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $order_items = OrderItem::where('order_id', $id)->get();
       return view('Admin.Orders.Show',compact('order_items'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $order_id)
    {
        $customers= User::all();
        $old_order=Order::where('order_id', $order_id)->first();
        return view('Admin.Orders.Edit' ,compact('old_order','customers'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $order_id)
    {
        $old_order=Order::where('order_id', $order_id)->first();

        $old_order->update([
            'customer_id' => $request->customer_id
        ]);

        return redirect()->route('orders.index')->with('msg','Updated Successfully !');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $order_id)
    {
        $order=Order::where('order_id', $order_id)->first();
        if($order){
            $order->delete();
            return redirect()->route('orders.index')-> with('msg','Archived Successfully !');
        }
     }
    public function archive()
    {

        $trashdata=Order::onlyTrashed()->get();
        return view('Admin.Orders.Archive',['trashdata'=>$trashdata]);
    }

    public function deleteArchive($id)
    {
        $Category=Order::withTrashed()->findOrFail($id);
        $Category->forceDelete();
        return redirect()->back()-> with('msg','Deleted Forever !');
    }
    public function restore($id)
    {
        $Category=Order::withTrashed()->findOrFail($id);
        $Category->restore();
        return redirect()->back()->with('msg','Restored Successfully !');
    }

}