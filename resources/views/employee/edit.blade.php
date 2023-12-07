@extends('layout.app')
@section('employee','active')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="border-0">
                    <div class="tab-content">
                        <div class="tab-pane active show">
                            <div id="profile-log-switch">
                                <div class="card-header">
                                    <h3 class="card-title">Edit Employee</h3>
                                </div>
                                <br>
                                <form action="{{route('employees.update',[$employee->id])}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    {{ method_field('PUT') }}
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">Name *</label>
                                                <input type="text" class="form-control" name="name" value="{{ $employee->name }}" placeholder="Name" required>
                                            </div>
                                            @if ($errors->has('name'))
                                            <span class="text-danger errbk">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">Dob *</label>
                                                <input type="date" class="form-control" name="dob" value="{{ $employee->dob }}" placeholder="dob" required>
                                            </div>
                                            @if ($errors->has('dob'))
                                            <span class="text-danger errbk">{{ $errors->first('dob') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">Gender *</label>
                                                <select class="form-control select2-show-search" name="gender_id">
                                                    <option value="">Choose Gender</option>
                                                    @foreach($genders as $gender)
                                                    <option value="{{$gender->id}}" {{ $gender->id == $employee->gender_id ? 'selected' : '' }}>{{$gender->name}}</option>
                                                    @endforeach
                                                </select>
                                                <div class="name">
                                                    @if ($errors->has('gender_id'))
                                                    <span class="text-danger errbk">{{ $errors->first('gender_id') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">Department *</label>
                                                <select class="form-control select2-show-search" name="department_id">
                                                    <option value="">Choose Department</option>
                                                    @foreach($departments as $department)
                                                    <option value="{{$department->id}}" {{ $department->id == $employee->department_id ? 'selected' : '' }}>{{$department->name}}</option>
                                                    @endforeach
                                                </select>
                                                <div class="name">
                                                    @if ($errors->has('department_id'))
                                                    <span class="text-danger errbk">{{ $errors->first('department_id') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <center>
                                                    <button type="submit" class="btn btn-raised btn-info">Update</button>
                                                    <a class="btn btn-danger" href="{{ route('employees.index') }}">Cancel</a>
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection