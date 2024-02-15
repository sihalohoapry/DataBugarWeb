@extends('layouts.admin')
@section('title')
    Detail Tes
@endsection
<style>
    .hiddendong {
        display: none;
    }

    .accordion {
        background-color: #eee;
        color: #444;
        cursor: pointer;
        padding: 18px;
        width: 100%;
        border: none;
        text-align: left;
        outline: none;
        font-size: 15px;
        /* transition: 0.4s; */

    }

    .active,
    .accordion:hover {
        background-color: #ccc;
    }

    .panel {
        padding: 0 18px;
        display: none;
        background-color: white;
        overflow: hidden;


    }
</style>
@section('content')
    {{-- Modal --}}


    <div id="content" class="flex ">
        @include('alert.success')
        @include('alert.failed')
        <!-- ############ Main START-->
        <div>
            <div class="page-hero page-container " id="page-hero">
                <div class="padding d-flex pt-0">
                    <div class="page-title">
                        <h2 class="text-md text-highlight">Nomer TES {{ $jadwal_tes->nomer_tes }} </h2>
                        <small class="text-muted">Siswa - siswa yang sudah submit tes</small>
                    </div>
                    <div class="flex"></div>
                </div>
            </div>
            <div>
                <div class="page-content page-container" id="page-content">
                    <div class="padding pt-0">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">

                                        <strong></strong>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-2">

                                            <button class="accordion">Tes MET
                                            </button>
                                            @if (count($tesMET) == 0)
                                                <div class="col-md-12 card mr-2 mt-2 text-center">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Data Kosong</h5>
                                                        <h6 class="card-subtitle mb-2 text-muted">Tidak ada siswa yang
                                                            submit</h6>
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="panel">
                                                <div class="mt-2">
                                                    <form action="{{ route('report-tes-met', $jadwal_tes->id) }}"
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <button class="btn btn-success">Download Report Hasil MET</button>
                                                    </form>
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">Nama</th>
                                                                <th scope="col">Poin</th>
                                                                <th scope="col">Hasil</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($tesMET as $item)
                                                                <tr>
                                                                    <td>{{ $item->name }}</td>
                                                                    <td>{{ $item->hasil_met }}</td>
                                                                    <td>{{ $item->result_met }}</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <button class="accordion">Tes IMT, Kekuatan dan Kebugaran
                                            </button>
                                            @if (count($tesIMTKebugaran) == 0)
                                                <div class="col-md-12 card mr-2 mt-2 text-center">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Data Kosong</h5>
                                                        <h6 class="card-subtitle mb-2 text-muted">Tidak ada siswa yang
                                                            submit</h6>
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="panel">
                                                <div class="mt-2">
                                                    <form action="{{ route('report-tes', $jadwal_tes->id) }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <button class="btn btn-success">Download Report Hasil</button>
                                                    </form>
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">Nama</th>
                                                                    <th scope="col">Poin IMT</th>
                                                                    <th scope="col">Hasil IMT</th>
                                                                    <th scope="col">Jenis Kebugaran</th>
                                                                    <th scope="col">Poin Kebugaran</th>
                                                                    <th scope="col">Hasil Kebugaran</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($tesIMTKebugaran as $item)
                                                                    <tr>
                                                                        <td>{{ $item->name }}</td>
                                                                        <td>{{ $item->point_imt }}</td>
                                                                        <td>{{ $item->result_imt }}</td>
                                                                        <td>{{ $item->jenis_kebugaran }}</td>
                                                                        <td>{{ $item->point_kebugaran }}</td>
                                                                        <td>{{ $item->result_kebugaran }}</td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

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
    @push('addon-script')
        <script>
            function showRookporttes() {
                document.getElementById('rook1tes').classList.remove('hiddendong')
                document.getElementById('rook2tes').classList.remove('hiddendong')
                document.getElementById('rook3tes').classList.remove('hiddendong')

                document.getElementById('coop1tes').classList.add('hiddendong')
                document.getElementById('coop2tes').classList.add('hiddendong')


            }
        </script>
        <script>
            function hiddenRookporttes() {
                document.getElementById('rook1tes').classList.add('hiddendong')
                document.getElementById('rook2tes').classList.add('hiddendong')
                document.getElementById('rook3tes').classList.add('hiddendong')

                document.getElementById('coop1tes').classList.remove('hiddendong')
                document.getElementById('coop2tes').classList.remove('hiddendong')


            }
        </script>
        <script>
            var acc = document.getElementsByClassName("accordion");
            var i;

            for (i = 0; i < acc.length; i++) {
                acc[i].addEventListener("click", function() {
                    this.classList.toggle("active");
                    var panel = this.nextElementSibling;
                    if (panel.style.display === "block") {
                        panel.style.display = "none";
                    } else {
                        panel.style.display = "block";
                    }
                });
            }
        </script>
        <script>
            function showRookport() {
                document.getElementById('rook1').classList.remove('hiddendong')
                document.getElementById('rook2').classList.remove('hiddendong')

            }
        </script>
        <script>
            function hiddenRookport() {
                document.getElementById('rook1').classList.add('hiddendong')
                document.getElementById('rook2').classList.add('hiddendong')



            }
        </script>
        <script>
            function showRookport2() {
                document.getElementById('rook11').classList.remove('hiddendong')
                document.getElementById('rook22').classList.remove('hiddendong')


            }
        </script>
        <script>
            function hiddenRookport2() {
                document.getElementById('rook11').classList.add('hiddendong')
                document.getElementById('rook22').classList.add('hiddendong')


            }
        </script>
    @endpush
