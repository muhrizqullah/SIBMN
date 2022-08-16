@extends('Component.main')
@section('container')
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Daftar Kategori</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/category">Kategori</a></li>
                <li class="breadcrumb-item active" aria-current="page">Daftar Kategori</li>
            </ol>
        </div>
        <div class="row">
            <div class="col-md-6">
                <form action="/category">
                    <div class="input-group mb-3">
                        <input name="search" type="text" class="form-control" placeholder="Pencarian" value="{{ request('search') }}">
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </div>
                </form>
            </div>
        </div>
        <br>
        
        @if($categories->count())
        <div class="row">
            <div class="col-lg-12 mb-4">
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Daftar Kategori</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kategori</th>
                                    <th>Kode Kategori</th>
                                    @if(auth()->user()->is_admin)
                                        <th>Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>
                                            {{ $category->name }}
                                        </td>
                                        <td>
                                            {{ $category->code }}
                                        </td>
                                        @if(auth()->user()->is_admin)
                                            <td>
                                                <form class="d-inline" action="/category/{{ $category->id }}/edit">
                                                    @csrf
                                                    <button class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></button>
                                                </form>
                                                <form class="d-inline" action="/category/{{ $category->id }}" method="POST">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')"><i class="fas fa-trash-alt"></i></button>
                                                </form>
                                            </td>
                                        @endif
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
