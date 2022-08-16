@extends('Component.main')
@section('container')
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Kategori</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/category">Kategori</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Kategori</li>
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
                                    <h1 class="h4 text-gray-900 mb-4">Tambah Kategori</h1>
                                </div>
                                <form method="POST" action="/category">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Nama Kategori" value="{{ old('name') }}" autofocus required>
                                        @error('name')<div id="validationName" class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="code" class="form-control @error('code') is-invalid @enderror" id="code" placeholder="Kode Kategori" value="{{ old('code') }}" autofocus required>
                                        @error('code')<div id="validationCode" class="invalid-feedback">{{ $message }}</div>@enderror
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
