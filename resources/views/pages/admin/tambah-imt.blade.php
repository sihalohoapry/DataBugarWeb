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
                        <h2 class="text-md text-highlight">Tambah IMT</h2>
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
                                    <strong>Data - data IMT</strong>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('create-result-imt') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label class="text-muted">Nama Hasil</label>
                                                <select class="form-control" name="result" id="result" required>
                                                    <option value="">Pilih Result</option>
                                                    <option value="OBESITAS">OBESITAS</option>
                                                    <option value="BERAT BERLEBIHAN">BERAT BERLEBIHAN</option>
                                                    <option value="NORMAL">NORMAL</option>
                                                    <option value="KURUS">KURUS</option>
                                                    <option value="SANGAT KURUS">SANGAT KURUS</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="text-muted">Jenis Klamin</label>
                                                <select class="form-control" name="gender" id="gender" required>
                                                    <option value="">Pilih Jenis Klamin</option>
                                                    <option value="PRIA">PRIA</option>
                                                    <option value="WANITA">WANITA</option>


                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="text-muted">Berat Rendah</label>
                                                <input type="number" step="0.01" id="start_value" name="start_value"
                                                    class="form-control" placeholder="" required>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label class="text-muted">Berat Tinggi</label>
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
