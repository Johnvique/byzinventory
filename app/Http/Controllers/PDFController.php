<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PDFController extends Controller
{
    function index(){
        $customer_data = $this->get_customer_data();
        return view ('customers')->with('customer_data',
        $customer_data);
    }

    function get_customer_data(){
        $customer_data = DB::table('customers')
                        ->limit(10)
                        ->get();
        return $customer_data;
    }
    function pdf(){
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->
                convert_customer_data_to_html());
    }

    function convert_customer_data_to_html ()
    {
        $customer_data = $this->get_customer_data();

    }
}
