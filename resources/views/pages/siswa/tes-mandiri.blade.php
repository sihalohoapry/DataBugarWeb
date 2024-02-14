@extends('layouts.admin')
@section('title')
    Test Mandiri Siswa
@endsection
@push('addon-script')
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

<style>
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
    <div id="content" class="flex ">
        @include('alert.success')
        @include('alert.failed')
        <!-- ############ Main START-->

        <div>
            <div class="page-hero page-container " id="page-hero">
                <div class="padding d-flex pt-0">
                    <div class="page-title">
                        <h2 class="text-md text-highlight">Tes Mandiri Siswa</h2>
                        <small class="text-muted">Tes mandiri yang sudah kamu lakukan</small>
                    </div>
                    <div class="flex" style="float: right">
                        <a href="{{ route('form-tes-mandiri') }}" style="float: right" class="btn btn-primary text-white">
                            Tambah Tes Mandiri
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
                                    <h6 class="card-subtitle mb-2 text-muted">Kamu belum memiliki tes mandiri</h6>
                                    <a href="{{ route('form-tes-mandiri') }}" class="btn btn-primary text-white">
                                        Tambah Tes Mandiri
                                    </a>
                                </div>
                            </div>
                        @endif




                        <div class="col-md-12">

                            @foreach ($datas as $item)
                                <div class="mb-2">

                                    <button class="accordion" style="color: green">TES MANDIRI
                                        {{ $item->created_at->format('d F Y H:i:s') }}
                                    </button>
                                    <div class="panel">
                                        <div class="mt-2">
                                            @if ($item)
                                                <div class="card text-center">
                                                    <div class="card-header"
                                                        style="font-family: Georgia, 'Times New Roman', Times, serif; font-size: 18px">
                                                        Hasil Tes IMT, Kekuatan dan Kebugaran
                                                    </div>


                                                    <div class="card-body row">
                                                        <div class="col-md-4 mb-2">
                                                            <div
                                                                class="card @if (
                                                                    $item->result_imt == 'OBESITAS' ||
                                                                        $item->result_imt == 'SANGAT KURUS' ||
                                                                        $item->result_imt == 'KURUS' ||
                                                                        $item->result_imt == 'BERAT BERLEBIHAN' ||
                                                                        $item->result_imt == 'SANGAT KURUS') border-warning
                                                                                @else border-success @endif  mb-3">
                                                                <div class="card-header">Hasil IMT</div>
                                                                <div class="card-body ">
                                                                    <h5
                                                                        class="card-title @if (
                                                                            $item->result_imt == 'OBESITAS' ||
                                                                                $item->result_imt == 'SANGAT KURUS' ||
                                                                                $item->result_imt == 'KURUS' ||
                                                                                $item->result_imt == 'BERAT BERLEBIHAN' ||
                                                                                $item->result_imt == 'SANGAT KURUS') text-warning @else
                                                                                     text-success @endif ">
                                                                        {{ $item->result_imt }}</h5>
                                                                    <p class="card-text">Angka IMT mu <b
                                                                            style="color: black">{{ $item->point_imt }}</b>
                                                                        hasil
                                                                        dari
                                                                        berat badan
                                                                        <b style="color: black">{{ $item->berat_badan }}</b>
                                                                        dan tinggi badan <b
                                                                            style="color: black">{{ $item->tinggi_badan }}</b>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 mb-2">
                                                            <div class="card border-success mb-3">
                                                                <div class="card-header">Hasil Tes Kekuatan</div>
                                                                <div class="card-body ">
                                                                    <h5 class="card-title">Repetisi</h5>
                                                                    <table class="table">
                                                                        <thead>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <th scope="row" style="text-align: left">
                                                                                    Push
                                                                                    Up</th>
                                                                                <td style="text-align: right">
                                                                                    {{ $item->pushup }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row" style="text-align: left">
                                                                                    Sit Up
                                                                                </th>
                                                                                <td style="text-align: right">
                                                                                    {{ $item->situp }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row" style="text-align: left">
                                                                                    Back
                                                                                    Up</th>
                                                                                <td style="text-align: right">
                                                                                    {{ $item->backup }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row" style="text-align: left">
                                                                                    Squat
                                                                                    Jump</th>
                                                                                <td style="text-align: right">
                                                                                    {{ $item->squatjump }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row" style="text-align: left">
                                                                                    Pull
                                                                                    Up</th>
                                                                                <td style="text-align: right">
                                                                                    {{ $item->pullup }}
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 mb-2">
                                                            <div
                                                                class="card @if (
                                                                    $item->result_kebugaran == 'SUPERIOR' ||
                                                                        $item->result_kebugaran == 'SANGAT BAIK' ||
                                                                        $item->result_kebugaran == 'BAIK' ||
                                                                        $item->result_kebugaran == 'SEDANG') border-success
                                                                                @else
                                                                                    border-warning @endif mb-3">
                                                                <div class="card-header">Nilai Tes Kebugaran</div>
                                                                <div class="card-body ">
                                                                    <h5
                                                                        class="card-title @if (
                                                                            $item->result_kebugaran == 'SUPERIOR' ||
                                                                                $item->result_kebugaran == 'SANGAT BAIK' ||
                                                                                $item->result_kebugaran == 'BAIK' ||
                                                                                $item->result_kebugaran == 'SEDANG') text-success
                                                                                        @else
                                                                                            text-warning @endif">
                                                                        {{ $item->result_kebugaran }}
                                                                    </h5>
                                                                    <table class="table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th scope="col" colspan="2">
                                                                                    {{ $item->jenis_kebugaran }}
                                                                                </th>
                                                                                <th scope="col"></th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @if ($item->waktu_jalan != null)
                                                                                <tr>
                                                                                    <td>Waktu Jalan 1,6 km</td>
                                                                                    <td>{{ $item->waktu_jalan }}
                                                                                    </td>
                                                                                </tr>
                                                                            @endif
                                                                            @if ($item->waktu_lari != null)
                                                                                <tr>
                                                                                    <td>Waktu Jalan 2,4 km</td>
                                                                                    <td>{{ $item->waktu_lari }}
                                                                                    </td>
                                                                                </tr>
                                                                            @endif
                                                                            <tr>
                                                                                <td>VO2 max (ml/kg/min)</td>
                                                                                <td>{{ $item->point_kebugaran }}
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="card-footer text-muted">
                                                        {{ $item->created_at->format('d F Y H:i:s') }}
                                                    </div>
                                                </div>
                                            @endif

                                        </div>

                                    </div>
                                </div>
                            @endforeach




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
@endpush
{{-- 3.500.000.000 --}}
