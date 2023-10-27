<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products=Product::all();
        return view('Admin.Products.AllProducts', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $brands=Brand::all();
         $categories=Category::all();
         return view('Admin.Products.AddProduct',compact('brands','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,ProductRequest $validate)
    {

        $image = $request->file('img');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/products'), $imageName);





        Product::create([

            'name' => $request->name ,
            'price' => $request->price ,
            'discount' => $request->discount ,
            'quantity' => $request->quantity ,
            'brand_id' => $request->brand_id ,
            'category_id' => $request->category_id ,
            'img' => $imageName
        ]);

        return redirect()->route('products.create')->with('msg','Stored Successfully !');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $old_prod=Product::findOrfail($id);

        return view('Admin.Products.Show',compact('old_prod'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brands=Brand::all();
        $categories=Category::all();
        $old_prod=Product::findOrfail($id);
        return view('Admin.Products.Edit' ,compact('old_prod','brands','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request ,ProductRequest $validate , $id)
    {
        $old_prod=Product::findOrfail($id);

        $image = $request->file('img');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/products'), $imageName);

        $old_prod->update([

            'name' => $request->name,
            'price' => $request->price,
            'discount' => $request->discount,
            'quantity' => $request->quantity,
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'img' => $imageName
        ]);

        return redirect()->route('products.index')->with('msg','Updated Successfully !');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::findOrfail($id);
        if($product){
            $product->delete();
          return redirect()->route('products.index')-> with('msg','Archived Successfully !');
        }
     }
    public function archive()
    {

        $trashdata=Product::onlyTrashed()->get();
        return view('Admin.Products.Archive',['trashdata'=>$trashdata]);
    }

    public function deleteArchive($id)
    {
        $Category=Product::withTrashed()->findOrFail($id);
        $Category->forceDelete();
        return redirect()->back()-> with('msg','Deleted Forever !');
    }
    public function restore($id)
    {
        $Category=Product::withTrashed()->findOrFail($id);
        $Category->restore();
        return redirect()->back()->with('msg','Restored Successfully !');
    }

}