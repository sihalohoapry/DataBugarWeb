@extends('layouts.admin')
@section('title')
    Tambah IMT
@endsection
@section('content')
    @include('alert.success')
    @include('alert.failed')
    <div id="content" class="flex ">
        @if ($errors->any())
            <div class="alert alert-danger alert-dismiss=">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
        @endif
        <!-- ############ Main START-->
        <div>
            <div class="page-hero page-container " id="page-hero">
                <div class="padding d-flex pt-0">
                    <div class="page-title">
                        <h2 class="text-md text-highlight">Tambah Kebugaran Result</h2>
                        <small class="text-muted">Silahkan Isi data dengan benar</small>
                    </div>
                </div>
            </div>

            <div class="page-content page-container" id="page-content">
                <div class="padding pt-0">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong>Data - data Kebugaran</strong>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('create-result-kebugaran') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label class="text-muted">Nama Hasil</label>
                                                <select class="form-control" name="result" id="result" required>
                                                    <option value="">Pilih Result</option>
                                                    <option value="SUPERIOR">SUPERIOR</option>
                                                    <option value="SANGAT BAIK">SANGAT BAIK</option>
                                                    <option value="BAIK">BAIK</option>
                                                    <option value="SEDANG">SEDANG</option>
                                                    <option value="KURANG">KURANG</option>
                                                    <option value="KURANG SEKALI">KURANG SEKALI</option>

                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="text-muted">Jenis Klamin</label>
                                                <select class="form-control" name="jenis_klamin" id="jenis_klamin" required>
                                                    <option value="">Pilih Jenis Klamin</option>
                                                    <option value="PRIA">PRIA</option>
                                                    <option value="WANITA">WANITA</option>


                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="text-muted">Result Rendah</label>
                                                <input type="number" step="0.01" id="start_value" name="start_value"
                                                    class="form-control" placeholder="" required>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label class="text-muted">Result Tinggi</label>
                                                <input type="number" step="0.01" id="end_value" name="end_value"
                                                    class="form-control" placeholder="" required>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary mt-5 float-right">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- ############ Main END-->
    </div>
    <!-- ############ Content END-->
@endsection
