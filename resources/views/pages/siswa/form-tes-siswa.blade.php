@extends('layouts.admin')
@section('title')
    Form Tes Siswa
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
    <div class="modal fade" id="FisikBerat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Aktifitas Fisik Berat</h4>
                    <button type="button" class="btn btn-close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Lengkapi data di bawah ini.
                    </p>
                    <form action="{{ route('met-berat') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="id" value="{{ $tes->id }}" name="id">
                        <div class="mb-3 mb-4">
                            <label for="exampleInputtext1" class="form-label">Apakah dalam satu minggu Anda sering melakukan
                                aktivitas fisik berat? <span class="text-muted">(Jenis aktivitas fisik berat seperti:
                                    bersepeda jarak jauh, sepak bola, futsal, basket, lari berkelanjutan lebih dari 20
                                    menit, renang, dan cabang olahraga bela diri)</span></label>
                            <div class="row m-2">
                                <div class="form-check col-md-6">
                                    <input class="form-check-input" type="radio" value="ya" name="metberat"
                                        onclick="showRookport()" id="metberat1">
                                    <label class="form-check-label" for="metberat1">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check col-md-6">
                                    <input class="form-check-input" type="radio" value="tidak" name="metberat"
                                        onclick="hiddenRookport()" id="metberat2">
                                    <label class="form-check-label" for="metberat2">
                                        Tidak
                                    </label>
                                </div>

                            </div>

                        </div>
                        <div id="rook1" class="mb-3 mb-4">
                            <label for="exampleInputtext1" class="form-label">Berapa kali dalam satu minggu melakukan
                                aktivitas fisik berat tersebut?</label>
                            <div class="row ml-2">
                                <div class="form-check mr-3">
                                    <input class="form-check-input" type="radio" value="1" name="repetisiberat"
                                        id="repetisiberat1">
                                    <label class="form-check-label" for="repetisiberat1">
                                        1
                                    </label>
                                </div>
                                <div class="form-check mr-3">
                                    <input class="form-check-input" type="radio" value="2" name="repetisiberat"
                                        id="repetisiberat2">
                                    <label class="form-check-label" for="repetisiberat2">
                                        2
                                    </label>
                                </div>
                                <div class="form-check mr-3">
                                    <input class="form-check-input" type="radio" value="3" name="repetisiberat"
                                        id="repetisiberat2">
                                    <label class="form-check-label" for="repetisiberat2">
                                        3
                                    </label>
                                </div>
                                <div class="form-check mr-3">
                                    <input class="form-check-input" type="radio" value="4" name="repetisiberat"
                                        id="repetisiberat2">
                                    <label class="form-check-label" for="repetisiberat2">
                                        4
                                    </label>
                                </div>
                                <div class="form-check mr-3">
                                    <input class="form-check-input" type="radio" value="5" name="repetisiberat"
                                        id="repetisiberat2">
                                    <label class="form-check-label" for="repetisiberat2">
                                        5
                                    </label>
                                </div>
                                <div class="form-check mr-3">
                                    <input class="form-check-input" type="radio" value="6" name="repetisiberat"
                                        id="repetisiberat2">
                                    <label class="form-check-label" for="repetisiberat2">
                                        6
                                    </label>
                                </div>
                                <div class="form-check mr-3">
                                    <input class="form-check-input" type="radio" value="7" name="repetisiberat"
                                        id="fisikberat2">
                                    <label class="form-check-label" for="fisikberat2">
                                        7
                                    </label>
                                </div>

                            </div>

                        </div>
                        <div id="rook2" class="mb-3">
                            <label for="exampleInputtext1" class="form-label">Berapa menit rata-rata Anda melakukan
                                aktivitas fisik berat tersebut dalam satu hari?
                            </label>
                            <input id="lama" type="number" class="form-control" name="lama" required>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-success">Submit</button>
                    </form>

                </div>
            </div>

        </div>
    </div>
    </div>

    <div class="modal fade" id="FisikSedang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Aktifitas Fisik Sedang</h4>
                    <button type="button" class="btn btn-close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Lengkapi data di bawah ini.
                    </p>
                    <form action="{{ route('met-sedang') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="id" value="{{ $tes->id }}" name="id">

                        <div class="mb-3 mb-4">
                            <label for="exampleInputtext1" class="form-label">Apakah dalam satu minggu Anda sering
                                melakukan
                                aktivitas fisik sedang? <span class="text-muted">(Jenis aktivitas fisik berat seperti:
                                    bersepeda jarak jauh, sepak bola, futsal, basket, lari berkelanjutan lebih dari 20
                                    menit, renang, dan cabang olahraga bela diri)</span></label>
                            <div class="row m-2">
                                <div class="form-check col-md-6">
                                    <input class="form-check-input" type="radio" value="ya" name="metsedang"
                                        onclick="showRookport2()" id="metsedang1">
                                    <label class="form-check-label" for="metsedang1">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check col-md-6">
                                    <input class="form-check-input" type="radio" value="tidak" name="metsedang"
                                        onclick="hiddenRookport2()" id="metsedang2">
                                    <label class="form-check-label" for="metsedang2">
                                        Tidak
                                    </label>
                                </div>

                            </div>

                        </div>
                        <div id="rook11" class="mb-3 mb-4" id="">
                            <label for="exampleInputtext1" class="form-label">Berapa kali dalam satu minggu melakukan
                                aktivitas fisik sedang tersebut?</label>
                            <div class="row ml-2">
                                <div class="form-check mr-3">
                                    <input class="form-check-input" type="radio" value="1" name="repetisiberat"
                                        id="repetisi1">
                                    <label class="form-check-label" for="repetisi1">
                                        1
                                    </label>
                                </div>
                                <div class="form-check mr-3">
                                    <input class="form-check-input" type="radio" value="2" name="repetisi"
                                        id="repetisi2">
                                    <label class="form-check-label" for="repetisi2">
                                        2
                                    </label>
                                </div>
                                <div class="form-check mr-3">
                                    <input class="form-check-input" type="radio" value="3" name="repetisi"
                                        id="repetisi2">
                                    <label class="form-check-label" for="repetisi2">
                                        3
                                    </label>
                                </div>
                                <div class="form-check mr-3">
                                    <input class="form-check-input" type="radio" value="4" name="repetisi"
                                        id="repetisi2">
                                    <label class="form-check-label" for="repetisi2">
                                        4
                                    </label>
                                </div>
                                <div class="form-check mr-3">
                                    <input class="form-check-input" type="radio" value="5" name="repetisi"
                                        id="repetisi2">
                                    <label class="form-check-label" for="repetisi2">
                                        5
                                    </label>
                                </div>
                                <div class="form-check mr-3">
                                    <input class="form-check-input" type="radio" value="6" name="repetisi"
                                        id="repetisi2">
                                    <label class="form-check-label" for="repetisi2">
                                        6
                                    </label>
                                </div>
                                <div class="form-check mr-3">
                                    <input class="form-check-input" type="radio" value="rookport" name="fisikberat"
                                        id="fisikberat2">
                                    <label class="form-check-label" for="fisikberat2">
                                        7
                                    </label>
                                </div>

                            </div>

                        </div>
                        <div id="rook22" class="mb-3">
                            <label for="exampleInputtext1" class="form-label">Berapa menit rata-rata Anda melakukan
                                aktivitas fisik sedang tersebut dalam satu hari?
                            </label>
                            <input id="lama" type="number" class="form-control" name="lama" required>

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

    <div class="modal fade" id="FisikRingan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Aktifitas Fisik Ringan</h4>
                    <button type="button" class="btn btn-close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Lengkapi data di bawah ini.
                    </p>
                    <form action="{{ route('met-ringan') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="id" value="{{ $tes->id }}" name="id">
                        <div class="mb-3">
                            <label for="exampleInputtext1" class="form-label">Dalam satu hari, berapa menit rata-rata Anda
                                berjalan kaki?
                            </label>
                            <input id="lama" type="number" class="form-control" name="lama" required>

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
    <div class="modal fade" id="EditFisikBerat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Edit Aktifitas Fisik Berat</h4>
                    <button type="button" class="btn btn-close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Lengkapi data di bawah ini.
                    </p>
                    <form action="{{ route('met-berat') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="id" value="{{ $tes->id }}" name="id">
                        <div class="mb-3 mb-4">
                            <label for="exampleInputtext1" class="form-label">Apakah dalam satu minggu Anda sering
                                melakukan
                                aktivitas fisik berat? <span class="text-muted">(Jenis aktivitas fisik berat seperti:
                                    bersepeda jarak jauh, sepak bola, futsal, basket, lari berkelanjutan lebih dari 20
                                    menit, renang, dan cabang olahraga bela diri)</span></label>
                            <div class="row m-2">
                                <div class="form-check col-md-6">
                                    <input class="form-check-input" type="radio" value="ya" name="metberat"
                                        onclick="showRookport()" id="metberat1">
                                    <label class="form-check-label" for="metberat1">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check col-md-6">
                                    <input class="form-check-input" type="radio" value="tidak" name="metberat"
                                        onclick="hiddenRookport()" id="metberat2">
                                    <label class="form-check-label" for="metberat2">
                                        Tidak
                                    </label>
                                </div>

                            </div>

                        </div>
                        <div id="rook1" class="mb-3 mb-4">
                            <label for="exampleInputtext1" class="form-label">Berapa kali dalam satu minggu melakukan
                                aktivitas fisik berat tersebut?</label>
                            <div class="row ml-2">
                                <div class="form-check mr-3">
                                    <input class="form-check-input" type="radio" value="1" name="repetisiberat"
                                        id="repetisiberat1">
                                    <label class="form-check-label" for="repetisiberat1">
                                        1
                                    </label>
                                </div>
                                <div class="form-check mr-3">
                                    <input class="form-check-input" type="radio" value="2" name="repetisiberat"
                                        id="repetisiberat2">
                                    <label class="form-check-label" for="repetisiberat2">
                                        2
                                    </label>
                                </div>
                                <div class="form-check mr-3">
                                    <input class="form-check-input" type="radio" value="3" name="repetisiberat"
                                        id="repetisiberat2">
                                    <label class="form-check-label" for="repetisiberat2">
                                        3
                                    </label>
                                </div>
                                <div class="form-check mr-3">
                                    <input class="form-check-input" type="radio" value="4" name="repetisiberat"
                                        id="repetisiberat2">
                                    <label class="form-check-label" for="repetisiberat2">
                                        4
                                    </label>
                                </div>
                                <div class="form-check mr-3">
                                    <input class="form-check-input" type="radio" value="5" name="repetisiberat"
                                        id="repetisiberat2">
                                    <label class="form-check-label" for="repetisiberat2">
                                        5
                                    </label>
                                </div>
                                <div class="form-check mr-3">
                                    <input class="form-check-input" type="radio" value="6" name="repetisiberat"
                                        id="repetisiberat2">
                                    <label class="form-check-label" for="repetisiberat2">
                                        6
                                    </label>
                                </div>
                                <div class="form-check mr-3">
                                    <input class="form-check-input" type="radio" value="7" name="repetisiberat"
                                        id="fisikberat2">
                                    <label class="form-check-label" for="fisikberat2">
                                        7
                                    </label>
                                </div>

                            </div>

                        </div>
                        <div id="rook2" class="mb-3">
                            <label for="exampleInputtext1" class="form-label">Berapa menit rata-rata Anda melakukan
                                aktivitas fisik berat tersebut dalam satu hari?
                            </label>
                            <input id="lama" type="number" class="form-control" name="lama" required>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-success">Submit</button>
                    </form>

                </div>
            </div>

        </div>
    </div>
    </div>

    <div class="modal fade" id="EditFisikSedang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Edit Aktifitas Fisik Sedang</h4>
                    <button type="button" class="btn btn-close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Lengkapi data di bawah ini.
                    </p>
                    <form action="{{ route('met-sedang') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="id" value="{{ $tes->id }}" name="id">

                        <div class="mb-3 mb-4">
                            <label for="exampleInputtext1" class="form-label">Apakah dalam satu minggu Anda sering
                                melakukan
                                aktivitas fisik sedang? <span class="text-muted">(Jenis aktivitas fisik berat seperti:
                                    bersepeda jarak jauh, sepak bola, futsal, basket, lari berkelanjutan lebih dari 20
                                    menit, renang, dan cabang olahraga bela diri)</span></label>
                            <div class="row m-2">
                                <div class="form-check col-md-6">
                                    <input class="form-check-input" type="radio" value="ya" name="metsedang"
                                        onclick="showRookport2()" id="metsedang1">
                                    <label class="form-check-label" for="metsedang1">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check col-md-6">
                                    <input class="form-check-input" type="radio" value="tidak" name="metsedang"
                                        onclick="hiddenRookport2()" id="metsedang2">
                                    <label class="form-check-label" for="metsedang2">
                                        Tidak
                                    </label>
                                </div>

                            </div>

                        </div>
                        <div id="rook11" class="mb-3 mb-4" id="">
                            <label for="exampleInputtext1" class="form-label">Berapa kali dalam satu minggu melakukan
                                aktivitas fisik sedang tersebut?</label>
                            <div class="row ml-2">
                                <div class="form-check mr-3">
                                    <input class="form-check-input" type="radio" value="1" name="repetisiberat"
                                        id="repetisi1">
                                    <label class="form-check-label" for="repetisi1">
                                        1
                                    </label>
                                </div>
                                <div class="form-check mr-3">
                                    <input class="form-check-input" type="radio" value="2" name="repetisi"
                                        id="repetisi2">
                                    <label class="form-check-label" for="repetisi2">
                                        2
                                    </label>
                                </div>
                                <div class="form-check mr-3">
                                    <input class="form-check-input" type="radio" value="3" name="repetisi"
                                        id="repetisi2">
                                    <label class="form-check-label" for="repetisi2">
                                        3
                                    </label>
                                </div>
                                <div class="form-check mr-3">
                                    <input class="form-check-input" type="radio" value="4" name="repetisi"
                                        id="repetisi2">
                                    <label class="form-check-label" for="repetisi2">
                                        4
                                    </label>
                                </div>
                                <div class="form-check mr-3">
                                    <input class="form-check-input" type="radio" value="5" name="repetisi"
                                        id="repetisi2">
                                    <label class="form-check-label" for="repetisi2">
                                        5
                                    </label>
                                </div>
                                <div class="form-check mr-3">
                                    <input class="form-check-input" type="radio" value="6" name="repetisi"
                                        id="repetisi2">
                                    <label class="form-check-label" for="repetisi2">
                                        6
                                    </label>
                                </div>
                                <div class="form-check mr-3">
                                    <input class="form-check-input" type="radio" value="rookport" name="fisikberat"
                                        id="fisikberat2">
                                    <label class="form-check-label" for="fisikberat2">
                                        7
                                    </label>
                                </div>

                            </div>

                        </div>
                        <div id="rook22" class="mb-3">
                            <label for="exampleInputtext1" class="form-label">Berapa menit rata-rata Anda melakukan
                                aktivitas fisik sedang tersebut dalam satu hari?
                            </label>
                            <input id="lama" type="number" class="form-control" name="lama" required>

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

    <div class="modal fade" id="EditFisikRingan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Edit Aktifitas Fisik Ringan</h4>
                    <button type="button" class="btn btn-close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Lengkapi data di bawah ini.
                    </p>
                    <form action="{{ route('met-ringan') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="id" value="{{ $tes->id }}" name="id">
                        <div class="mb-3">
                            <label for="exampleInputtext1" class="form-label">Dalam satu hari, berapa menit rata-rata Anda
                                berjalan kaki?
                            </label>
                            <input id="lama" type="number" class="form-control" name="lama" required>

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
                                    <div class="mb-2">
                                        <button class="accordion">Tes MET</button>
                                        <div class="panel">
                                            <div class="mt-2">
                                                <p>Akan ada 3 form isian, siswa diharapkan mengisi dengan sebenar-benarnya.
                                                </p>

                                                @if ($dataMET != null)
                                                    <div>

                                                        @if ($dataMET->is_fisik_berat == null)
                                                            <a href="" class="btn btn-primary mr-2 mb-2"
                                                                data-toggle="modal" data-target="#FisikBerat">Aktivitas
                                                                Fisik
                                                                Berat</a>
                                                        @endif
                                                        @if ($dataMET->is_fisik_sedang == null)
                                                            <a href="" class="btn btn-primary mr-2 mb-2"
                                                                data-toggle="modal" data-target="#FisikSedang">Aktivitas
                                                                Fisik
                                                                Sedang</a>
                                                        @endif
                                                        @if ($dataMET->is_fisik_ringan == null)
                                                            <a href=""
                                                                class="btn btn-primary mr-2 mb-2"data-toggle="modal"
                                                                data-target="#FisikRingan">Aktivitas Fisik
                                                                Ringan</a>
                                                        @endif

                                                    </div>
                                                    <div class="row mt-4">
                                                        @if ($dataMET->is_fisik_berat == true)
                                                            <table class="table">
                                                                <h5>Hasil Tes Aktivitas Berat</h5>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>Repetisi Aktifitas berat dalam seminggu</td>
                                                                        <td>{{ $dataMET->repetisi_berat }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Rata-rata waktu</td>
                                                                        <td>{{ $dataMET->lama_berat }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Hasil Aktivitas Berat</td>
                                                                        <td>{{ $dataMET->hasil_berat }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Total tes MET</td>
                                                                        <td>{{ $dataMET->hasil_met }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td> <a href=""
                                                                                class="btn btn-success mr-2 mb-2"
                                                                                data-toggle="modal"
                                                                                data-target="#EditFisikBerat">Edit
                                                                                Aktivitas Fisik
                                                                                Berat</a></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        @endif

                                                        @if ($dataMET->is_fisik_sedang == true)
                                                            <table class="table">
                                                                <h5>Hasil Tes Aktivitas Sedang</h5>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>Repetisi Aktifitas sedang dalam seminggu</td>
                                                                        <td>{{ $dataMET->repetisi_sedang }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Rata-rata waktu</td>
                                                                        <td>{{ $dataMET->lama_sedang }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Hasil Aktivitas Sedang</td>
                                                                        <td>{{ $dataMET->hasil_sedang }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Total tes MET</td>
                                                                        <td>{{ $dataMET->hasil_met }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td> <a href=""
                                                                                class="btn btn-success mr-2 mb-2"
                                                                                data-toggle="modal"
                                                                                data-target="#EditFisikSedang">Edit
                                                                                Aktivitas Fisik
                                                                                Sedang</a></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        @endif


                                                        @if ($dataMET->is_fisik_ringan == true)
                                                            <table class="table">
                                                                <h5>Hasil Tes Aktivitas Ringan</h5>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>Rata-rata waktu jalan sehari</td>
                                                                        <td>{{ $dataMET->lama_jalan }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Hasil Aktivitas ringan</td>
                                                                        <td>{{ $dataMET->hasil_ringan }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Total tes MET</td>
                                                                        <td>{{ $dataMET->hasil_met }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td> <a href=""
                                                                                class="btn btn-success mr-2 mb-2"
                                                                                data-toggle="modal"
                                                                                data-target="#EditFisikRingan">Edit
                                                                                Aktivitas Fisik
                                                                                ringan</a></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        @endif

                                                    </div>
                                                @else
                                                    <a href="" class="btn btn-primary mr-2 mb-2"
                                                        data-toggle="modal" data-target="#FisikBerat">Aktivitas
                                                        Fisik
                                                        Berat</a>
                                                    <a href="" class="btn btn-primary mr-2 mb-2"
                                                        data-toggle="modal" data-target="#FisikSedang">Aktivitas
                                                        Fisik
                                                        Sedang</a>
                                                    <a href="" class="btn btn-primary mr-2 mb-2"data-toggle="modal"
                                                        data-target="#FisikRingan">Aktivitas Fisik
                                                        Ringan</a>
                                                @endif




                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <button class="accordion">Tes IMT, kebuatan dan Kebugaran</button>
                                        <div class="panel">
                                            <div class="mt-2">
                                                <p>Tes ini akan dibagi menjadi 3 bagian yaitu <b>tes IMT</b>, <b>tes
                                                        kekuatan</b> dan <b>tes
                                                        kebugaran</b></p>
                                                <a href="" class="btn btn-primary mr-2">Mulai Tes</a>
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
