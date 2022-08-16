@extends('Component.main')
@section('container')
<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ubah Inventaris</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/inventory">Inventaris</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ubah Inventaris</li>
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
                                    <h1 class="h4 text-gray-900 mb-4">Ubah Inventaris</h1>
                                </div>
                                <form method="POST" action="/inventory/{{ $inventory->id }}">
                                    @method('put')
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Nama Barang</label>
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Nama Inventaris" value="{{ old('name', $inventory->name) }}" required>
                                        @error('name')<div id="validationName" class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="brand">Merek Barang</label>
                                        <input type="text" name="brand" class="form-control @error('brand') is-invalid @enderror" id="brand" placeholder="Nama Inventaris" value="{{ old('brand', $inventory->brand) }}" required>
                                        @error('brand')<div id="validationBrand" class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="place_id">Lokasi</label>
                                        <select class="form-control" name="place_id">
                                            @foreach($places as $place)
                                                @if(old('place_id', $inventory->place_id) == $place->id)
                                                    <option value="{{ $place->id }}" selected>{{ $place->name }}</option>
                                                @else
                                                    <option value="{{ $place->id }}">{{ $place->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Deskripsi</label>
                                        <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Nama Inventaris" value="{{ old('description', $inventory->description) }}" required>
                                        @error('description')<div id="validationDescription" class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="quantity">Jumlah Barang</label>
                                        <input type="text" name="quantity" class="form-control @error('quantity') is-invalid @enderror" id="quantity" placeholder="Nama Inventaris" value="{{ old('quantity', $inventory->quantity) }}" required>
                                        @error('quantity')<div id="validationQuantity" class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="unit">Satuan</label>
                                        <input type="text" name="unit" class="form-control @error('unit') is-invalid @enderror" id="unit" placeholder="Nama Inventaris" value="{{ old('unit', $inventory->unit) }}" required>
                                        @error('unit')<div id="validationUnit" class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Harga Barang</label>
                                        <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" id="price" placeholder="Nama Inventaris" value="{{ old('price', $inventory->price) }}" required>
                                        @error('price')<div id="validationPrice" class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="item_code">Kode Barang</label>
                                        <input type="text" name="item_code" class="form-control @error('item_code') is-invalid @enderror" id="item_code" placeholder="Nama Inventaris" value="{{ old('item_code', $inventory->item_code) }}" required>
                                        @error('item_code')<div id="validationItem_code" class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="nup_code">Nomor Urut Pendaftaran</label>
                                        <input type="text" name="nup_code" class="form-control @error('nup_code') is-invalid @enderror" id="nup_code" placeholder="Nama Inventaris" value="{{ old('nup_code', $inventory->nup_code) }}" required>
                                        @error('nup_code')<div id="validationNup_code" class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="penguasaan_item">Penguasaan Barang</label>
                                        <input type="text" name="penguasaan_item" class="form-control @error('penguasaan_item') is-invalid @enderror" id="penguasaan_item" placeholder="Nama Inventaris" value="{{ old('penguasaan_item', $inventory->penguasaan_item) }}" required>
                                        @error('penguasaan_item')<div id="validationPenguasaan_item" class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="tahun_perolehan">Tahun Perolehan</label>
                                        <input type="text" name="tahun_perolehan" class="form-control @error('tahun_perolehan') is-invalid @enderror" id="tahun_perolehan" placeholder="Nama Inventaris" value="{{ old('tahun_perolehan', $inventory->tahun_perolehan) }}" required>
                                        @error('tahun_perolehan')<div id="validationTahun_perolehan" class="invalid-feedback">{{ $message }}</div>@enderror
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