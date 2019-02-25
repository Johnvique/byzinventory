@extends('layouts.dashboard')

@section('dashboard')
<div class="container">
    <div class="content-header">
        <h3>
            Manage Customers
        </h3>
        <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#cmodal">
            <i aria-hidden="true" class="fa fa-plus-square"></i>
	        Add Customer
        </a>
        <a href="#" class="btn btn-info btn-sm">
            <i aria-hidden="true" class="fa fa-file-excel-o"></i>
	        Export Excel
        </a>
        <a href="#" class="btn btn-info btn-sm"><i aria-hidden="true" class="fa fa-file-pdf-o"></i>
	        PDF
        </a>
        <button onclick="PrintDiv()" class="btn btn-info btn-sm"><i aria-hidden="true" class="fa fa-print"></i>
	         Print
        </button>
    </div>
    <div class="modal fade" id="cmodal" tabindex="-1" role="dialog" aria-labelledby="myModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModal">Add Supplier</h4>
                </div>
                <div class="modal-body">
                    <div class="well bs-component">
                        <div>
        <form class="form-horizontal" method="POST" action="{{ route('customers.store') }}">
        @csrf
            <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="customer_name" class="col-sm-4 control-label">
                    Customer Name
                    <i aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" class="fa fa-asterisk text-danger require" data-original-title="Required"></i>
                </label>
                    <div class="col-sm-8">
                        <input type="text" name="name" id="customer_name" placeholder="Customer Name" class="form-control">
                        <!---->
                    </div>
                </div>
                <div class="form-group">
                    <label for="customer_phone" class="col-sm-4 control-label">
						Customer Phone
                        <i aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" class="fa fa-asterisk text-danger require" data-original-title="Required"></i>
                    </label>
                    <div class="col-sm-8">
                        <input type="tel" name="phone" id="customer_phone" placeholder="Customer Phone" class="form-control">
                        <!---->
                    </div>
                </div>
                <div class="form-group">
                    <label for="customer_address" class="col-sm-4 control-label">
					Customer Address
                    </label>
                    <div class="col-sm-8">
                        <textarea id="customer_address" name="address" rows="3" placeholder="Enter ..." class="form-control"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="customer_email" class="col-sm-4 control-label">
						Customer Email
                        <i aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" class="fa fa-asterisk text-danger require" data-original-title="Required"></i>
                    </label>
                    <div class="col-sm-8">
                        <input type="email" name="email" id="customer_email" placeholder="customer Email" class="form-control">
                        <!---->
                    </div>
                </div>
                <div class="form-group">
                    <label for="status_id" class="col-sm-4 control-label">
						Status
                        <i aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" class="fa fa-asterisk text-danger require" data-original-title="Required"></i>
                    </label>
                    <div class="col-sm-8">
                        <select type="text" id="status_id" name="status" class="form-control">
                            <option value="">Select Status</option>
                            <option value="0">Inactive</option>
                            <option value="1">Active</option>
                        </select>
                        <!---->
                    </div>
                </div>
                <div class="form-group">
                    <label for="customer_description" class="col-sm-4 control-label">
					Customer Details
                    </label>
                    <div class="col-sm-8">
                        <textarea id="customer_description" name="description" rows="3" placeholder="Enter ..." class="form-control"></textarea>
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
            </div>
                <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
            </div>
        </div>
    </div>
<div style="height: 3px;background-color: #00A65A;margin:10px;"></div>
    <div class="row">
        <div class="col-sm-12">
        <div>
            <div class="row">
                <div class="col-sm-6">
		            Show
			<select name="" id="">
                <option value="5" selected="selected">5</option>
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
            </select>
        </div>
        <div class="col-sm-6">
            <div class="col-sm-5">
                </div>
                <div class="col-sm-7">
                    <div class="input-group col-md-12">
                        <input type="search" placeholder="Search" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr class="info">
                    <th style="width: 5%;">Sl</th>
                    <th style="width: 15%;">Customer Name</th>
                    <th style="width: 15%;">Customer Email</th>
                    <th style="width: 15%;">Customer Phone</th>
                    <th style="width: 10%;">Status</th>
                    <th style="width: 28%;">Customer Address</th>
                    <th style="width: 12%;">Action</th>
                </tr>
            </thead>
            @foreach ($customers as $customer)
            <tbody>
                <tr>
                    <td>{{$customer->id}}</td>
                    <td>{{$customer->name}}</td>
                    <td>{{$customer->email}}</td>
                    <td>{{$customer->phone}}</td>
                    <td>{{$customer->status}}</td>
                    <td>{{$customer->address}}</td>
                    <td><a href="/customer/21" class="btn btn-xs btn-success">
                        <i aria-hidden="true" class="fa fa-folder-open">
                            </i>
                        </a>
                        <a href="/customer/21/edit" class="btn btn-xs btn-success">
                            <i aria-hidden="true" class="fa fa-pencil-square-o"></i>
                        </a>
                        <button class="btn btn-xs btn-danger">
                            <i aria-hidden="true" class="fa fa-trash-o"></i>
                        </button>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
        <ul class="pagination">
            <li style="display: none;">
                <a href="#" aria-label="Previous" rel="prev">
                    <span aria-hidden="true">Previous «</span>
                </a>
            </li>
            <li>
                <a href="#" aria-label="Next" rel="next">
                    <span aria-hidden="true">Next »</span>
                </a>
            </li>
        </ul>
    </div>
</div>
</div>
</div>
@endsection
