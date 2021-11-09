<?php

namespace App\Http\Controllers;
//namespace App\Http\Middleware;
//use App\Http\Middleware\AuthenticateSeller;

use Redirect;
use Illuminate\Http\Request;
use App\Models\Seller;
use App\Models\Operation;
use App\Models\Sale;
//use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Validator;

class SellerController extends Controller
{
    

    
    //
    public function sales(){
       
        // $operations=Operation::all()
        $sales = Sale::orderBy('time', 'DESC')->get();
        return view('sales')->with('sales',$sales);
        // $operations=Operation::all()->orderBy('name')->get(); //retrieves all data from database
        // return view('operation')->with('operations',$operations);
        }
    public function operation(){
       
        // $operations=Operation::all()
        $operations = Operation::orderBy('time', 'DESC')->get();
        return view('operation')->with('operations',$operations);
        // $operations=Operation::all()->orderBy('name')->get(); //retrieves all data from database
        // return view('operation')->with('operations',$operations);
        }
        // public function operation()
        // {
        //     $operations = Operation::select("*")
        //     ->where("status", 1)
        //                     ->orderBy("name", "desc")
        //                     ->get();
      
        //     dd($operations);
        // }


    public function registration(){
        return view('seller.registration');
    }
    public function login(){
        // if(session()->has('user') && session()->get('user')!="")
        // {
        //     return redirect('/home');
        // }
        // else{
        //return redirect('/customer/login');
        return view('seller.login');
        // }
        
    }
    public function home(){
        if(session()->has('user') && session()->get('user')!="")
        {
            return view('/home');

        }
        else{
            return redirect('/seller/login');
        }
        
    }

    public function loginSubmit(Request $request)
{   $this->validate(
    $request,
    [
 
    'id'=>'required|min:1',
    //Password contains at least one uppercase/lowercase letters and one number
    'password' => 'required|min:6|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'
    ]
    
);

    $id = $request->id;

    $seller = Seller::where('seller_id',$id)->first();
    $data=$seller->name;
    if(Hash::check($request->password, $seller->password))
    {  
       $request->session()->put('user',$data);
       $request->session()->put('user_id',$request->id);    
      return redirect('/home');
   }
   else{
    return back()->withErrors(['loginFailed'=>'Wrong ID or Password']);
        //return Redirect::back()->withErrors(['msg123' => 'Login Failed']);
      // return view('pages.customer.login');
       
   }

}
    public function registrationSubmit(Request $request){
      
    //-->Class Validate Method
        $this->validate(
            $request,
            [
            'name'=>'required|min:2|max:20',
            'id'=>'required|min:1',
            //Password contains at least one uppercase/lowercase letters and one number
            'password' => 'required|min:6|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
            'dob'=>'required|date|before:-13 years',
            'email'=>'required|email|max:255',
            'phone'=>'required|regex:/(01)[0-9]{9}/'
            ],
            [
            'name.required'=>'Please enter your name',
            'name.min'=>'Name must be at least 2 characters'
            ]
        );

        //DB
        $var = new Seller();
        $var->name=$request->name;  
        $var->seller_id=$request->id;
        $var->password=Hash::make($request->password);
        $var->dob=$request->dob;
        $var->email=$request->email;
        $var->phone=$request->phone;
        $var->save();


        return redirect('/seller/login');
    }
    public function list() {
        // $customers =array();
        // for($i=0;$i<10;$i++){
        //     $customer=array(
        //         "name"=>"Customer".($i+1),
        //         "id"=>($i+1),
        //         "dob"=>"13-12-1990"
        //     );
        //     $customers[]=(object)$customer;
        // }
        
        $sellers=Seller::all(); //retrieves all data from database
        return view('seller.list')->with('sellers',$sellers);
    }
    public function Edit(Request $request){
        //return $request->id;
        $id = $request->id;
        $seller = Seller::where('id',$id)->get();  //first(); where('id','>=',$id)->get()
        return $seller;
    
    }
}
