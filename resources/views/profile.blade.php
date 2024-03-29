@extends('layouts.app')
@section('content')

<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                <span class="font-weight-bold">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</span><span class="text-black-50">{{ auth()->user()->email }}</span><span> </span>
            </div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">General Information</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">First Name</label><input type="text" class="form-control" value="{{ auth()->user()->first_name }}"></div>
                    <div class="col-md-6"><label class="labels">Last Name</label><input type="text" class="form-control" value="{{ auth()->user()->last_name }}"></div>
                </div>
                <div class="row mt-3">
                    
                    <div class="col-md-12"><label class="labels">Gender</label><input type="text" class="form-control" value="{{ auth()->user()->gender }}"></div>
                    <div class="col-md-12"><label class="labels">Birthday</label><input type="text" class="form-control" value="{{ auth()->user()->date_of_birth }}"></div>
                    <div class="col-md-12"><label class="labels">User Role</label><input type="text" class="form-control" value="{{ $role_name }}"></div>
                    <div class="col-md-12"><label class="labels">Employment Type</label><input type="text" class="form-control" value="{{ $employment_name }}"></div>
                    <div class="col-md-12"><label class="labels">Department</label><input type="text" class="form-control" value="{{ $department_name }}"></div>
                    <div class="col-md-12"><label class="labels">Joining Date</label><input type="text" class="form-control" value="{{ auth()->user()->hired_date }}"></div>
                    <div class="col-md-12"><label class="labels">Status</label><input type="text" class="form-control" value="{{ auth()->user()->status }}"></div>
                    <div class="col-md-12"><label class="labels">Reporting Boss</label><input type="text" class="form-control" value="{{ auth()->user()->status }}"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">Salary</label><input type="text" class="form-control" value="₱{{ auth()->user()->salary }}"></div>
                    <div class="col-md-6"><label class="labels">Salary Term</label><input type="text" class="form-control" value="{{ auth()->user()->salary_term }}"></div>
                </div>
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Save Profile</button></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Contact Information</h4>
                </div>
                <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text" class="form-control" value="{{ auth()->user()->contact_number }}"></div>
                <div class="col-md-12"><label class="labels">Address</label><input type="text" class="form-control" value="{{ auth()->user()->address }}"></div>
                <div class="col-md-12"><label class="labels">Email</label><input type="text" class="form-control" value="{{ auth()->user()->email }}"></div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

@endsection