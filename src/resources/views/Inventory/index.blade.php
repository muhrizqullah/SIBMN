@extends('Component.main')
@section('container')
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Daftar Inventaris</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/inventory">Inventaris</a></li>
                <li class="breadcrumb-item active" aria-current="page">Daftar Inventaris</li>
            </ol>
        </div>
        <div class="row">
            <div class="col-md-6">
                <form action="/inventory">
                    <label for="search">Lokasi</label>
                    <div class="input-group mb-3">
                        <select class="form-control" name="search">
                            <option>-</option>
                            @foreach($places as $place)
                                <option value="{{ $place->id }}">{{ $place->name }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </div>
                </form>
            </div>
        </div>
        <br>
        <!-- Row -->
        <div class="row">
        <!-- Datatables -->
        <div class="col-lg-12">
            <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Inventaris</h6>
            </div>
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush" id="dataTable">
                <thead class="thead-light">
                    <tr>
                    <th>No</th>
                    <th>NUP</th>
                    <th>Nama</th>
                    <th>Merek</th>
                    <th>Kode Barang</th>
                    <th>Thn. Perolehan</th>
                    <th>Kuantitas</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                    <th>No</th>
                    <th>NUP</th>
                    <th>Nama</th>
                    <th>Merek</th>
                    <th>Kode Barang</th>
                    <th>Thn. Perolehan</th>
                    <th>Kuantitas</th>
                    <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($inventories as $inventory)
                    <tr>
                        <td>
                            {{ $loop->iteration }}
                        </td>
                        <td>
                            {{ $inventory->nup_code }}
                        </td>
                        <td>
                            {{ $inventory->name }}
                        </td>
                        <td>
                            {{ $inventory->brand }}
                        </td>
                        <td>
                            {{ $inventory->item_code }}
                        </td>
                        <td>
                            {{ $inventory->tahun_perolehan }}
                        </td>
                        <td>
                            {{ $inventory->quantity }}  {{ $inventory->unit }}
                        </td>
                        <td>
                            <form class="d-inline" action="/inventory/{{ $inventory->id }}">
                                @csrf
                                <button class="btn btn-sm btn-info"><i class="far fa-info-circle"></i></button>
                            </form>
                            <form class="d-inline" action="/inventory/{{ $inventory->id }}/edit">
                                @csrf
                                <button class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></button>
                            </form>
                            @if(auth()->user()->is_admin)
                            <form class="d-inline" action="/inventory/{{ $inventory->id }}" method="POST">
                                @method('delete')
                                @csrf
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')"><i class="fas fa-trash-alt"></i></button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
            </div>
        </div>
@endsection