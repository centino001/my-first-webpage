@extends('layouts.app')

@section('page_header')
    <div class="sub-header">
        <div class="d-flex align-items-center flex-wrap mr-auto">
            <h5 class="dashboard_bar">Dashboard</h5>
        </div>
        <div class="d-flex align-items-center">
            <a href="{{ route('manage.admins') }}" class="btn btn-xs btn-secondary light mr-1">
                <i class="fa fa-arrow-circle-left"></i>
                Back
            </a>
        </div>
    </div>
@endsection

@section('content')
    <div class="row mt-5">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">View Admin Info</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <div>
                            @if(session('status_message') && session('status_type'))
                                <div class="alert alert-alt alert-{{ session('status_type') }}">
                                    {{ session('status_message') }}
                                </div>
                            @endif
                            <div class="form-row">
                                <div class="form-group col-md-3 mb-4">
                                    <label class="text-label" for="unique_id">Unique ID</label>
                                    <input type="text" class="form-control" disabled readonly
                                           id="unique_id"
                                           value="{{ $admin->unique_id }}">
                                </div>
                                <div class="form-group col-md-9 mb-4">
                                    <label class="text-label" for="name">Names</label>
                                    <input type="text" class="form-control" disabled readonly
                                           id="name"
                                           value="{{ $admin->surname . ', ' . $admin->other_names }}">
                                </div>
                                <div class="form-group col-md-8 mb-4">
                                    <label class="text-label" for="email">Email</label>
                                    <input type="text" class="form-control" disabled readonly
                                           id="email"
                                           value="{{ $admin->email }}">
                                </div>
                                <div class="form-group col-md-4 mb-4">
                                    <label class="text-label" for="mobile_no">Mobile Number</label>
                                    <input type="text" class="form-control" disabled readonly
                                           id="mobile_no"
                                           value="{{ $admin->mobile_no }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
