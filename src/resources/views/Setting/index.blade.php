@extends('Component.main')
@section('container')
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Pengaturan</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/setting">Pengaturan</a></li>
                <li class="breadcrumb-item active" aria-current="page">Pengaturan</li>
            </ol>
        </div>
        
        @if($settings->count())
        <div class="row">
            <div class="col-lg-12 mb-4">
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Pengaturan</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th>Perwakilan</th>
                                    <th>Lokasi</th>
                                    <th>Kode UPB Perwakilan</th>
                                    <th>Kepala Perwakilan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($settings as $setting)
                                <tr>
                                    <td>
                                        {{ $setting->perwakilan }}
                                    </td>
                                    <td>
                                        {{ $setting->lokasi }}
                                    </td>
                                    <td>
                                        {{ $setting->kode_upb }}
                                    </td>
                                    <td>
                                        {{ $setting->kepala_perwakilan }}
                                    </td>
                                    <td>
                                        <form class="d-inline" action="/setting/{{ $setting->id }}/edit">
                                            @csrf
                                            <button class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></button>
                                        </form>
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
