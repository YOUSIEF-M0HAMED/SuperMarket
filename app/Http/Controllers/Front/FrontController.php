<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    public function index(){
        $categories=Category::all();
        $products=Product::all();

      return view('Front.main',compact('categories', 'products'));

    }

    public function AboutUs(){

      return view('Front.aboutUs');

    }

    public function ContactUs(){

        return view('Front.ContactUs');

      }


    public function handeleSearch(Request $request){

      $products=Product::where('name','like','%'.$request->search.'%')->get();
      return view('front.search',compact('products'));

    }

      public function AddToCart(Request $request,$prod_id){


        if(Auth::id()){

            $product=Product::findOrfail($prod_id);
            $price=$product->price*$request->prod_quantity-(($product->price*$product->discount/100)*$request->prod_quantity);
            $user=auth()->user();


            $cart=new Cart();

            $cart->name=$user->fname." ".$user->lname ;
            $cart->phone=$user->phone ;
            $cart->address=$user->address ;
            $cart->product_name= $product->name ;
            $cart->price=$price;
            $cart->quantity =$request->prod_quantity;
            $cart->prod_id= $product->id;
            $cart->email=$user->email;
            $cart->save();


            return redirect()->back();

        }else{

            return redirect()->route('signin');
        }


      }


      public function GetFromCart(){

       $user_email=auth()->user()->email ;
        $carts=Cart::Where('email', '=',$user_email )->get();

        return view('Front.showCart',compact('carts'));
      }

        public function ConfirmCart(){


          try {

            Order::create([
              'customer_id' => auth()->user()->id
      ]);

    $lastOrdertId = DB::getPdo()->lastInsertId();

    $user_email=auth()->user()->email ;

    $carts=Cart::Where('email', '=',$user_email )->get();

      foreach ($carts as $cart){
                  OrderItem::create([
                      'order_id' => $lastOrdertId ,
                       'product_id' =>$cart->prod_id,
                       'quantity' =>$cart->quantity
                  ]);

                $cart->delete();
              }

              return redirect()->back()->with('success','confirmed succseuflly with order id = '.$lastOrdertId);


            }

                catch (\Illuminate\Database\QueryException $e) {
                $errorCode = $e->errorInfo[1];

                if ($errorCode == 1062) {
                  return redirect()->back()->with('error','Duplicate product_id and order_id plese keep at most one of the doblecated in the order  ');

                } else {
                  return redirect()->back()->with('error', $e);

                }
            }

        }



        public function DeleteCart($id){

            $cart=Cart::Where('id', '=',$id )->first();

            if($cart){

                $cart->delete();
                return redirect()->back()-> with('success','Deleted Forever !');

            }

        }

    }