@extends('Component.main')
@section('container')
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Daftar Lokasi</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/place">Lokasi</a></li>
                <li class="breadcrumb-item active" aria-current="page">Daftar Lokasi</li>
            </ol>
        </div>
        <div class="row">
            <div class="col-md-6">
                <form action="/place">
                    <div class="input-group mb-3">
                        <input name="search" type="text" class="form-control" placeholder="Pencarian" value="{{ request('search') }}">
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </div>
                </form>
            </div>
        </div>
        <br>
        
        @if($places->count())
        <div class="row">
            <div class="col-lg-12 mb-4">
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Daftar Lokasi</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Lokasi</th>
                                    <th>Kd Ruang</th>
                                    <th>Deskripsi</th>
                                    <th>Penanggung Jawab</th>
                                    @if(auth()->user()->is_admin)
                                        <th>Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($places as $place)
                                    <tr>
                                        <td>
                                            {{ $place->id }}
                                        </td>
                                        <td>
                                            {{ $place->name }}
                                        </td>
                                        <td>
                                            {{ $place->code }}
                                        </td>
                                        <td>
                                            {{ $place->description }}
                                        </td>
                                        <td>
                                            {{ $place->person_in_charge }}
                                        </td>
                                        <td col-sm-auto>
                                            <form class="d-inline" action="/place/{{ $place->id }}">
                                                @csrf
                                                <button class="btn btn-sm btn-info"><i class="fas fa-print"></i></button>
                                            </form>
                                            <form class="d-inline" action="/locationqr/{{ $place->id }}">
                                                @csrf
                                                <button class="btn btn-sm btn-info">QR</button>
                                            </form>
                                            @if(auth()->user()->is_admin)
                                            <form class="d-inline" action="/place/{{ $place->id }}/edit">
                                                @csrf
                                                    <button class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></button>
                                            </form>
                                            <form class="d-inline" action="/place/{{ $place->id }}" method="POST">
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
        </div>
    </div>

    @else
    <p class="text-center fs-4">Not Found!</p>
    @endif
@endsection
