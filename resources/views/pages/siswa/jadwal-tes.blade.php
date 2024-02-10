@extends('layouts.admin')
@section('title')
    Jadwal Test Siswa
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
                        <h2 class="text-md text-highlight">Jadwal Tes</h2>
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
                                    <h6 class="card-subtitle mb-2 text-muted">Kamu belum memiliki jadwal tes</h6>
                                    <a class="btn btn-primary text-white" data-toggle="modal" data-target="#">
                                        Tes Mandiri
                                    </a>
                                </div>
                            </div>
                        @endif




                        <div class="col-md-12">

                            @foreach ($datas as $item)
                                <div>
                                    <button class="accordion">Tes No. {{ $item->nomer_tes }}</button>
                                    <div class="panel">

                                        <table class="table">

                                            <tbody>
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

                                        <a href="{{ route('mulai-test', $item->id) }}" class="btn btn-primary mb-2">Mulai
                                            Tes</a>
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
