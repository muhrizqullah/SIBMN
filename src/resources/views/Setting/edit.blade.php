@extends('Component.main')
@section('container')
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ubah Pengaturan</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/settings">Pengaturan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ubah Pengaturan</li>
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
                                    <h1 class="h4 text-gray-900 mb-4">Ubah Pengaturan</h1>
                                </div>
                                <form method="POST" action="/setting/{{ $settings->id }}">
                                    @method('put')
                                    @csrf
                                    <div class="form-group">
                                        <label for="perwakilan">Nama UPB</label>
                                        <input type="text"  name="perwakilan" class="form-control @error('perwakilan') is-invalid @enderror" id="perwakilan" placeholder="Nama UPB" value="{{ old('perwakilan', $settings->perwakilan) }}" required>
                                        @error('perwakilan')<div id="validationPerwakilan" class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="perwakilan">Lokasi UPB</label>
                                        <input type="text"  name="lokasi" class="form-control @error('lokasi') is-invalid @enderror" id="lokasi" placeholder="Lokasi UPB" value="{{ old('lokasi', $settings->lokasi) }}" required>
                                        @error('lokasi')<div id="validationLokasi" class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="kode_upb">Kode UPB</label>
                                        <input type="text"  name="kode_upb" class="form-control @error('kode_upb') is-invalid @enderror" id="kode_upb" placeholder="Kode UPB Perwakilan" value="{{ old('kode_upb', $settings->kode_upb) }}" required>
                                        @error('kode_upb')<div id="validationKode_upb" class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="kepala_perwakilan">Kepala Perwakilan</label>
                                        <input type="text" name="kepala_perwakilan" class="form-control @error('kepala_perwakilan') is-invalid @enderror" id="kepala_perwakilan" placeholder="Nama Kepala Perwakilan" value="{{ old('kepala_perwakilan', $settings->kepala_perwakilan) }}" required>
                                        @error('kepala_perwakilan')<div id="validationKalan" class="invalid-feedback">{{ $message }}</div>@enderror
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