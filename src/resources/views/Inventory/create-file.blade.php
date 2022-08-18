@extends('Component.main')
@section('container')
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Inventaris</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/inventory">Inventaris</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Inventaris</li>
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
                                    <h1 class="h4 text-gray-900 mb-4">Tambah Inventaris</h1>
                                </div>
                                <div>
                                    <a href="/import-file/Template.xlsx" download="Template">Download Template</a>
                                    <p class="h4 text-warning mb-2">Pastikan data BENAR sebelum dimasukan!</p>
                                </div>
                                <form method="POST" action="/importFile" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-label" for="file">Upload file</label>
                                        <input class="form-control @error('file') is-invalid @enderror" type="file"  id="file" name="file">
                                        @error('file')<div id="validationFile" class="invalid-feedback">{{ $message }}</div>@enderror
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
