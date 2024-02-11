@extends('layouts.admin')
@section('title')
    Jadwal Test
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
        <div class="modal fade" id="tambahJadwal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Tambah Jadwal Tes</h4>
                        <button type="button" class="btn btn-close" data-dismiss="modal">
                            {{-- <span aria-hidden="true">&times;</span> --}}
                        </button>
                    </div>
                    <div class="modal-body">

                        <form action="{{ route('tambah-jadwal') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="exampleInputtext1" class="form-label">Tanggal Mulai Tes</label>

                                <input type="datetime-local" id="start_tes" name="start_tes" class="form-control" required>

                            </div>
                            <div class="mb-3">
                                <label for="exampleInputtext1" class="form-label">Tanggal Selesai Tes</label>

                                <input type="datetime-local" id="end_tes" name="end_tes" class="form-control" required>

                            </div>

                            <div class="mb-3">
                                <label for="exampleInputtext1" class="form-label">Kelas</label>

                                <select class="form-control" name="kelas" id="kelas" required>
                                    <option value="">==Pilih Kelas==</option>

                                    @foreach ($kelas as $item)
                                        <option value="{{ $item->id }}">{{ $item->kelas }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-success">Submit</button>

                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Edit Jadwal Tes</h4>
                        <button type="button" class="btn btn-close" data-dismiss="modal">
                            {{-- <span aria-hidden="true">&times;</span> --}}
                        </button>
                    </div>
                    <div class="modal-body">

                        <form action="{{ route('update-jadwal') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" id="id2" name="id2">
                            <input type="hidden" id="sekolah_id2" name="sekolah_id2">

                            <div class="mb-3">
                                <label for="exampleInputtext1" class="form-label">Tanggal Mulai Tes</label>

                                <input type="datetime-local" id="start_tes2" name="start_tes2" class="form-control"
                                    required>

                            </div>
                            <div class="mb-3">
                                <label for="exampleInputtext1" class="form-label">Tanggal Selesai Tes</label>

                                <input type="datetime-local" id="end_tes2" name="end_tes2" class="form-control" required>

                            </div>

                            <div class="mb-3">
                                <label for="exampleInputtext1" class="form-label">Kelas</label>

                                <select class="form-control" name="class_id" required>
                                    <option id="kelas2">==Pilih Kelas==</option>

                                    @foreach ($kelas as $item)
                                        <option value="{{ $item->id }}">{{ $item->kelas }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-success">Submit</button>

                            </div>

                        </form>
                    </div>

                </div>
            </div>
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

                        <form action="{{ route('delete-jadwal') }}" method="POST" enctype="multipart/form-data">
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
                        <h2 class="text-md text-highlight">Jadwal Tes</h2>
                        <small class="text-muted">Daftar list jadwal tes terdaftar</small>
                    </div>
                    <div class="flex"></div>
                </div>
            </div>


            <div class="page-content page-container" id="page-content">
                <div class="padding">

                    <div class="card">
                        <div class="row mb-2">
                            <div class="col-md-8">
                                <div class="card-header">
                                    <strong>Filter Data</strong>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('jadwal-tes') }}" method="GET"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label class="text-muted">Cari Tes</label>
                                                <input type="text" name="nama" class="form-control"
                                                    placeholder="Search by Tes" />
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
                                        <a href="{{ route('jadwal-tes') }}"
                                            class="btn btn-warning float-md-right mr-4">Reset</a>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card-header">
                                    <strong>Tambah Data</strong>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <a href="" class="btn btn-primary mt-4 ml-4" data-toggle="modal"
                                            data-target="#tambahJadwal">
                                            Tambah Data</a>

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
                                    <a class="btn btn-primary text-white" data-toggle="modal"
                                        data-target="#tambahJadwal">
                                        Tambah Data
                                    </a>
                                </div>
                            </div>
                        @endif

                        @foreach ($datas as $item)
                            <div class="col-md-4 card mt-2">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->nomer_tes }}</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">{{ $item->nama_sekolah }}</h6>
                                    <table class="table">

                                        <tbody>
                                            <tr>
                                                <td>Kelas</td>
                                                <td>{{ $item->kelas }}</td>
                                            </tr>
                                            <tr>
                                                <td>Mulai Tes</td>
                                                <td>{{ $item->start_tes }}</td>
                                            </tr>
                                            <tr>
                                                <td>Akhir Tes</td>
                                                <td>{{ $item->end_tes }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button class="btn btn-danger" data-toggle="modal" data-target="#ModalDelete"
                                        onclick="setParameter('{{ $item->id }}')">Delete</button>
                                    <a class="btn btn-primary text-white" data-toggle="modal" data-target="#ModalEdit"
                                        onclick="setEdit('{{ $item->id }}','{{ $item->kelas }}','{{ $item->class_id }}','{{ $item->start_tes }}','{{ $item->end_tes }}','{{ $item->sekolah_id }}')">
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

        function setEdit(id, kelas, class_id, start_tes, end_tes, sekolah_id) {
            console.log(id, class_id, kelas, start_tes, end_tes, sekolah_id);

            document.getElementById('id2').value = id;
            document.getElementById('kelas2').value = class_id;
            document.getElementById('kelas2').text = kelas;
            document.getElementById('sekolah_id2').value = sekolah_id;



            document.getElementById('end_tes2').value = end_tes;
            document.getElementById('start_tes2').value = start_tes;






        }

        // var datatable = $('#datatable').DataTable({
        //     processing: true,
        //     serverSide: true,
        //     ordering: true,
        //     ajax: {
        //         url: '{!! url()->current() !!}',
        //     },

        //     columns: [{
        //             data: 'kelas',
        //             name: 'kelas'
        //         },
        //         {
        //             data: 'created_at',
        //             name: 'created_at'
        //         },
        //         {
        //             data: 'nama_sekolah',
        //             name: 'nama_sekolah'
        //         },

        //         {
        //             data: 'action',
        //             name: 'action',
        //             orderable: false,
        //             searcable: false,
        //             width: '15%'
        //         },
        //     ],
        // });
    </script>
@endpush
{{-- 3.500.000.000 --}}
