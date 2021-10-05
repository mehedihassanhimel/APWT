<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class routeController extends Controller
{
    //
    public function home() {
        return view('home');
    }
    public function ourTeam() {
        $names = array("Cody", "AngryPicnic","Dawson","BigDawsTV"); 
        return view('ourTeam')->with('names',$names);
    }
    public function product() {
        $products = array("T-Shirt", "Polo Shirt", "Pants", "Sweat Shirt"); 
        return view('product')->with('products', $products);
    }
    public function about() {
        $aboutString="We provide premium quality clothing 24x7 all over the country";
        return view('about')->with('aboutString', $aboutString);
    }
    public function contact() {
        $number="+15632567562";
        $address="Gulshan, Dhaka-1212";
        return view('contact')->with('number', $number)->with('address',$address);
    }
    

}
