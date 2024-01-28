@extends('layouts.admin')
@section('title')
Guru
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
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.1/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/fc-4.1.0/datatables.min.js"></script>

@endpush
@section('content')
<div id="content" class="flex ">
    @include('alert.success')
    @include('alert.failed')

                    <div class="modal fade" id="ModalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel">HAPUS DATA</h4>
                                        <button type="button" class="btn btn-close" data-dismiss="modal" >
                                        
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <form action="{{ route('delete-guru') }}" method="POST" enctype="multipart/form-data">
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
                                <h2 class="text-md text-highlight">Guru</h2>
                                <small class="text-muted">Daftar list guru terdaftar</small>
                            </div>
                            <div class="flex"></div>
                            <div>
                                <a href="{{ route('tambah-guru')}}" class="btn btn-md text-muted">
                                    <span class="d-none d-sm-inline mx-1">Tambah Guru</span>
                                    <i data-feather="arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="page-content page-container" id="page-content">
                        <div class="padding">
                            <div class="table-responsive">
                                <table id="datatable" class="table table-theme table-row v-middle" >
                                    <thead>
                                        <tr>
                                            <th><span class="text-muted">Name</span></th>
                                            <th><span class="text-muted">Role</span></th>
                                            <th><span class="text-muted">Nama Sekolah</span></th>
                                            <th><span class="text-muted">Dibuat</span></th>
                                            <th><span class="text-muted">Aksi</span></th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $no = 1;
                                    @endphp
                                    {{-- @foreach ($data as $row ) --}}
                                    
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
        function setParameter(id){
            document.getElementById('idData').value = id;

        }
    </script>

<script>
    
    var datatable = $('#datatable').DataTable({
            processing: true,
            serverSide:true,
            ordering:true,
            ajax:{
                url: '{!! url()->current() !!}',
            },
            
            columns:[
                {data:'name', name: 'users.name'},
                {data:'role', name: 'users.role'},
                {data:'nama_sekolah', name: 'sekolahs.nama_sekolah'},
                {data:'created_at', name: 'created_at'},
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