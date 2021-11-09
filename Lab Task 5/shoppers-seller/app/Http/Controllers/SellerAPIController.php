<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seller;
use App\Models\Operation;
use App\Models\Sale;

class SellerAPIController extends Controller
{
    //

    public function sales(){
       
        // $operations=Operation::all()
        $sales = Sale::orderBy('time', 'DESC')->get();
        //return view('sales')->with('sales',$sales);
        return $sales;
        // $operations=Operation::all()->orderBy('name')->get(); //retrieves all data from database
        // return view('operation')->with('operations',$operations);
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
            }
}
