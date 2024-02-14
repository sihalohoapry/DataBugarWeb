@extends('layouts.admin')
@section('title')
    Form Tes Mandiri
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
    <div id="content" class="flex ">
        @include('alert.success')
        @include('alert.failed')
        <!-- ############ Main START-->
        <div>
            <div class="page-content page-container" id="page-content">
                <div class="padding pt-0">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong>Daftar tes yang harus dilakukan</strong>
                                </div>
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-sm-4 col-md-8" style="margin-bottom: 100px">
                                            <div>
                                                <ul class="nav nav-pills">
                                                    @foreach ($serve as $count => $serves)
                                                        <li class="nav-item">
                                                            <a class="nav-link @if ($count == 0) active @endif"
                                                                data-toggle="pill"
                                                                href="#menu{{ $serves->id }}">{{ $serves->judul }}</a>
                                                        </li>
                                                    @endforeach

                                                </ul>
                                            </div>

                                            <!-- Tab panes -->
                                            <div class="tab-content ">

                                                @foreach ($serve as $count => $serves)
                                                    <div class="tab-pane container fade @if ($count == 0) active show @endif  mt-4"
                                                        style="height: 80%;" id="menu{{ $serves->id }}">
                                                        <iframe width="100%" height="70%"
                                                            src="https://www.youtube.com/embed/{{ substr($serves->url_video, 17) }}"
                                                            {{-- title="YouTube video player" frameborder="0" --}} type="text/html" {{-- allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture;" --}}
                                                            allowfullscreen></iframe>
                                                        <div class="mt-4">
                                                            {!! $serves->deskripsi !!}
                                                        </div>

                                                    </div>
                                                @endforeach

                                            </div>

                                        </div>
                                        <div class="col-md-4 p-4">
                                            <form action="{{ route('submit-tes-mandiri') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-12 mb-2"><b>IMT</b></div>
                                                    <div class="form-group col-md-12">
                                                        <label class="text-muted">Jenis Klamin</label>
                                                        <input type="text" value="{{ Auth::user()->gender }}" readonly
                                                            id="jenis_klamin" name="jenis_klamin" class="form-control"
                                                            required placeholder="kg">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="text-muted">Berat Badan</label>
                                                        <input type="number" step="0.01" id="berat" name="berat"
                                                            class="form-control" required placeholder="kg">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="text-muted">Tinggi Badan</label>
                                                        <input type="number" step="0.01" id="tinggi" name="tinggi"
                                                            class="form-control" required placeholder="cm">
                                                    </div>
                                                    <div class="col-12 mt-3 mb-2">
                                                        <p><b>Tes Kekuatan</b></p>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="text-muted">Push Up</label>
                                                        <input type="number" step="0.01" id="pushup" name="pushup"
                                                            class="form-control" required>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="text-muted">Sit Up</label>
                                                        <input type="number" step="0.01" id="situp" name="situp"
                                                            class="form-control" required>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="text-muted">Back Up</label>
                                                        <input type="number" step="0.01" id="backup" name="backup"
                                                            class="form-control" required>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="text-muted">Squat Jump</label>
                                                        <input type="number" step="0.01" id="squatjump" name="squatjump"
                                                            class="form-control" required>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="text-muted">Pull Up</label>
                                                        <input type="number" step="0.01" id="pullup" name="pullup"
                                                            class="form-control" required>
                                                    </div>



                                                    <div class="col-12 mt-3 mb-2">
                                                        <p><b>Tes Kebugaran</b></p>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label class="text-muted">Jenis Tes</label>
                                                        <div class="row ml-2">
                                                            <div class="form-check col-md-6">
                                                                <input class="form-check-input" type="radio"
                                                                    value="cooper" name="flexRadioDefault"
                                                                    onclick="hiddenRookporttes()" id="flexRadioDefault1">
                                                                <label class="form-check-label" for="flexRadioDefault1">
                                                                    Cooper Test
                                                                </label>
                                                            </div>
                                                            <div class="form-check col-md-6">
                                                                <input class="form-check-input" type="radio"
                                                                    value="rookport" name="flexRadioDefault"
                                                                    onclick="showRookporttes()" id="flexRadioDefault2">
                                                                <label class="form-check-label" for="flexRadioDefault2">
                                                                    Rookport Test
                                                                </label>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6" id="coop1tes">
                                                        <label class="text-muted">Waktu Lari</label>
                                                        <input type="number" step="0.01" id="waktu_lari_coop"
                                                            name="waktu_lari_coop" class="form-control"
                                                            placeholder="menit">
                                                    </div>
                                                    <div class="form-group col-md-6" id="coop2tes">
                                                        <label class="text-muted">Detik</label>
                                                        <input type="number" step="0.01" id="detik_coop"
                                                            name="detik_coop" max="59" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-12  hiddendong" id="rook1tes">
                                                        <label class="text-muted">Denyut Nadi Sebelum
                                                            jalan</label>
                                                        <input type="number" step="0.01" id="waktu_lari"
                                                            name="waktu_lari" class="form-control" placeholder="/menit">
                                                    </div>
                                                    <div class="form-group col-md-12  hiddendong" id="rook2tes">
                                                        <label class="text-muted">Waktu jalan</label>
                                                        <input type="number" step="0.01" id="waktu_jalan"
                                                            name="waktu_jalan" class="form-control" placeholder="menit">
                                                    </div>
                                                    <div class="form-group col-md-12  hiddendong" id="rook3tes">
                                                        <label class="text-muted">Denyut Nadi sesudah
                                                            jalan</label>
                                                        <input type="number" step="0.01" id="denyut_nadi_setelah"
                                                            name="denyut_nadi_setelah" placeholder="/menit"
                                                            class="form-control">
                                                    </div>

                                                </div>
                                                <button type="submit"
                                                    class="btn btn-primary mt-3 float-right">Submit</button>
                                            </form>

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
