<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use App\Employee;
use App\Supplier;
use App\Customer;
use PDF;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = product::all();
        $suppliers = Supplier::all();
        $customers = Customer::all();
        $employees = Employee::count();

        return view('dashboard.index' , compact('products','employees','suppliers','customers'));
    }

    public function generatePDF()
    {
        $data = ['title' => 'Welcome to HDTuto.com'];
        $pdf = PDF::loadView('myPDF', $data);

        return $pdf->stream('itsolutionstuff.pdf');
    }
}
