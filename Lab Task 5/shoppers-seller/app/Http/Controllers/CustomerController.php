<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Sale;
use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\Operation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;

class CustomerController extends Controller
{

    //
    public function product()
    {   $products = Product::all();
        return view('customer.products', compact('products'));
        //return view('pages.product.products');
    }

    public function cart()
    {
        return view('customer.cart');
    }
   
    public function addToCart($id)
    {
        $product = Product::find($id);

        if(!$product) {

            abort(404);

        }

        $cart = session()->get('cart');

        // if cart is empty then this the first product
        if(!$cart) {

            $cart = [
                    $id => [
                        "name" => $product->name,
                        "quantity" => 1,
                        "price" => $product->price,
                        "image" => $product->image,
                        "seller_id" => $product->seller_id
                    ]
            ];

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {

            $cart[$id]['quantity']++;

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');

        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
            "image" => $product->image,
            "seller_id" => $product->seller_id
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
    public function update(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);

            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function remove(Request $request)
    {
        if($request->id) {

            $cart = session()->get('cart');

            if(isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }

            session()->flash('success', 'Product removed successfully');
        }
    }

    public function checkout(Request $request)
    {
        // if(!session()->has('user'))
        // {
        //     return redirect('seller/login');
        // }
        $products = session()->get('cart');
        $customer_id = session()->get('user_id');
        $order = new Order();
        $order->customer_id = $customer_id;
        $order->comment= "Order Placed";
        $order->price = $request->total_price;
        $order->save();

        // $pquantity = new product();

        // if($pquantity->quantity <=0){
        //     return redirect()->back()->with('success', 'Product purchase Failed!');
        // }
        // else{



        // }
        


        foreach($products as $product){
            $product=(object)$product;
            

            // $productUpdate = Product::find($product->seller_id);
            // $productUpdate = (object)$productUpdate;
            // $newQuantity = $product->quantity - $product->quantity; 
            // $productUpdate->quantity = $newQuantity; 
            // $productUpdate->save(); 

            // $affected = DB::table('products')
            //   ->where('seller_id', $product->seller_id)
            //   ->update(['quantity' =>'quantity'- $product->quantity]); 

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
