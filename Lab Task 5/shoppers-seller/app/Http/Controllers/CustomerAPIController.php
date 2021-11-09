<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Sale;
use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\Operation;
use Carbon\Carbon;
use DB;

use Illuminate\Http\Request;

class CustomerAPIController extends Controller
{
    //
    public function checkout(Request $request)
    {

        $products = session()->get('cart');
        $customer_id = session()->get('user_id');
        $order = new Order();
        $order->customer_id = $customer_id;
        $order->comment= "Order Placed";
        $order->price = $request->total_price;
        $order->save();
        


        foreach($products as $product){
            $product=(object)$product;
            

                $qty=DB::table('products')->where('name', $product->name)->value('quantity');
                $qty-=$product->quantity;   
                if($qty<0){
                    $delete = Product::where('name', $product->name)->first();
                    $delete->delete();
                    $request->session()->forget('cart');
                    return redirect()->back()->with('success', 'Product is out of stock!');
                }

                 
                $affected = DB::table('products')
              ->where('name', $product->name)
              ->update(['quantity' =>$qty]); 
                


            $order_details= new Orderdetail();
            $order_details->order_id=$order->id;
            $order_details->product_name=$product->name;
            $order_details->qty=$product->quantity;
            $order_details->unit_price=$product->price;
            $order_details->seller_id=$product->seller_id;
            $order_details->save();
            $sales = new Sale();
            $sales->seller_id=$product->seller_id;
            $sales->product_name=$product->name;
            $sales->qty=$product->quantity;
            $sales->earning=$product->quantity*$product->price;
            $date = Carbon::now();
        //Get date and time
            $sales->time=$date->toDateTimeString();
            $sales->save();
        
        
            //operation
        $operation= new Operation();
        $operation->name=$product->name;
        $operation->operation="Sold ". $product->quantity;
        $date = Carbon::now();
        //Get date and time
        $operation->time=$date->toDateTimeString();
        $operation->save();

           // var_dump($product);exit;
        }

        $request->session()->forget('cart');
        //session()->flash('cart');
        return redirect()->back()->with('success', 'Product purchased successfully!');
        // return view('customer.products');
        
    }

}
