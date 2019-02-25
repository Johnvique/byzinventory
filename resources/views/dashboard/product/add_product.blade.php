@extends('layouts.dashboard')

@section('dashboard')
    <div class="content-header"><h3>
            Manage Products
        </h3> <a href="{{url('manage_product')}}" class="btn btn-info btn-sm"><i aria-hidden="true" class="fa fa-plus-square"></i>
	        Add Product
        </a> <a href="http://inventory.wardantech.com/product/exportExcel" class="btn btn-info btn-sm"><i aria-hidden="true" class="fa fa-file-excel-o"></i>
	        Export Excel
        </a>
        <a href="{{url('product/pdf')}}" class="btn btn-info btn-sm"><i aria-hidden="true" class="fa fa-file-pdf-o"></i>
	        PDF
        </a>
        <button onclick="PrintDiv()" class="btn btn-info btn-sm"><i aria-hidden="true" class="fa fa-print"></i>
	        Print( {{count($product)}} )
        </button>
    </div>
   <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary" style="margin-top: 20px">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="example1_length"><label>Show <select name="example1_length" aria-controls="example1" class="form-control input-sm">
                  <option value="10">10</option>
                  <option value="25">25</option>
                  <option value="50">50</option>
                  <option value="100">100</option>
                </select> entries</label>
            </div>
        </div>
        <div class="col-sm-6">
            <div id="example1_filter" class="dataTables_filter">
                <label>Search:
                    <input type="search" class="form-control input-sm" placeholder="" aria-controls="example1"></label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
            <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Units</th>
                    <th>Quantity</th>
                    <th>Cost</th>
                    <th>Tax Rate</th>
                    <th>Ware House</th>
                    <th>Code</th>
                    <th>Status</th>
                </tr>
                </thead>
 @forelse($products as $product)
                <tbody>
                <tr>
                    <td>
                    <img src="storage/products/{{ $product->image }}" style="width: 60px; height: 50px"/>
                    </td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->category_name}}</td>
                    <td>{{$product->unit}}</td>
                    <td>{{$product->quantity}}</td>
                    <td>{{$product->cost}}</td>
                    <td>{{$product->tax_rate}}</td>
                    <td>{{$product->ware_house}}</td>
                    <td>{{$product->code}}</td>
                    <td>
                        <div class="row">
                            <div class="col-sm-6" style="width:0%;">
                                <a href="{{action('ProductController@edit', $product['id'])}}" class="btn btn-xs btn-success">
                                    <i aria-hidden="true" class="fa fa-pencil-square-o">
                                    </i></a>
                            </div>
                            <div class="col-sm-6">
                                <form action="{{action('ProductController@destroy', $product['id'])}}" method="post">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
               </tbody>
               @empty
                    <p>No data found!</p>
 @endforelse
                <tfoot>
                <tr><th rowspan="1" colspan="1">Rendering engine</th><th rowspan="1" colspan="1">Browser</th><th rowspan="1" colspan="1">Platform(s)</th><th rowspan="1" colspan="1">Engine version</th><th rowspan="1" colspan="1">CSS grade</th></tr>
                </tfoot>
              </table></div></div><div class="row"><div class="col-sm-5"><div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="example1_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="example1_previous"><a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0">2</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="3" tabindex="0">3</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="4" tabindex="0">4</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="5" tabindex="0">5</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="6" tabindex="0">6</a></li><li class="paginate_button next" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0">Next</a></li></ul></div></div></div></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
@endsection
