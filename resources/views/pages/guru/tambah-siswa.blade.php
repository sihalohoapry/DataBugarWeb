@extends('layouts.admin')
@section('title')
    Tambah Siswa
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
                        <h2 class="text-md text-highlight">Tambah Siswa</h2>
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
                                    <strong>Data - data siswa</strong>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('create-siswa') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label class="text-muted">Nama</label>
                                                <input type="text" id="nama" name="nama" class="form-control"
                                                    required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="text-muted">NISN</label>
                                                <input type="text" id="nisn" name="nisn" class="form-control"
                                                    required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="text-muted">Kelas</label>
                                                <select class="form-control" name="kelas" id="kelas">
                                                    <option value="">Pilih Kelas</option>

                                                    @foreach ($kelas as $item)
                                                        <option value="{{ $item->id }}">{{ $item->kelas }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="text-muted">Tanggal Lahir</label>
                                                <input type="date" id="date_of_birth" name="date_of_birth"
                                                    class="form-control" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="text-muted">Jenis Klamin</label>
                                                <select class="form-control" name="jenis" id="jenis" required>
                                                    <option value="">Pilih Jenis Klamin</option>
                                                    <option value="PRIA">PRIA</option>
                                                    <option value="WANITA">WANITA</option>


                                                </select>
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
