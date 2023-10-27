<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = User::all();

        return view('Admin.Customers.AllCustomers', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show( $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $old_cust=User::findorfail($id);

        return view('Admin.Customers.Edit',['old_cust'=>$old_cust]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( Request $request ,User $validate , $id)
    {
        $request->validate([
            'fname'=>'required|min:2|max:20|alpha',
            'lname'=>'required|min:2|max:20|alpha',
            'email' => 'required|email|lowercase'  ,
            'phone' => 'required|digits:11|numeric',
            'password'=>'required|alpha_num|min:6|max:20',
            'address'=>'nullable|min:3|max:20|string',
            'age'=>'required|numeric|gt:12',


        ]);
        $old_cust=User::findOrfail($id);
        $old_cust->update([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'password'=>$request->password,
            'phone' => $request->phone,
            'address' => $request->address,
            'gender' => $request->gender,
            'age'=>$request->age

        ]);

        return redirect()->back()-> with('msg','Updated Successfully !');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $customer=User::findOrfail($id);
        $customer->delete();
        return redirect()->back()-> with('msg','Archived Successfully !');
    }
    public function archive()
    {

        $trashdata=User::onlyTrashed()->get();

        return view('Admin.Customers.Archive',['trashdata'=>$trashdata]);
    }
    public function deleteArchive($id)
    {
        $customer=User::withTrashed()->findOrFail($id);
        $customer->forceDelete();
        return redirect()->back()-> with('msg','Deleted Forever !');
    }
    public function restore($id)
    {
        $customer=User::withTrashed()->findOrFail($id);
        $customer->restore();
        return redirect()->back()->with('msg','Restored Successfully !');
    }

}