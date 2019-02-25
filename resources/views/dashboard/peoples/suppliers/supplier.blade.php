@extends('layouts.dashboard')

@section('dashboard')
        <div class="content-header">
            @if(session()->get('success'))
                <div class="alert alert-success close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     {{ session()->get('success') }}
                </div><br />
            @endif
            <h3>Manage Supplier</h3>
            <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModal">
                <i aria-hidden="true" class="fa fa-plus-square"></i>
	        Add Supplier
            </button>
            <a href="#" class="btn btn-info btn-sm">
                <i aria-hidden="true" class="fa fa-file-excel-o"></i>
	        Export Excel
            </a>
            <a href="#" class="btn btn-info btn-sm">
                <i aria-hidden="true" class="fa fa-file-pdf-o"></i>
			PDF
            </a>
        <button onclick="PrintDiv()" class="btn btn-info btn-sm"><i aria-hidden="true" class="fa fa-print"></i>
            Print
        </button>
    </div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Supplier</h4>
      </div>
      <div class="modal-body">
          <div class="well bs-component">
              <div>
                  <form class="form-horizontal" method="POST" action="{{ route('suppliers.store') }}">
                      @csrf
                      <div class="row">
                          <div class="col-sm-6">
                    <div class="form-group">
                                  <label for="supplier_name" class="col-sm-4 control-label">
						Supplier Name
                        <i aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" class="fa fa-asterisk text-danger require" data-original-title="Required"></i></label>
                        <div class="col-sm-8">
                            <input type="text" name="name" id="supplier_name" placeholder="Supplier Name" class="form-control">
                            <!---->
                        </div>
                    </div>
                    <div class="form-group">
                                <label for="supplier_phone" class="col-sm-4 control-label">
						Supplier Phone
                        <i aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" class="fa fa-asterisk text-danger require" data-original-title="Required"></i></label>
                        <div class="col-sm-8">
                            <input type="tel" name="phone" id="supplier_phone" placeholder="Supplier Phone" class="form-control">
                            <!---->
                        </div>
                    </div>
                    <div class="form-group"><label for="supplier_email" class="col-sm-4 control-label">
						Supplier Email
                        <i aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" class="fa fa-asterisk text-danger require" data-original-title="Required"></i></label>
                        <div class="col-sm-8"><input type="email" name="email" id="supplier_email" placeholder="Supplier Email" class="form-control">
                            <!----></div>
                    </div>
                    <div class="form-group"><label for="supplier_company" class="col-sm-4 control-label">
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
                        </div>
                        <div class="form-group">
                            <label for="supplier_address" class="col-sm-4 control-label">
					Supplier Address
                    </label>
                    <div class="col-sm-8">
                        <textarea id="supplier_address" name="address" rows="2" placeholder="Enter ..." class="form-control"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="supplier_description" class="col-sm-4 control-label">
					Supplier Details
                    </label>
                    <div class="col-sm-8">
                        <textarea id="supplier_description" name="details" rows="2" placeholder="Enter ..." class="form-control">
                            </textarea>
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
    <hr>
    <div class="container">

                <div class="row" style="margin-bottom: 5px;">
            <div class="col-sm-6">Show
                <select name="" id="">
                    <option value="5" selected="selected">5</option>
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                </select>
            </div>
             <div class="col-sm-6">
                 <div class="col-sm-5"></div>
                 <div class="col-sm-7">
                     <div class="input-group">
                         <input type="search" placeholder="Search" class="form-control">
                        </div>
                </div>
            </div>
            </div>
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr class="bg-info">
                        <th>Sl</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Company</th>
                        <th>Status</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                </thead>
                @foreach($suppliers as $supplier)
                <tbody>
                    <tr>
                        <td>SP{{$supplier->id}}</td>
                        <td>{{$supplier->name}}</td>
                        <td>{{$supplier->email}}</td>
                        <td>{{$supplier->phone}}</td>
                        <td>{{$supplier->company}}</td>
                        <td> {{$supplier->status}}</td>
                        <td>{{$supplier->address}}</td>
                        <td>
                            <div class="row">
                                <div class="col-sm-6" style="width:0%;">
                                    <a href="{{action('SuppliersController@edit', $supplier['id'])}}" class="btn btn-xs btn-success"><i aria-hidden="true" class="fa fa-pencil-square-o">
                                        </i></a>
                                </div>
                                <div class="col-sm-6">
                                    <form action="{{action('SuppliersController@destroy', $supplier['id'])}}" method="post">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="btn btn-xs btn-danger" type="submit">
                                            <i aria-hidden="true" class="fa fa-trash-o"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
                @endforeach
    </table>

    </div>
@endsection
