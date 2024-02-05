@extends('layouts.admin')
@section('title')
    Result Kebugaran
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
                        <h4 class="modal-title" id="myModalLabel">Edit Result</h4>
                        <button type="button" class="btn btn-close" data-dismiss="modal">
                            {{-- <span aria-hidden="true">&times;</span> --}}
                        </button>
                    </div>
                    <div class="modal-body">

                        <form action="{{ route('update-result-kebugaran') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" id="id" name="id">
                            <input type="hidden" id="resultT" name="resultT">
                            <input type="hidden" id="jenis_klaminT" name="jenis_klaminT">


                            <div class="form-group col-md-12">
                                <label class="text-muted">Nama Hasil</label>
                                <select class="form-control" name="result" id="result" disabled required>
                                    <option id="resultT" value="">Pilih Result</option>
                                    <option value="SUPERIOR">SUPERIOR</option>
                                    <option value="SANGAT BAIK">SANGAT BAIK</option>
                                    <option value="BAIK">BAIK</option>
                                    <option value="SEDANG">SEDANG</option>
                                    <option value="KURANG">KURANG</option>
                                    <option value="KURANG SEKALI">KURANG SEKALI</option>
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="text-muted">Jenis Klamin</label>
                                <select class="form-control" name="jenis_klamin" id="jenis_klamin" disabled required>
                                    <option value="">Pilih Jenis Klamin</option>
                                    <option value="PRIA">PRIA</option>
                                    <option value="WANITA">WANITA</option>


                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="text-muted">Result Rendah</label>
                                <input type="number" step="0.01" id="start_value" name="start_value"
                                    class="form-control" placeholder="" required>
                            </div>

                            <div class="form-group col-md-12">
                                <label class="text-muted">Result Tinggi</label>
                                <input type="number" step="0.01" id="end_value" name="end_value" class="form-control"
                                    placeholder="" required>
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

                        <form action="{{ route('delete-result-kebugaran') }}" method="POST" enctype="multipart/form-data">
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
                        <h2 class="text-md text-highlight">Result Kebugaran</h2>
                        <small class="text-muted">Daftar list Result Kebugaran terdaftar</small>
                    </div>
                    <div class="flex"></div>
                    <div>
                        <a href="{{ route('tambah-result-kebugaran') }}" class="btn btn-md text-muted">
                            <span class="d-none d-sm-inline mx-1">Tambah Result Kebugaran</span>
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
                                    <th><span class="text-muted">Result</span></th>
                                    <th><span class="text-muted">Jenis Klamin</span></th>
                                    <th><span class="text-muted">Start Result</span></th>
                                    <th><span class="text-muted">End Result</span></th>
                                    <th><span class="text-muted">Dibuat</span></th>
                                    <th><span class="text-muted">Aksi</span></th>

                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                {{-- @foreach ($data as $row) --}}

                                {{-- @endforeach --}}
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

        function setParameterEdit(id, result, jenis_klamin, start_value, end_value) {
            document.getElementById('id').value = id;
            document.getElementById('result').value = result;
            document.getElementById('resultT').value = result;

            document.getElementById('jenis_klamin').value = jenis_klamin;
            document.getElementById('start_value').value = start_value;
            document.getElementById('end_value').value = end_value;
            document.getElementById('jenis_klaminT').value = jenis_klamin;


        }

        var datatable = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            ajax: {
                url: '{!! url()->current() !!}',
            },

            columns: [{
                    data: 'result',
                    name: 'result'
                },
                {
                    data: 'jenis_klamin',
                    name: 'jenis_klamin'
                },
                {
                    data: 'start_value',
                    name: 'start_value'
                },
                {
                    data: 'end_value',
                    name: 'end_value'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
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
