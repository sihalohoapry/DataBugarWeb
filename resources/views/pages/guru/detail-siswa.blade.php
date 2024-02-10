@extends('layouts.admin')
@section('title')
    Detail Siswa
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
                        <h2 class="text-md text-highlight">Detail Siswa</h2>
                    </div>
                </div>
            </div>

            <div class="page-content page-container" id="page-content">
                <div class="padding pt-0">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong>Data Siswa</strong>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('update-siswa') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="text" hidden name="id" id="id"
                                            value="{{ $data->id }}">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label class="text-muted">Nama</label>
                                                <input type="text" id="name" name="name"
                                                    value="{{ $data->name }}" class="form-control" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="text-muted">NISN</label>
                                                <input type="text" id="nisn" name="nisn"
                                                    value="{{ $data->nisn }}" class="form-control" required>
                                            </div>
                                            <input type="text" hidden name="sekolah_id" id="sekolah_id"
                                                value="{{ $data->sekolah_id }}">
                                            <div class="form-group col-md-6">
                                                <label class="text-muted">Sekolah</label>

                                                <select class="form-control" name="sekolah_id" id="sekolah_id"
                                                    @readonly(true)>
                                                    <option value="{{ $data->sekolah_id }}">{{ $data->nama_sekolah }}
                                                    </option>
                                                </select>


                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="text-muted">Kelas</label>
                                                <select class="form-control" name="class" id="class">
                                                    <option value="{{ $data->class }}">{{ $data->kelas }}</option>

                                                    @foreach ($kelas as $item)
                                                        <option value="{{ $item->id }}">{{ $item->kelas }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="text-muted">Tanggal Lahir</label>
                                                <input type="date" id="date_of_birth" name="date_of_birth"
                                                    value="{{ $data->date_of_birth }}" class="form-control" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="text-muted">Jenis Klamin</label>
                                                <select class="form-control" name="gender" id="gender" required>
                                                    <option value="{{ $data->gender }}"> {{ $data->gender }}
                                                    </option>
                                                    <option value="PRIA">PRIA</option>
                                                    <option value="WANITA">WANITA</option>


                                                </select>
                                            </div>

                                        </div>

                                        <button type="submit" class="btn btn-primary">Edit Data</button>


                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong>Data Tes Siswa</strong>
                                </div>
                                <div class="card-body">

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
