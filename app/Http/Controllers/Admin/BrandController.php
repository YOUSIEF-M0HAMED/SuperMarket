<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands=Brand::all();
       return view('Admin.Brands.AllBrands',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Brands.AddBrand');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request , BrandRequest $validator)
    {


        Brand::create([

            'brand_name' => $request->brand_name
        ]);

        return redirect()->route('brands.create')->with('msg','Stored Successfully !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $old_brand=Brand::findOrfail($id);

        return view('Admin.Brands.Show',compact('old_brand'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $old_brand=Brand::findOrfail($id);
        return view('Admin.Brands.Edit' ,compact('old_brand'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BrandRequest $validator,  $id)
    {
        $old_brand=Brand::findOrfail($id);
        $old_brand->update([

            'brand_name' => $request->brand_name,
        ]);

        return redirect()->route('brands.index')->with('msg','Updated Successfully !');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $brand=Brand::findOrfail($id);
        if($brand){
            $brand->delete();
            return redirect()->route('brands.index')->with('msg','Archived Successfully !');
        }
     }
    public function archive()
    {

        $trashdata=Brand::onlyTrashed()->get();
        return view('Admin.Brands.Archive',['trashdata'=>$trashdata]);
    }

    public function deleteArchive($id)
    {
        $Category=Brand::withTrashed()->findOrFail($id);
        $Category->forceDelete();
        return redirect()->back()-> with('msg','Deleted Forever !');
    }
    public function restore($id)
    {
        $Category=Brand::withTrashed()->findOrFail($id);
        $Category->restore();
        return redirect()->back()->with('msg','Restored Successfully !');
    }

}