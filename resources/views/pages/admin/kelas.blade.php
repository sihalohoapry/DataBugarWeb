@extends('layouts.admin')
@section('title')
    Kelas
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
                        <h4 class="modal-title" id="myModalLabel">Edit Kelas</h4>
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
                                    <option value="{{ $sekolah->id }}">{{ $sekolah->nama_sekolah }}</option>

                                    {{-- @foreach ($sekolah as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_sekolah }}</option>
                                    @endforeach --}}
                                </select>

                            </div>
                            <div class="form-group">
                                <label class="text-muted">Tahun Ajaran</label>
                                <select class="form-control" name="tahun_ajaran" id="tahun_ajaran" required>
                                    <option id="tahun_existing" value=""></option>
                                    <option value="2022/2023">2022/2023</option>
                                    <option value="2023/2024">2023/2024</option>
                                    <option value="2024/2025">2024/2025</option>
                                    <option value="2025/2026">2025/2026</option>
                                    <option value="2027/2028">2027/2028</option>
                                    <option value="2028/2029">2028/2029</option>
                                    <option value="2029/2030">2029/2030</option>
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

                        <form action="{{ route('delete-kelas') }}" method="POST" enctype="multipart/form-data">
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
                        <h2 class="text-md text-highlight">Kelas</h2>
                        <small class="text-muted">Daftar list kelas terdaftar</small>
                    </div>
                    <div class="flex"></div>
                    <div>
                        <a href="{{ route('tambah-kelas') }}" class="btn btn-md text-muted">
                            <span class="d-none d-sm-inline mx-1">Tambah Kelas</span>
                            <i data-feather="arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="page-content page-container" id="page-content">
                <div class="padding">

                    <div class="row">

                        @if (count($datas) == 0)
                            <div class="col-md-12 card mr-2 mt-2 text-center">
                                <div class="card-body">
                                    <h5 class="card-title">Data Kosong</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Silahkan tambah data</h6>
                                    <a href="{{ route('tambah-kelas') }}" class="btn btn-primary text-white">
                                        Tambah Data
                                    </a>
                                </div>
                            </div>
                        @endif

                        @foreach ($datas as $item)
                            <div class="col-md-3 card mr-2 mt-2">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->kelas }} ({{ $item->tahun_ajaran }})</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">{{ $item->nama_sekolah }}</h6>
                                    @php
                                        $new_array = explode('/', $item->tahun_ajaran);
                                    @endphp
                                    @if (now()->year <= $new_array[1] && now()->year >= $new_array[0])
                                        <button class="btn btn-danger" data-toggle="modal" data-target="#ModalDelete"
                                            onclick="setParameter('{{ $item->id }}')">Delete</button>
                                        <a class="btn btn-primary text-white" data-toggle="modal"
                                            data-target="#ModalEdit"
                                            onclick = "setParameterEdit('{{ $item->id }}', '{{ $item->sekolah_id }}', ' {{ $item->nama_sekolah }}' , ' {{ $item->kelas }} ', ' {{ $item->tahun_ajaran }} ')">
                                            Edit
                                        </a>
                                    @else
                                    @endif

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

        function setParameterEdit(id, sekolah_id, nama_sekolah, kelas, tahun_ajaran) {
            console.log(id, sekolah_id, nama_sekolah, kelas);

            document.getElementById('id').value = id;
            document.getElementById('tahun_existing').value = tahun_ajaran;
            document.getElementById('tahun_existing').text = tahun_ajaran;
            document.getElementById('kelas').value = kelas;
            document.getElementById('kelas').text = kelas;




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
