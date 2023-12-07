@extends('layout.app')
@section('employee','active')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="border-0">
                    <div class="tab-content">
                        <div class="tab-pane active show" id="tab-51">
                            <div id="profile-log-switch">
                                <div class="media-heading">
                                    <h5><strong>Create Employee</strong></h5>
                                </div>
                                <br>
                                <form action="{{route('employees.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">Name *</label>
                                                <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="Name" required>
                                            </div>
                                            @if ($errors->has('name'))
                                            <span class="text-danger errbk">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">Dob *</label>
                                                <input type="date" class="form-control" name="dob" value="{{old('dob')}}" placeholder="dob" required>
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
                                                    <option value="{{$gender->id}}" {{old('gender') == $gender->id ? 'selected' : ''}}>{{$gender->name}}</option>
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
                                                    <option value="{{$department->id}}" {{old('department_id') == $department->id ? 'selected' : ''}}>{{$department->name}}</option>
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
                                                    <button type="submit" class="btn btn-raised btn-info">Submit</button>
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