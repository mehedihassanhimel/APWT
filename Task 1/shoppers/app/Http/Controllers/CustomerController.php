<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    //
    public function Create(){
        return view('pages.customer.create');
    }
    public function CreateSubmit(Request $request){
      
    // Validator::make('name')
    //request validate method---->
    //    $validate = $request->validate([
    //         'name'=>'required|min:2|max:10',
    //         'email'=>'required'
    //     ],
    //     [
    //         'name.required'=>'Please enter your name',
    //         'name.min'=>'Name must be at least 2 characters'
    //     ]    
    // );
    //-->Class Validate Method
        $this->validate(
            $request,
            [
            'name'=>'required|min:2',
            'email'=>'required'
            ],
            [
            'name.required'=>'Please enter your name',
            'name.min'=>'Name must be at least 2 characters'
            ]
        );



        // $name = $request->name;
        // $email = $request->email;
        return "Ok";
    }
    public function list() {
        $customers =array();
        for($i=0;$i<10;$i++){
            $customer=array(
                "name"=>"Customer".($i+1),
                "id"=>($i+1),
                "dob"=>"13-12-1990"
            );
            $customers[]=(object)$customer;
        }
        return view('pages.customer.list')->with('customers',$customers);
    }
    public function Edit(Request $request){
        return $request->id;
    }
}
