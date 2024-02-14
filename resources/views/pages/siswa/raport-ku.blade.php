@extends('layouts.admin')
@section('title')
    Raport
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
                        <h2 class="text-md text-highlight">Raport</h2>
                        <small class="text-muted">Daftar list jadwal tes terdaftar</small>
                    </div>
                    <div class="flex"></div>
                </div>
            </div>


            <div class="page-content page-container" id="page-content">
                <div class="padding">
                    <div class="row">
                        @if (count($datas) == 0)
                            <div class="col-md-12 card mr-2 mt-2 text-center">
                                <div class="card-body">
                                    <h5 class="card-title">Data Kosong</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Data mu belum tersedia</h6>

                                </div>
                            </div>
                        @endif




                        <div class="col-md-12">

                            @foreach ($datas as $item)
                                <div class="mb-2">
                                    <button class="accordion" style="color: green"><span style="font-size: 16px">Tes No.
                                            {{ $item->nomer_tes }}</span> <br> <span
                                            style="font-size: 12px">{{ $item->created_at->format('d F Y H:i:s') }}</span>
                                    </button>
                                    <div class="panel">

                                        <table class="table mt-2">

                                            <tbody>
                                                <tr style="background-color: #eee">
                                                    <td>Hasil Tes MET</td>
                                                    <td>{{ $item->result_met }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Poin Tes hasil_met</td>
                                                    <td>{{ $item->point_imt }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Poin Aktivitas Berat</td>
                                                    <td>{{ $item->hasil_berat }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Poin Aktivitas Sedang</td>
                                                    <td>{{ $item->hasil_sedang }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Poin Aktivitas Ringan</td>
                                                    <td>{{ $item->hasil_ringan }}</td>
                                                </tr>
                                                <tr style="background-color: #eee">
                                                    <td>Hasil Tes IMT</td>
                                                    <td>{{ $item->result_imt }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Poin Tes IMT</td>
                                                    <td>{{ $item->point_imt }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Tinggi Badan (cm)</td>
                                                    <td>{{ $item->tinggi_badan }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Berat Badan (kg)</td>
                                                    <td>{{ $item->berat_badan }}</td>
                                                </tr>


                                                <tr style="background-color: #eee">
                                                    <td>Hasil Tes Kebugaran</td>
                                                    <td>{{ $item->result_kebugaran }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Poin Tes Kebugaran</td>
                                                    <td>{{ $item->point_kebugaran }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Jenis Kebugaran</td>
                                                    <td>{{ $item->jenis_kebugaran }}</td>
                                                </tr>

                                                <tr>
                                                    <td>Push Up</td>
                                                    <td>{{ $item->pushup }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Back Up</td>
                                                    <td>{{ $item->backup }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Pull Up</td>
                                                    <td>{{ $item->pullup }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Squat Jump</td>
                                                    <td>{{ $item->squatjump }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
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
