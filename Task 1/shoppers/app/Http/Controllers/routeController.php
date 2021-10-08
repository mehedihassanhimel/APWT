<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class routeController extends Controller
{
    //
    public function home() {
        return view('pages.home');
    }
    public function ourTeam() {
        $names = array("Cody", "AngryPicnic","Dawson","BigDawsTV"); 
        return view('pages.ourTeam')->with('names',$names);
    }
    public function product() {
        $products = array("T-Shirt", "Polo Shirt", "Pants", "Sweat Shirt"); 
        return view('pages.product')->with('products', $products);
    }
    public function about() {
        $aboutString="We provide premium quality clothing 24x7 all over the country";
        return view('pages.about')->with('aboutString', $aboutString);
    }
    public function contact() {
        $number="+15632567562";
        $address="Gulshan, Dhaka-1212";
        return view('pages.contact')->with('number', $number)->with('address',$address);
    }
    public function sampleLayout() {
        $number="+15632567562";
        $address="Gulshan, Dhaka-1212";
        return view('pages.sampleLayout');
    }
    

}
