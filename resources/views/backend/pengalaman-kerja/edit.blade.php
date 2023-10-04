@extends('layouts.master')

@section('title', "Edit Data  $data->nama "  )

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Forms</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="{{ route('dashboard') }}">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('pengalaman-kerja.index') }}">Pengalamn Kerja</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">{{ $data->nama }}</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Form Edit PPPoE</div>
                        </div>
                        <form action="{{ route('pengalaman-kerja.update', $data->id ) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8 col-lg-6">
                                        <div class="form-group">
                                            <label for="email2">Nama Perusahaan <span style="color: red">*</span></label>
                                            <input type="text" class="form-control @error ('nama') is-invalid @enderror" name="nama" value="{{ $data->nama }}" placeholder="Nama Perusahaan">
                                            @error('nama')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-6">
                                        <div class="form-group">
                                            <label for="email2">Jabatan <span style="color: red">*</span></label>
                                            <input type="text" class="form-control @error ('jabatan') is-invalid @enderror" name="jabatan" value="{{ $data->jabatan }}" placeholder="Jabatan">
                                            @error('jabatan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-8 col-lg-6">
                                        <div class="form-group">
                                            <label for="email2">Tahun Masuk <span style="color: red">*</span></label>
                                            <input type="number" class="form-control @error ('tahun_masuk') is-invalid @enderror" name="tahun_masuk" value="{{ $data->tahun_masuk }}" placeholder="20xx">
                                            @error('tahun_masuk')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-6">
                                        <div class="form-group">
                                            <label for="email2">Tahun Keluar <span style="color: red">*</span></label>
                                            <input type="number" class="form-control @error ('tahun_keluar') is-invalid @enderror" name="tahun_keluar" value="{{ $data->tahun_keluar }}" placeholder="20xx">
                                            @error('tahun_keluar')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>
                                    </div>
    
                                </div>
                            </div>
                            <div class="card-action">
                                <button class="btn btn-success">Update</button>
                                <a href="{{ route('pengalaman-kerja.index') }}" class="btn btn-danger">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @include('layouts.footer')


</div>


@endsection