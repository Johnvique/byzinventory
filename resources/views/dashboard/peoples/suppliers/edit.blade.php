@extends('layouts.dashboard')
@section('dashboard')
        <div class="content-header">
        @if(session()->get('success'))
            <div class="alert alert-success close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    {{ session()->get('success') }}
            </div><br />
        @endif
        <h3>Edit Supplier</h3>
        </div>
        <div class="row">
            <div class="col-md-6">
                <form class="form-horizontal" method="POST" action="{{ action('SuppliersController@update', $supplier) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                                        <label for="supplier_name" class="col-sm-4 control-label">
                            Supplier Name
                            <i aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" class="fa fa-asterisk text-danger require" data-original-title="Required"></i></label>
                            <div class="col-sm-8">
                                <input type="text" name="name" id="supplier_name" value="{{$supplier->name}}" placeholder="Supplier Name" class="form-control">
                                <!---->
                            </div>
                    </div>
                    <div class="form-group">
                        <label for="supplier_phone" class="col-sm-4 control-label">
                            Supplier Phone
                            <i aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" class="fa fa-asterisk text-danger require" data-original-title="Required"></i>
                        </label>
                            <div class="col-sm-8">
                                <input type="tel" name="phone" id="supplier_phone" value="{{$supplier->phone}}" placeholder="Supplier Phone" class="form-control">
                                <!---->
                            </div>
                    </div>
                    <div class="form-group"><label for="supplier_email" class="col-sm-4 control-label">
                            Supplier Email
                            <i aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" class="fa fa-asterisk text-danger require" data-original-title="Required"></i></label>
                            <div class="col-sm-8">
                                <input type="email" name="email" id="supplier_email" value="{{$supplier->email}}" placeholder="Supplier Email" class="form-control">
                                <!---->
                            </div>
                    </div>
                        {{-- <div class="form-group"><label for="supplier_company" class="col-sm-4 control-label">
                            Supplier Company
                            <i aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" class="fa fa-asterisk text-danger require" data-original-title="Required"></i></label>
                            <div class="col-sm-8"><input type="text" name="company" id="supplier_company" placeholder="Supplier Company" class="form-control">
                                <!----></div></div></div> <div class="col-sm-6"><div class="form-group"><label for="status_id" class="col-sm-4 control-label">
                            Status
                            <i aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" class="fa fa-asterisk text-danger require" data-original-title="Required"></i></label>
                            <div class="col-sm-8">
                                <select type="text" id="status_id" name="status" class="form-control">
                                    <option value="">Select Status</option>
                                    <option value="0">Inactive</option>
                                    <option value="1">Active</option>
                                </select>
                                <!---->
                            </div>
                        </div> --}}
                    <div class="form-group">
                                <label for="address" class="col-sm-4 control-label">
                        Supplier Address
                        </label>
                        <div class="col-sm-8">
                            <input id="address" name="address" value="{{$supplier->address}}" rows="2" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success" type="submit">Update Info</button>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <h1 style="font-size: 170px;" class="text-success"><i class="fas fa-shipping-fast"></i></h1>
            </div>
        </div>
@endsection
