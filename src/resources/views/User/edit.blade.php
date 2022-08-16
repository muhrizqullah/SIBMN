@extends('Component.main')
@section('container')
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pengaturan User</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/User">User</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pengaturan User</li>
        </ol>
    </div>
    <div class="row justify-content-center">
        <div class="col-xl-7 col-lg-12 col-md-9">
            <div class="card shadow-sm my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="login-form">
                                {{-- Alert Registration Success End --}}
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Pengaturan User</h1>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="text-info h5 mb-3">Name</span><span class="h5 mb-3">{{ $user->name }}</span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="text-info h5 mb-3">Email</span><span class="h5 mb-3">{{ $user->email }}</span>
                                </div>
                                <form method="POST" action="/user/{{ $user->id }}">
                                    @method('put')
                                    @csrf
                                    <div class="form-group">
                                        <label for="is_admin">Role</label>
                                        <select class="form-control" name="is_admin">
                                            @if(old('is_admin', $user->is_admin) == 1)
                                                <option value="1" selected>Admin</option>
                                                <option value="0">User</option>
                                            @else 
                                                <option value="1">Admin</option>
                                                <option value="0" selected>User</option>
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
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