@extends('layouts.dashboard')

@section('dashboard')
    <div class="content-header">
        @if(session()->get('success'))
                <div class="alert alert-success close bg-green" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     {{ session()->get('success') }}
                </div><br />
        @endif
        <h3 class="mb15">
            Add Employee
        </h3>
        <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal">
            <i aria-hidden="true" class="fa fa-plus-square"></i>
	        Add Employees
        </a>
        <a href="#" class="btn btn-info btn-sm">
            <i aria-hidden="true" class="fa fa-file-pdf-o"></i>
	        Export PDF
        </a>
    </div>
{{-- -------- --}}
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Adding Employee</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST" action="{{ route('employees.store') }}">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="employee_fname" class="col-sm-4 control-label">
						Employee Name
                        <i aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" class="fa fa-asterisk text-danger require" data-original-title="Required"></i></label>
                        <div class="col-sm-8">
                            <input type="text" name="name" id="employee_fname" placeholder="Employee Name" class="form-control">
                            <!---->
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="employee_email" class="col-sm-4 control-label">
						Employee Email
                        <i aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" class="fa fa-asterisk text-danger require" data-original-title="Required"></i></label>
                        <div class="col-sm-8">
                            <input type="email" name="email" id="employee_email" placeholder="Employee Email" class="form-control">
                            <!---->
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="employee_phone" class="col-sm-4 control-label">
						Employee Phone
                        <i aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" class="fa fa-asterisk text-danger require" data-original-title="Required"></i></label>
                        <div class="col-sm-8">
                            <input type="tel" name="phone" id="employee_phone" placeholder="Employee Phone" class="form-control">
                            <!---->
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="employee_gender" class="col-sm-4 control-label">
						Gender
                        <i aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" class="fa fa-asterisk text-danger require" data-original-title="Required"></i></label>
                        <div class="col-sm-8">
                            <select type="text" name="gender" id="employee_gender" class="form-control">
                                <option value="">Select Gender</option>
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                            <!---->
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="employee_nid" class="col-sm-4 control-label">
						National ID
                        <i aria-hidden="true" data-toggle="tooltip" data-placement="top" title="" class="fa fa-asterisk text-danger require" data-original-title="Required"></i></label>
                        <div class="col-sm-8">
                            <input type="text" name="national_id" id="employee_nid" placeholder="NID" class="form-control">
                            <!---->
                        </div>
                    </div>
                </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="status_id" class="col-sm-4 control-label">
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
                <label for="employee_birthday" class="col-sm-4 control-label">
                Date of Birth
                </label>
                <div class="col-sm-8">
                    <input type="date" name="dob" id="employee_birthday" placeholder="YYYY-MM-DD" class="form-control">
                    <!---->
                </div>
            </div>
            <div class="form-group">
                <label for="employee_address" class="col-sm-4 control-label">
                Employee Address
                </label>
                <div class="col-sm-8">
                    <textarea id="employee_address" name="address" rows="3" placeholder="Enter ..." class="form-control"></textarea>
                </div>
            </div>
            <div class="form-group">
                    <label for="employee_salary" class="col-sm-4 control-label">
					Salary
                </label>
                <div class="col-sm-8">
                    <input type="number" step="any" name="salary" id="employee_salary" placeholder="Salary" class="form-control">
                    <!---->
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        <div class="col-md-6">
             <div class="form-group">
                <div class="col-sm-8 col-sm-offset-4">
                    <button type="submit" class="btn btn-info">Save</button>
                </div>
            </div>
        </div>
    </div>
    </form>
      </div>
    </div>
  </div>
</div>
{{-- --------- --}}
    <hr>
<div class="well bs-component">
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th>Staff Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>NID</th>
                    <th>DOB</th>
                    <th>Action</th>
                </tr>
            </thead>
            @foreach ($employees as $employ)
            <tbody>
                <tr>
                    <td scope="row">1</td>
                    <td>{{ $employ->name}}</td>
                    <td>{{ $employ->email}}</td>
                    <td>{{ $employ->phone}}</td>
                    <td>{{ $employ->dob}}</td>
                    <td>{{ $employ->national_id}}</td>
                    <td>
                        <form action="{{action('EmployeesController@destroy', $employ['id'])}}" method="post">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
</div>
@endsection
