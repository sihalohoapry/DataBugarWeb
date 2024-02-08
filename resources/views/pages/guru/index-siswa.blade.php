@extends('layouts.admin')
@section('title')
    Siswa
@endsection
@push('addon-script')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">

    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript"
        src="https://cdn.datatables.net/v/bs5/dt-1.12.1/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/fc-4.1.0/datatables.min.js">
    </script>
@endpush
@section('content')
    <div id="content" class="flex ">
        @include('alert.success')
        @include('alert.failed')
        {{-- MODEL --}}
        <div class="modal fade" id="uploadFile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Upload Data Siswa</h4>
                        <button type="button" class="btn btn-close" data-dismiss="modal">
                            {{-- <span aria-hidden="true">&times;</span> --}}
                        </button>
                    </div>
                    <div class="modal-body">

                        <form action="{{ route('upload-siswa') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="exampleInputtext1" class="form-label">Upload Data</label>

                                <select class="form-control" name="kelas" id="kelas" required>
                                    <option value="">Pilih Kelas</option>

                                    @foreach ($kelas as $item)
                                        <option value="{{ $item->id }}">{{ $item->kelas }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputtext1" class="form-label">Upload Data</label>
                                <input id="file_upload" type="file" class="form-control" name="file_upload"
                                    accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"
                                    required>
                                <p><span style="color: red">*</span><i>Harap upload sesuai dengan template</i></p>

                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                        </form>

                    </div>
                </div>
            </div>
            </form>
        </div>

        <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Siswa Kelas</h4>
                        <button type="button" class="btn btn-close" data-dismiss="modal">
                            {{-- <span aria-hidden="true">&times;</span> --}}
                        </button>
                    </div>
                    <div class="modal-body">

                        <form action="{{ route('update-kelas') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" id="id" name="id">
                            <input type="hidden" id="sekolah_id" name="sekolah_id">

                            <div class="mb-3">
                                <label for="exampleInputtext1" class="form-label">Kelas</label>
                                <input id="kelas" type="text" class="form-control" name="kelas" required>

                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nama Sekolah</label>
                                <select class="form-control" name="sekolah_id" id="sekolah_id" @readonly(true) required>
                                    <option id="sekolah_id_existing" value="">Pilih Sekolah</option>


                                </select>


                                {{-- <input id="nama_sekolah" type="text" class="form-control"  name="nama_sekolah"> --}}


                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                        </form>

                    </div>
                </div>
            </div>
            </form>
        </div>

        <div class="modal fade" id="ModalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">HAPUS DATA</h4>
                        <button type="button" class="btn btn-close" data-dismiss="modal">

                        </button>
                    </div>
                    <div class="modal-body">

                        <form action="{{ route('delete-siswa') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" id="idData" name="idData">
                            <p>Anda yakin menghapus data ini?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Ya</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!-- ############ Main START-->



        <div>
            <div class="page-hero page-container " id="page-hero">
                <div class="padding d-flex pt-0">
                    <div class="page-title">
                        <h2 class="text-md text-highlight">Siswa</h2>
                        <small class="text-muted">Daftar list siswa terdaftar</small>
                    </div>
                    <div class="flex"></div>
                </div>
            </div>


            <div class="page-content page-container" id="page-content">
                <div class="padding">

                    <div class="card">
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <div class="card-header">
                                    <strong>Filter Data</strong>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('siswa') }}" method="GET" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label class="text-muted">Filter Nama</label>
                                                <input type="text" name="nama" class="form-control"
                                                    placeholder="Search by Name" />
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
                                        </div>

                                        <button class="btn btn-success filter float-md-right">Filter</button>
                                        <a href="{{ route('siswa') }}"
                                            class="btn btn-warning float-md-right mr-4">Reset</a>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card-header">
                                    <strong>Tambah Data</strong>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <a href="{{ route('download') }}" class="btn btn-primary ml-4">Download
                                            Template</a>

                                    </div>
                                    <div class="col-md-6 d-flex">
                                        <div class="card flex">
                                            <a href="" data-toggle="modal" data-target="#uploadFile">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center text-hover-success">
                                                        <div class="avatar w-56 m-2 no-shadow gd-primary">
                                                            <i data-feather="upload"></i>
                                                        </div>
                                                        <div class="px-4 flex">
                                                            <div>Upload Data</div>
                                                            <div class="text-success mt-2" id="total-sum">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 d-flex">
                                        <div class="card flex">
                                            <a href="{{ route('tambah-siswa') }}">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center text-hover-success">
                                                        <div class="avatar w-56 m-2 no-shadow gd-primary">
                                                            <i data-feather="plus"></i>
                                                        </div>
                                                        <div class="px-4 flex">
                                                            <div>Tambah Siswa</div>
                                                            <div class="text-success mt-2" id="total-transaksi">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        @if (count($datas) == 0)
                            <div class="col-md-12 card mr-2 mt-2 text-center">
                                <div class="card-body">
                                    <h5 class="card-title">Data Kosong</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Silahkan tambah data</h6>
                                    <a class="btn btn-primary text-white" href="{{ route('tambah-siswa') }}">
                                        Tambah Data
                                    </a>
                                </div>
                            </div>
                        @endif

                        @foreach ($datas as $item)
                            <div class="col-md-3 card mt-2">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->name }}</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">{{ $item->nama_sekolah }}</h6>
                                    <table class="table">

                                        <tbody>
                                            <tr>
                                                <td>NISN</td>
                                                <td>{{ $item->nisn }}</td>
                                            </tr>
                                            <tr>
                                                <td>Kelas</td>
                                                <td>{{ $item->kelas }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button class="btn btn-danger" data-toggle="modal" data-target="#ModalDelete"
                                        onclick="setParameter('{{ $item->id }}')">Delete</button>
                                    <a class="btn btn-primary text-white" data-toggle="modal" data-target="#ModalEdit"
                                        onclick = "setParameterEdit('{{ $item->id }}', '{{ $item->sekolah_id }}', ' {{ $item->nama_sekolah }}' , ' {{ $item->kelas }} ')">
                                        Edit
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>


                </div>
            </div>
        </div>
        <!-- ############ Main END-->
    </div>
    <!-- ############ Content END-->
@endsection

@push('addon-script')
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>

    <script>
        function setParameter(id) {
            document.getElementById('idData').value = id;

        }

        function setParameterEdit(id, sekolah_id, nama_sekolah, kelas) {
            console.log(id, sekolah_id, nama_sekolah, kelas);

            document.getElementById('id').value = id;
            document.getElementById('sekolah_id_existing').value = sekolah_id;
            document.getElementById('sekolah_id_existing').text = nama_sekolah;
            document.getElementById('kelas').value = kelas;



        }

        var datatable = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            ajax: {
                url: '{!! url()->current() !!}',
            },

            columns: [{
                    data: 'kelas',
                    name: 'kelas'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: 'nama_sekolah',
                    name: 'nama_sekolah'
                },

                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searcable: false,
                    width: '15%'
                },
            ],
        });
    </script>
@endpush
{{-- 3.500.000.000 --}}
