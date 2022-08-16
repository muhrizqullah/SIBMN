@extends('Component.main')
@section('container')
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between">
            <h1 class="h3 mb-0 text-gray-800">Detail Inventaris</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/inventory">Inventaris</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detail Inventaris</li>
            </ol>
        </div>
        <div class="container mb-5 mt-2">
            <div class="row justify-content-center">
                <div class="col-xl-7">
                    <div class="card text-black">
                        <div class="card-body">
                            <div class="text-center">
                                <div class="d-flex justify-content-between">
                                    <span class="h5 text-dark mb-4">{{ $setting->perwakilan }}</span><span class="h5 text-dark mb-4">{{ $setting->kode_upb }}</span>
                                </div>
                                <div>{!! QrCode::size(200)->generate(
                                    $setting->perwakilan . '`' . $setting->kode_upb . '`' . $inventory->name . '`' . $inventory->brand . '`' . $inventory->place->name . '`' . $inventory->quantity . ' ' . $inventory->unit . '`' . $inventory->item_code . '`' . $inventory->nup_code . '`' . $inventory->price . '`' . $inventory->penguasaan_item . '`' . $inventory->tahun_perolehan
                                ) !!}</div>
                                <br>
                                <h5 class="card-title">{{ $inventory->name }}</h5>
                                <p class="text-muted mb-3">{{ $inventory->brand }}</p>
                            </div>
                            <div>
                                <div>
                                    <h6 class="text-info mb-2">Deskripsi</h6>
                                    <p>{{ $inventory->description }}</p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="text-info">Lokasi</span><span>{{ $inventory->place->name }}</span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="text-info">Jumlah Barang</span><span>{{ $inventory->quantity }} {{ $inventory->unit }}</span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="text-info">Kode Barang</span><span>{{ $inventory->item_code }}</span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="text-info">Nomor Urut Pendaftaran</span><span>{{ $inventory->nup_code }}</span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="text-info">Harga Barang</span><span>@currency($inventory->price)</span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="text-info">Penguasaan</span><span>{{ $inventory->penguasaan_item }}</span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="text-info">Tahun Perolehan</span><span>{{ $inventory->tahun_perolehan }}</span>
                                </div>
                            </div>
                            <form class="d-inline" action="/cetakqr/{{ $inventory->id }}">
                                @csrf
                                <button class="btn btn-sm btn-info"><i class="fas fa-print"></i> Cetak Label</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection