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
                        <h2 class="text-md text-highlight">Tambah Kelas</h2>
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
                                    <strong>Data - data kelas</strong>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('create') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label class="text-muted">Sekolah</label>
                                                <select class="form-control" name="sekolah_id" id="sekolah_id"
                                                    @readonly(true) required>
                                                    <option value="{{ $sekolah->id }}">{{ $sekolah->nama_sekolah }}
                                                    </option>

                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="text-muted">Kelas</label>
                                                <input type="text" id="kelas" name="kelas" class="form-control"
                                                    required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="text-muted">Tahun Ajaran</label>
                                                <select class="form-control" name="tahun_ajaran_id" id="tahun_ajaran_id"
                                                    required>
                                                    <option value="">==silahkan pilih==</option>
                                                    @foreach ($dataTahun as $item)
                                                        <option value="{{ $item->id }}">{{ $item->tahun_ajaran }}
                                                        </option>
                                                    @endforeach
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
