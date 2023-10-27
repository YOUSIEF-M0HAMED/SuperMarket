<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=Category::all();
       return view('Admin.Categories.AllCategories',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Categories.AddCategory');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request , CategoryRequest $validator)
    {


        Category::create([

            'category_name' => $request->category_name
        ]);

        return redirect()->route('categories.create')->with('msg','Stored Successfully !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $old_category=Category::findOrfail($id);

        return view('Admin.Categories.Show',compact('old_category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $old_category=Category::findOrfail($id);
        return view('Admin.Categories.Edit' ,compact('old_category'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CategoryRequest $validator,  $id)
    {
        $old_category=Category::findOrfail($id);
        $old_category->update([

            'category_name' => $request->category_name,
        ]);

        return redirect()->route('categories.index')->with('msg','Updated Successfully !');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category=Category::findOrfail($id);
        if($category){
            $category->delete();
            return redirect()->route('categories.index')-> with('msg','Archived Successfully !');
        }
     }
    public function archive()
    {

        $trashdata=Category::onlyTrashed()->get();
        return view('Admin.Categories.Archive',['trashdata'=>$trashdata]);
    }

    public function deleteArchive($id)
    {
        $Category=Category::withTrashed()->findOrFail($id);
        $Category->forceDelete();
        return redirect()->back()-> with('msg','Deleted Forever !');
    }
    public function restore($id)
    {
        $Category=Category::withTrashed()->findOrFail($id);
        $Category->restore();
        return redirect()->back()->with('msg','Restored Successfully !');
    }

}