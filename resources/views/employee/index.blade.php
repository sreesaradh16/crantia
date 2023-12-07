@extends('layout.app')
@section('css')
<link href="{{asset('assets/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
@endsection
@section('content')
<div class="">
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="row">
                    <div class="col-12">
                        <div class="col-lg-12">
                            <div class="card-header">
                                <h3 class="mb-0 card-title">List Employee</h3>
                            </div>
                            <div class="card-body">
                                <hr>
                                <a href="{{route('employees.create')}}" class="btn btn-block btn-info">
                                    <i class="fa fa-plus"></i> Create Employee </a>
                                </br>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example" class="table table-striped table-bordered text-nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th>Sl.No</th>
                                                    <th>Name</th>
                                                    <th>Age</th>
                                                    <th>Gender</th>
                                                    <th>Department</th>
                                                    <th class="no-sort">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($employees as $key=>$employee)
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td>{{ $employee->name}}</td>
                                                    <td>{{ \Carbon\Carbon::parse($employee->dob)->age }}</td>
                                                    <td>{{ $employee->gender->name ?? '' }}</td>
                                                    <td>{{ $employee->department->name ?? '' }}</td>
                                                    <td>
                                                        <a class="btn btn-sm btn-cyan" href="{{route('employees.edit',[$employee->id])}}"><i class="fa fa-edit"></i> Edit</a>
                                                        <a class="btn btn-sm btn-red btn-action frmsubmit" href="{{route('employees.destroy',[$employee->id])}}" method="DELETE"><i class="fa fa-trash"></i> Delete</a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<!-- DATA TABLE JS-->
<script src="{{asset('assets/plugins/datatable/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/datatable.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/datatable-2.js')}}"></script>
<script src="{{asset('assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>
@endsection