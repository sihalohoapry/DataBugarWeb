@extends('layouts.admin')
@section('title')
    Tambah Kelas
@endsection
@section('content')
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
                                <h2 class="text-md text-highlight">Tambah Sekolah</h2>
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
                                            <strong>Data - data sekolah</strong>
                                        </div>
                                        <div class="card-body">
                                            <form action="{{ route('create-sekolah') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <label class="text-muted">Nama Sekolah</label>
                                                        <input  type="text" id="nama_sekolah" name="nama_sekolah"  class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <label class="text-muted">Kontak Sekolah</label>
                                                        <input  type="text" id="kontak" name="kontak"  class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <label class="text-muted">Alamat Sekolah</label>
                                                        <textarea  type="text" id="alamat" name="alamat" rows="4", cols="50"  class="form-control" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <label class="text-muted">Kota/Kabupaten</label>
                                                        <input  type="text" id="kota_kabupaten" name="kota_kabupaten"  class="form-control" required>
                                                    </div>
                                                </div>
                                                
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                    
                                               
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
