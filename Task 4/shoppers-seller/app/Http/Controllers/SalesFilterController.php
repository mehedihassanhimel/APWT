<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SalesFilterController extends Controller
{
    function index(Request $request)
    {
     if(request()->ajax())
     {
      if(!empty($request->from_date))
      {
       $data = DB::table('sales')
         ->whereBetween('time', array($request->from_date, $request->to_date))
         ->get();
      }
      else
      {
       $data = DB::table('sales')
         ->get();
      }
      return datatables()->of($data)->make(true);
     }
     return view('salesfilter');
    }
}

?>
