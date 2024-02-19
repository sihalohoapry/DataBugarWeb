@extends('layouts.admin')
@section('title')
    Tahun Ajaran
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
        <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Edit Sekolah</h4>
                        <button type="button" class="btn btn-close" data-dismiss="modal">
                            {{-- <span aria-hidden="true">&times;</span> --}}
                        </button>
                    </div>
                    <div class="modal-body">

                        <form action="{{ route('update-tahun-ajaran') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" id="id" name="id">

                            <div class="mb-3">
                                <label for="exampleInputtext1" class="form-label">Tahun Ajaran</label>
                                <input id="tahun_ajaran" type="text" class="form-control" name="tahun_ajaran" required>

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

        <div class="modal fade" id="ModalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">HAPUS DATA</h4>
                        <button type="button" class="btn btn-close" data-dismiss="modal">

                        </button>
                    </div>
                    <div class="modal-body">

                        <form action="{{ route('delete-tahun-ajaran') }}" method="POST" enctype="multipart/form-data">
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

        <div class="modal fade" id="ModalTambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Tambah Tahun Ajaran</h4>
                        <button type="button" class="btn btn-close" data-dismiss="modal">

                        </button>
                    </div>
                    <div class="modal-body">

                        <form action="{{ route('create-tahun-ajaran') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="exampleInputtext1" class="form-label">Tahun Ajaran</label>
                                <input id="tahun_ajaran" type="text" class="form-control" name="tahun_ajaran" required>
                                <p><i>contoh: <span>2023/2024</span></i></p>

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

        <!-- ############ Main START-->
        <div>
            <div class="page-hero page-container " id="page-hero">
                <div class="padding d-flex pt-0">
                    <div class="page-title">
                        <h2 class="text-md text-highlight">Tahun Ajaran</h2>
                        <small class="text-muted">Daftar list tahun ajaran</small>
                    </div>
                    <div class="flex"></div>
                    <div>
                        <a href="" data-toggle="modal" data-target="#ModalTambah" class="btn btn-md text-muted">
                            <span class="d-none d-sm-inline mx-1">Tambah Tahun Ajaran</span>
                            <i data-feather="arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="page-content page-container" id="page-content">
                <div class="padding">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-theme table-row v-middle">
                            <thead>
                                <tr>
                                    <th><span class="text-muted">Tahun Ajaran</span></th>
                                    <th><span class="text-muted">Dibuat</span></th>
                                    <th><span class="text-muted">Aksi</span></th>


                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
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

        function setParameterEdit(id, tahun_ajaran) {
            document.getElementById('id').value = id;
            document.getElementById('tahun_ajaran').value = tahun_ajaran;
        }

        var datatable = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            ajax: {
                url: '{!! url()->current() !!}',
            },

            columns: [{
                    data: 'tahun_ajaran',
                    name: 'tahun_ajaran',
                },
                {
                    data: 'created_at',
                    name: 'created_at',
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
