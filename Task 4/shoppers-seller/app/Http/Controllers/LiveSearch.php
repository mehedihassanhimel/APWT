<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LiveSearch extends Controller
{
    function index()
    {
     return view('live_search');
    }

    function action(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('sales')
         ->where('product_name', 'like', '%'.$query.'%')
         ->orWhere('qty', 'like', '%'.$query.'%')
         ->orWhere('earning', 'like', '%'.$query.'%')
         ->orWhere('seller_id', 'like', '%'.$query.'%')
         ->orderBy('product_name', 'desc')
         ->get();
         
      }
      else
      {
       $data = DB::table('sales')
         ->orderBy('product_name', 'desc')
         ->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
         <td>'.$row->product_name.'</td>
         <td>'.$row->qty.'</td>
         <td>'.$row->earning.'</td>
        </tr>
        ';
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }
}