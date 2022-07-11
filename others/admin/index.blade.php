@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Manage Admins</h4>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createAdminModal">
                        Create Admin
                    </button>
                </div>
                <div class="card-body">
                    @if(session('status_message') && session('status_type'))
                        <div class="alert alert-alt alert-{{ session('status_type') }}">
                            {{ session('status_message') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-responsive-md">
                            <thead>
                            <tr>
                                <th><strong>Names</strong></th>
                                <th><strong>Email</strong></th>
                                <th><strong>Mobile Number</strong></th>
                                <th><strong>Role</strong></th>
                                <th><strong>Actions</strong></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($admins as $admin)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="w-space-no">{{ $admin->surname . ', '. $admin->other_names }}</span>
                                        </div>
                                    </td>
                                    <td>{{ $admin->email }}</td>
                                    <td>{{ $admin->mobile_no }}</td>
                                    <td>{{ $admin->getRole->name }}</td>
                                    <td>
                                        <div class="d-flex">
                                            @if ($admin->id != auth()->user()->id)
                                                <a href="{{ route('manage.admin.show', $admin->unique_id) }}"
                                                    class="btn btn-info shadow sharp mr-1" title="View">
                                                    <i class="fa fa-eye"></i> View</a>
                                                @if ($admin->getStatus->name == 'active')
                                                <a href="{{ route('manage.admin.block', $admin->unique_id) }}"
                                                    class="btn btn-danger shadow sharp mr-1" title="View">
                                                    <i class="fa fa-lock"></i> Block</a>
                                                @else
                                                <a href="{{ route('manage.admin.unblock', $admin->unique_id) }}"
                                                    class="btn btn-primary shadow sharp mr-1" title="View">
                                                    <i class="fa fa-unlock"></i> Unblock</a>
                                                @endif
                                            @endif
                                        </div>
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
    
    <div class="modal fade" id="createAdminModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Admin</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <form action="{{ route('create.admins') }}" method="post">
                    <div class="modal-body">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="surname">Surname</label>
                                <input type="text" class="form-control @error('surname') is-invalid @enderror" name="surname"
                                    id="surname" value="{{ old('surname') }}" autocomplete>
                                @error('surname')
                                <div class="invalid-feedback font-weight-bold">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="other_names">Other Names</label>
                                <input type="text" class="form-control @error('other_names') is-invalid @enderror"
                                    name="other_names"
                                    id="other_names" value="{{ old('other_names') }}"
                                    autocomplete>
                                @error('other_names')
                                <div class="invalid-feedback font-weight-bold">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label for="email">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                    id="email" value="{{ old('email') }}" autocomplete>
                                @error('email')
                                <div class="invalid-feedback font-weight-bold">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label for="mobile_no">Mobile Number</label>
                                <input type="text" class="form-control @error('mobile_no') is-invalid @enderror"
                                    name="mobile_no"
                                    id="mobile_no" value="{{ old('mobile_no') }}"
                                    autocomplete>
                                @error('mobile_no')
                                <div class="invalid-feedback font-weight-bold">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" id="password" autocomplete>
                                @error('password')
                                <div class="invalid-feedback font-weight-bold">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>Confirm Password</label>
                                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                                    name="password_confirmation" id="password_confirmation"
                                    autocomplete>
                                @error('password_confirmation')
                                <div class="invalid-feedback font-weight-bold">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
