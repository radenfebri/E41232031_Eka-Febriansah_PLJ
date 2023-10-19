@extends('layouts.master')

@section('title', 'Pendidikan')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">@yield('title')</h2>
                        <h5 class="text-white op-7 mb-2">Total Pendidikan : {{ $data->count() }}</h5>
                    </div>
                    <div class="ml-md-auto py-2 py-md-0">
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner mt--5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <!-- <h4 class="card-title">Add Row</h4> -->
                            <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                                <i class="fa fa-plus"></i>
                                Pendidikan
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Modal Add-->
                        <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header no-bd">
                                        <h5 class="modal-title">
                                            <span class="fw-mediumbold">
                                                New</span>
                                                <span class="fw-light">
                                                    Pendidikan
                                                </span>
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- <p class="small">Create a new row using this form, make sure you fill them all</p> -->
                                            <form action="{{ route('pendidikan.store') }}" method="POST">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group form-group-default">
                                                            <label>Nama Sekolah <span style="color: red">*</span></label>
                                                            <input name="nama" type="text" class="form-control @error ('nama') is-invalid @enderror" value="{{ old('nama') }}" placeholder="Nama Perusahaan" >
                                                            @error('nama')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group form-group-default">
                                                            <label>Tingkan <span style="color: red">*</span></label>
                                                            <select name="tingkatan" id="tingkatan" class="form-control @error ('tingkatan') is-invalid @enderror">
                                                                <option value="" selected disabled>Pilih</option>
                                                                <option value="1">TK</option>
                                                                <option value="2">SD/MI</option>
                                                                <option value="3">SMP/MTS</option>
                                                                <option value="4">SMA/SMK</option>
                                                                <option value="5">D3</option>
                                                                <option value="6">D4/S1</option>
                                                                <option value="7">S2</option>
                                                                <option value="8">S3</option>
                                                            </select>
                                                            @error('tingaktan')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 pr-0">
                                                        <div class="form-group form-group-default">
                                                            <label>Tahun Masuk <span style="color: red">*</span></label>
                                                            <input type="text" name="tahun_masuk" id="tahun" class="form-control @error ('tahun_masuk') is-invalid @enderror" value="{{ old('tahun_masuk') }}" placeholder="20xx">
                                                            @error('tahun_masuk')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-group-default">
                                                            <label>Tahun Keluar <span style="color: red">*</span></label>
                                                            <input type="number" name="tahun_keluar" class="form-control @error ('tahun_keluar') is-invalid @enderror" value="{{ old('tahun_keluar') }}" placeholder="20xx">
                                                            @error('tahun_keluar')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer no-bd">
                                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Keluar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pendidikan</th>
                                            <th>Tingkatan</th>
                                            <th>Tahun Masuk</th>
                                            <th>Tahun Keluar</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pendidikan</th>
                                            <th>Tingkatan</th>
                                            <th>Tahun Masuk</th>
                                            <th>Tahun Keluar</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($data as $no => $item)
                                        <tr>
                                            <td>{{ $no + 1 }} </td>
                                            <td>{{ $item->nama }} </td>
                                            <td>
                                                @php
                                                    $tingkatanOptions = [
                                                        1 => 'TK',
                                                        2 => 'SD/MI',
                                                        3 => 'SMP/MTS',
                                                        4 => 'SMA/SMK',
                                                        5 => 'D3',
                                                        6 => 'D4/S1',
                                                        7 => 'S2',
                                                        8 => 'S3',
                                                    ];
                                                @endphp
                                                
                                                {{ $tingkatanOptions[$item->tingkatan] }}
                                            </td>
                                            <td>{{ $item->tahun_masuk }} </td>
                                            <td>{{ $item->tahun_keluar }} </td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="{{ route('pendidikan.edit', encrypt($item->id)) }}" type="button" data-toggle="tooltip" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Pendidikan">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    
                                                    <a href="{{ route('pendidikan.destroy', encrypt($item->id)) }}" method="POST" type="button" data-toggle="tooltip" class="btn btn-link btn-danger btn-lg" data-original-title="Hapus Pendidikan"
                                                        onclick="return confirm('Apakah anda yakin menghapus perusahaan {{ $item->nama }} ?')">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                </div>
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
            
            @include('layouts.footer')
            
        </div>
        
        
        <script>
            $(document).ready(function() {
                $("#tahun").datepicker({
                    dateFormat: "yy",
                    changeYear: true,
                    showButtonPanel: true,
                    yearRange: "1900:{{ date('Y') }}", // Sesuaikan dengan tahun yang diinginkan
                });
            });
        </script>
        
        @endsection