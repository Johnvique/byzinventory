<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use Auth;
use PDF;
class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('dashboard.add_product')->with('products', product::all());
        $products = product::all();
        return view('dashboard.product.add_product', compact('products', 'productCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.manage_products');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'category_name' => 'required',
            'unit'=> 'required',
            'quantity'=> 'required',
            'cost'=> 'required',
            'image'=> 'required',
            'sell'=> 'required',
            'code'=> 'required',
            'tax_rate'=> 'required',
            'ware_house'=> 'required',
            'details'=> 'required',
            'invoice_details' => 'required',
        ]);
        if ($request->hasFile('image')) {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('image')->storeAs('public/products', $fileNameToStore);
        } else {
            $fileNameToStore = 'default.png';
        }

        $product = new product;

        $product->user_id = Auth::id();
        $product->name=$request->get('name');
        $product->category_name =$request->get('category_name');
        $product->quantity =$request->get('quantity');
        $product->cost =$request->get('cost');
        $product->image =$request->get('image');
        $product->sell=$request->get('sell');
        $product->code =$request->get('code');
        $product->unit =$request->get('unit');
        $product->tax_rate = $request->get('tax_rate');
        $product->ware_house = $request->get('ware_house');
        $product->details = $request->get('details');
        $product->invoice_details = $request->get('invoice_details');
        $product->image = $fileNameToStore;
        $product->save();

        return view('dashboard/product/add_product')->with('success', 'New Product Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = product::find($id);
        return view('dashboard.product.edit',compact('product', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->update([
            'name'=>$request->name,
            'cost'=>$request->cost,
            'price'=>$request->price,
            'rate'=>$request->rate,
            'warehouse'=>$request->warehouse,
        ]);
        return redirect('products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = product::find($id);
        $product->delete();
        return redirect('products')->with('success', 'Information has been  deleted');

        // $applicant = Applicant::find($id);
        // $applicant->delete();
        // return redirect('dashboard.manage_products')->with('success', 'Information has been  deleted');
    }

    public function productPdf(){
        $data = product::all();
        $pdf = PDF::loadView('dashboard/product/pdf',compact('data'));
        return $pdf->stream('Products.pdf');
    }
}
