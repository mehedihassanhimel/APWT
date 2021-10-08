<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
//use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    //
    public function registration(){
        return view('pages.customer.registration');
    }
    public function login(){
        return view('pages.customer.login');
    }
    // public function loginSubmit(Request $request){
    //     $id = $request->id;
    //     $password = $request->password;
    //     $customer = Customer::where('id',$id)->get();  //first(); where('id','>=',$id)->get()
    //     if($customer->id==$id && $customer->password==$password){
    //         return "Login Successfully";
    //     }
    //     else {
    //         return "Login Failed";
    //     }
        
    // }
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
    $customer = Customer::where('customer_id',$id)->first();
    if(Hash::check($request->password, $customer->password)){
        return view('/pages/home');
    }
    else{
        return "Login Failed";
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
        $var = new Customer();
        $var->name=$request->name;
        $var->customer_id=$request->id;
        $var->password=Hash::make($request->password);
        $var->dob=$request->dob;
        $var->email=$request->email;
        $var->phone=$request->phone;
        $var->save();


        return "Account Created. Go to Login Page";
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
        
        $customers=Customer::all(); //retrieves all data from database
        return view('pages.customer.list')->with('customers',$customers);
    }
    public function Edit(Request $request){
        //return $request->id;
        $id = $request->id;
        $customer = Customer::where('id',$id)->get();  //first(); where('id','>=',$id)->get()
        return $customer;
    
    }
}
