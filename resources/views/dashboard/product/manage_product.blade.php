@extends('layouts.dashboard')

@section('dashboard')
<div class="content-header"><h3>Add product</h3> <a href="/products" class="btn btn-sm btn-success"><i aria-hidden="true" class="fa fa-list"></i>
	        Manage products
        </a></div>
    <div class="well bs-component">
        <div>
            <form method="POST" enctype="multipart/form-data" class="form-horizontal" action="{{ route('product.store') }}">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="product_name" class="col-sm-4 control-label">
                            Product Name
                            <i aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" class="fa fa-asterisk text-danger require" data-original-title="Required"></i>
                        </label>
                        <div class="col-sm-8">
                            <input type="text" name="name" id="name" placeholder="Product Name" class="form-control">
                            <!---->
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="category_id" class="col-sm-4 control-label">
                            Category Name
                            <i aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" class="fa fa-asterisk text-danger require" data-original-title="Required"></i>
                        </label>
                        <div class="col-sm-8">
                            <select type="text" id="category_name" name="category_name" class="form-control category_id">
                                <option value="0" selected="selected">Select Category</option>
                                <option value="Facial">Facial</option>
                                <option value="System">System</option>
                                </select>
                                <!---->
                            </div>
                        </div>
                        <!---->
                        {{-- <div class="form-group">
                            <label for="supplier_id" class="col-sm-4 control-label">
                            Supplier Name
                            <i aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" class="fa fa-asterisk text-danger require" data-original-title="Required"></i>
                        </label>
                        <div class="col-sm-8">
                            <select name="supplier_id" id="supplier_id" class="form-control">
                                <option value="">Select Supplier</option>
                                <option value="Pfannerstill">Pfannerstill</option>
                                <option value="Baumbach">Baumbach</option>
                                </select>
                                <!---->
                            </div>
                        </div> --}}
                        <div class="form-group">
                            <label for="product_unit" class="col-sm-4 control-label">
                            Product Unit
                            <i aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" class="fa fa-asterisk text-danger require" data-original-title="Required"></i></label>
                            <div class="col-sm-8">
                                <input type="number" name="unit" id="unit" placeholder="Product unit" class="form-control">
                                <!---->
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="product_alertquantity" class="col-sm-4 control-label">
                            Alert Quantity
                            <i aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" class="fa fa-asterisk text-danger require" data-original-title="Required"></i>
                        </label>
                        <div class="col-sm-8">
                            <input type="number" name="quantity" id="quantity" placeholder="Product alertquantity" class="form-control">
                            <!---->
                        </div>
                    </div>
                    <div class="form-group"><label for="product_supplierPrice" class="col-sm-4 control-label">
                            Product Cost
                            <i aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" class="fa fa-asterisk text-danger require" data-original-title="Required">
                                </i>
                            </label>
                            <div class="col-sm-8">
                                <input type="number" min="0" max="10000000" step="any" name="cost" id="cost" placeholder="Cost Price" class="form-control">
                                <!----></div></div> <div class="form-group"><label for="product_image" class="col-sm-4 control-label">
                            Product Image
                        </label>
                        <div class="col-sm-8">
                            <div>
                                <input type="file" accept="image/*" name="image">
                            </div>
                            <!---->
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="product_sellPrice" class="col-sm-4 control-label">
                            Product Price
                            <i aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" class="fa fa-asterisk text-danger require" data-original-title="Required"></i></label>
                            <div class="col-sm-8"><input type="number" min="0" max="10000000" step="any" name="sell" id="sell" placeholder="Sell Price" class="form-control">
                                <!---->
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="product_code" class="col-sm-4 control-label">
                            Code
                        </label> <div class="col-sm-8">
                            <input type="text" name="code" id="code" placeholder="Product Code" class="form-control">
                        </div>
                        <!---->
                    </div>
                        <div class="form-group"><label for="product_tax" class="col-sm-4 control-label">
                            Tax Rate
                        </label>
                        <div class="col-sm-8">
                            <input type="number" min="0" max="100" step="any" name="tax_rate" id="tax_rate" placeholder="Tax Rate" class="form-control">
                            <!---->
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="warehouse_id" class="col-sm-4 control-label">
                            Ware House
                        </label>
                        <div class="col-sm-8">
                            <select type="text" name="ware_house" id="ware_house" class="form-control">
                                <option value="">Select House</option>
                                <option value="rem">rem</option>
                                </select>
                                <!---->
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="product_details" class="col-sm-4 control-label">
                        Product Details
                        </label>
                        <div class="col-sm-8">
                            <textarea id="details" name="details" rows="3" placeholder="Enter ..." class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="product_detailsforinvoice" class="col-sm-4 control-label">
                        Details for Invoice
                        </label>
                        <div class="col-sm-8">
                            <textarea id="invoice_details" name="invoice_details" rows="3" placeholder="Enter ..." class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-4">
                                <button type="submit" class="btn btn-info">Save</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        </div>
                    </div>
            </form>
        </div>
    </div>
@endsection
