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
    @if ($dataMET)
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
                        <form action="{{ route('met-berat-edit') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" id="id" value="{{ $dataMET->id }}" name="id">
                            <div class="mb-3 mb-4">
                                <label for="exampleInputtext1" class="form-label">Apakah dalam satu minggu Anda sering
                                    melakukan
                                    aktivitas fisik berat? <span class="text-muted">(Jenis aktivitas fisik berat
                                        seperti:
                                        bersepeda jarak jauh, sepak bola, futsal, basket, lari berkelanjutan lebih dari
                                        20
                                        menit, renang, dan cabang olahraga bela diri)</span></label>
                                <div class="row m-2">
                                    <div class="form-check col-md-6">
                                        <input class="form-check-input" type="radio" value="ya" name="metberat"
                                            @if ($dataMET->is_fisik_berat) checked @endif onclick="showRookport()"
                                            id="metberatedit1">
                                        <label class="form-check-label" for="metberatedit1">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check col-md-6">
                                        <input class="form-check-input" type="radio" value="tidak" name="metberat"
                                            @if ($dataMET->is_fisik_berat == false) checked @endif onclick="hiddenRookport()"
                                            id="metberatedit2">
                                        <label class="form-check-label" for="metberatedit2">
                                            Tidak
                                        </label>
                                    </div>

                                </div>

                            </div>
                            <div id="rook1" class="mb-3 mb-4">
                                <label for="exampleInputtext1" class="form-label">Berapa kali dalam satu minggu
                                    melakukan
                                    aktivitas fisik berat tersebut?</label>
                                <div class="row ml-2">
                                    <div class="form-check mr-3">
                                        <input class="form-check-input" type="radio" value="1"
                                            name="repetisiberat" id="repetisiberat1">
                                        @if ($dataMET->repetisi_berat == 1)
                                            checked
                                        @endif
                                        <label class="form-check-label" for="repetisiberat1">
                                            1
                                        </label>
                                    </div>
                                    <div class="form-check mr-3">
                                        <input class="form-check-input" type="radio"
                                            @if ($dataMET->repetisi_berat == 2) checked @endif value="2"
                                            name="repetisiberat" id="repetisiberat2">
                                        <label class="form-check-label" for="repetisiberat2">
                                            2
                                        </label>
                                    </div>
                                    <div class="form-check mr-3">
                                        <input class="form-check-input" type="radio"
                                            @if ($dataMET->repetisi_berat == 3) checked @endif value="3"
                                            name="repetisiberat" id="repetisiberat2">
                                        <label class="form-check-label" for="repetisiberat2">
                                            3
                                        </label>
                                    </div>
                                    <div class="form-check mr-3">
                                        <input class="form-check-input" type="radio"
                                            @if ($dataMET->repetisi_berat == 4) checked @endif value="4"
                                            name="repetisiberat" id="repetisiberat2">
                                        <label class="form-check-label" for="repetisiberat2">
                                            4
                                        </label>
                                    </div>
                                    <div class="form-check mr-3">
                                        <input class="form-check-input" type="radio"
                                            @if ($dataMET->repetisi_berat == 5) checked @endif value="5"
                                            name="repetisiberat" id="repetisiberat2">
                                        <label class="form-check-label" for="repetisiberat2">
                                            5
                                        </label>
                                    </div>
                                    <div class="form-check mr-3">
                                        <input class="form-check-input" type="radio"
                                            @if ($dataMET->repetisi_berat == 6) checked @endif value="6"
                                            name="repetisiberat" id="repetisiberat2">
                                        <label class="form-check-label" for="repetisiberat2">
                                            6
                                        </label>
                                    </div>
                                    <div class="form-check mr-3">
                                        <input class="form-check-input" type="radio" value="7"
                                            name="repetisiberat" @if ($dataMET->repetisi_berat == 7) checked @endif
                                            id="fisikberat2">
                                        <label class="form-check-label" for="fisikberat2">
                                            7
                                        </label>
                                    </div>

                                </div>

                            </div>
                            <div id="rook2" class="mb-3">
                                <label for="exampleInputtext1" class="form-label">Berapa menit rata-rata Anda
                                    melakukan
                                    aktivitas fisik berat tersebut dalam satu hari?
                                </label>
                                <input id="lama" type="number" class="form-control" name="lama"
                                    value="{{ $dataMET->lama_berat }}" required>

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
                        <form action="{{ route('met-sedang-edit') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" id="id" value="{{ $tes->id }}" name="id">

                            <div class="mb-3 mb-4">
                                <label for="exampleInputtext1" class="form-label">Apakah dalam satu minggu Anda sering
                                    melakukan
                                    aktivitas fisik sedang? <span class="text-muted">(Jenis aktivitas fisik berat
                                        seperti:
                                        bersepeda jarak jauh, sepak bola, futsal, basket, lari berkelanjutan lebih dari
                                        20
                                        menit, renang, dan cabang olahraga bela diri)</span></label>
                                <div class="row m-2">
                                    <div class="form-check col-md-6">
                                        <input class="form-check-input" type="radio" value="ya" name="metsedang"
                                            id="metsedang1" @if ($dataMET->repetisi_sedang) checked @endif>

                                        <label class="form-check-label" for="metsedang1">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check col-md-6">
                                        <input class="form-check-input" type="radio" value="tidak" name="metsedang"
                                            id="metsedang2">
                                        <label class="form-check-label" for="metsedang2">
                                            Tidak
                                        </label>
                                    </div>

                                </div>

                            </div>
                            <div id="rook11" class="mb-3 mb-4" id="">
                                <label for="exampleInputtext1" class="form-label">Berapa kali dalam satu minggu
                                    melakukan
                                    aktivitas fisik sedang tersebut?</label>
                                <div class="row ml-2">
                                    <div class="form-check mr-3">
                                        <input class="form-check-input" type="radio" value="1" name="repetisi"
                                            @if ($dataMET->repetisi_sedang == 1) checked @endif id="repetisi1">
                                        <label class="form-check-label" for="repetisi1">
                                            1
                                        </label>
                                    </div>
                                    <div class="form-check mr-3">
                                        <input class="form-check-input" type="radio" value="2" name="repetisi"
                                            @if ($dataMET->repetisi_sedang == 2) checked @endif id="repetisi2">
                                        <label class="form-check-label" for="repetisi2">
                                            2
                                        </label>
                                    </div>
                                    <div class="form-check mr-3">
                                        <input class="form-check-input" type="radio" value="3" name="repetisi"
                                            @if ($dataMET->repetisi_sedang == 3) checked @endif id="repetisi2">
                                        <label class="form-check-label" for="repetisi2">
                                            3
                                        </label>
                                    </div>
                                    <div class="form-check mr-3">
                                        <input class="form-check-input" type="radio" value="4" name="repetisi"
                                            @if ($dataMET->repetisi_sedang == 4) checked @endif id="repetisi2">
                                        <label class="form-check-label" for="repetisi2">
                                            4
                                        </label>
                                    </div>
                                    <div class="form-check mr-3">
                                        <input class="form-check-input" type="radio" value="5" name="repetisi"
                                            @if ($dataMET->repetisi_sedang == 5) checked @endif id="repetisi2">
                                        <label class="form-check-label" for="repetisi2">
                                            5
                                        </label>
                                    </div>
                                    <div class="form-check mr-3">
                                        <input class="form-check-input" type="radio" value="6" name="repetisi"
                                            @if ($dataMET->repetisi_sedang == 6) checked @endif id="repetisi2">
                                        <label class="form-check-label" for="repetisi2">
                                            6
                                        </label>
                                    </div>
                                    <div class="form-check mr-3">
                                        <input class="form-check-input" type="radio" value="rookport" name="repetisi"
                                            @if ($dataMET->repetisi_sedang == 7) checked @endif id="fisikberat2">
                                        <label class="form-check-label" for="fisikberat2">
                                            7
                                        </label>
                                    </div>

                                </div>

                            </div>
                            <div id="rook22" class="mb-3">
                                <label for="exampleInputtext1" class="form-label">Berapa menit rata-rata Anda
                                    melakukan
                                    aktivitas fisik sedang tersebut dalam satu hari?
                                </label>
                                <input id="lama" type="number" class="form-control" name="lama"
                                    value="{{ $dataMET->lama_sedang }}" required>

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
                        <form action="{{ route('met-ringan-edit') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" id="id" value="{{ $tes->id }}" name="id">
                            <div class="mb-3">
                                <label for="exampleInputtext1" class="form-label">Dalam satu hari, berapa menit rata-rata
                                    Anda
                                    berjalan kaki?
                                </label>
                                <input id="lama" type="number" class="form-control" name="lama"
                                    value="{{ $dataMET->lama_jalan }}" required>

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
    @endif

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
                                        <button class="accordion">Tes MET @if ($dataMET)
                                                <span
                                                    style="float: right; @if ($dataMET->result_met == 'RENDAH') color: red;
                                                @else 
                                                color:green; @endif">
                                                    &#10004;
                                                    {{ $dataMET->result_met }}</span>
                                            @else
                                            @endif
                                        </button>
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
                                        <button class="accordion">Tes IMT, Kekuatan dan Kebugaran @if ($hasilTesIMTKebugaran)
                                                <span style="float: right; color:green">
                                                    &#10004;
                                                    DONE</span>
                                            @endif
                                        </button>
                                        <div class="panel">
                                            <div class="mt-2">
                                                @if ($hasilTesIMTKebugaran)
                                                    <div class="card text-center">
                                                        <div class="card-header"
                                                            style="font-family: Georgia, 'Times New Roman', Times, serif; font-size: 18px">
                                                            Hasil Tes IMT, Kekuatan dan Kebugaran
                                                        </div>


                                                        <div class="card-body row">
                                                            <div class="col-md-4">
                                                                <div
                                                                    class="card @if (
                                                                        $hasilTesIMTKebugaran->result_imt == 'OBESITAS' ||
                                                                            $hasilTesIMTKebugaran->result_imt == 'SANGAT KURUS' ||
                                                                            $hasilTesIMTKebugaran->result_imt == 'KURUS' ||
                                                                            $hasilTesIMTKebugaran->result_imt == 'BERAT BERLEBIHAN' ||
                                                                            $hasilTesIMTKebugaran->result_imt == 'SANGAT KURUS') border-warning
                                                                                @else border-success @endif  mb-3">
                                                                    <div class="card-header">Hasil IMT</div>
                                                                    <div class="card-body ">
                                                                        <h5
                                                                            class="card-title @if (
                                                                                $hasilTesIMTKebugaran->result_imt == 'OBESITAS' ||
                                                                                    $hasilTesIMTKebugaran->result_imt == 'SANGAT KURUS' ||
                                                                                    $hasilTesIMTKebugaran->result_imt == 'KURUS' ||
                                                                                    $hasilTesIMTKebugaran->result_imt == 'BERAT BERLEBIHAN' ||
                                                                                    $hasilTesIMTKebugaran->result_imt == 'SANGAT KURUS') text-warning @else
                                                                                     text-success @endif ">
                                                                            {{ $hasilTesIMTKebugaran->result_imt }}</h5>
                                                                        <p class="card-text">Angka IMT mu <b
                                                                                style="color: black">{{ $hasilTesIMTKebugaran->point_imt }}</b>
                                                                            hasil
                                                                            dari
                                                                            berat badan
                                                                            <b
                                                                                style="color: black">{{ $hasilTesIMTKebugaran->berat_badan }}</b>
                                                                            dan tinggi badan <b
                                                                                style="color: black">{{ $hasilTesIMTKebugaran->tinggi_badan }}</b>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="card border-success mb-3">
                                                                    <div class="card-header">Hasil Tes Kekuatan</div>
                                                                    <div class="card-body ">
                                                                        <h5 class="card-title">Repetisi</h5>
                                                                        <table class="table">
                                                                            <thead>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <th scope="row"
                                                                                        style="text-align: left">Push
                                                                                        Up</th>
                                                                                    <td style="text-align: right">
                                                                                        {{ $hasilTesIMTKebugaran->pushup }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row"
                                                                                        style="text-align: left">Sit Up
                                                                                    </th>
                                                                                    <td style="text-align: right">
                                                                                        {{ $hasilTesIMTKebugaran->situp }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row"
                                                                                        style="text-align: left">Back
                                                                                        Up</th>
                                                                                    <td style="text-align: right">
                                                                                        {{ $hasilTesIMTKebugaran->backup }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row"
                                                                                        style="text-align: left">Squat
                                                                                        Jump</th>
                                                                                    <td style="text-align: right">
                                                                                        {{ $hasilTesIMTKebugaran->squatjump }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th scope="row"
                                                                                        style="text-align: left">Pull
                                                                                        Up</th>
                                                                                    <td style="text-align: right">
                                                                                        {{ $hasilTesIMTKebugaran->pullup }}
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div
                                                                    class="card @if (
                                                                        $hasilTesIMTKebugaran->result_kebugaran == 'SUPERIOR' ||
                                                                            $hasilTesIMTKebugaran->result_kebugaran == 'SANGAT BAIK' ||
                                                                            $hasilTesIMTKebugaran->result_kebugaran == 'BAIK' ||
                                                                            $hasilTesIMTKebugaran->result_kebugaran == 'SEDANG') border-success
                                                                                @else
                                                                                    border-warning @endif mb-3">
                                                                    <div class="card-header">Nilai Tes Kebugaran</div>
                                                                    <div class="card-body ">
                                                                        <h5
                                                                            class="card-title @if (
                                                                                $hasilTesIMTKebugaran->result_kebugaran == 'SUPERIOR' ||
                                                                                    $hasilTesIMTKebugaran->result_kebugaran == 'SANGAT BAIK' ||
                                                                                    $hasilTesIMTKebugaran->result_kebugaran == 'BAIK' ||
                                                                                    $hasilTesIMTKebugaran->result_kebugaran == 'SEDANG') text-success
                                                                                        @else
                                                                                            text-warning @endif">
                                                                            {{ $hasilTesIMTKebugaran->result_kebugaran }}
                                                                        </h5>
                                                                        <table class="table">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th scope="col" colspan="2">
                                                                                        {{ $hasilTesIMTKebugaran->jenis_kebugaran }}
                                                                                    </th>
                                                                                    <th scope="col"></th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                @if ($hasilTesIMTKebugaran->waktu_jalan != null)
                                                                                    <tr>
                                                                                        <td>Waktu Jalan 1,6 km</td>
                                                                                        <td>{{ $hasilTesIMTKebugaran->waktu_jalan }}
                                                                                        </td>
                                                                                    </tr>
                                                                                @endif
                                                                                @if ($hasilTesIMTKebugaran->waktu_lari != null)
                                                                                    <tr>
                                                                                        <td>Waktu Jalan 2,4 km</td>
                                                                                        <td>{{ $hasilTesIMTKebugaran->waktu_lari }}
                                                                                        </td>
                                                                                    </tr>
                                                                                @endif
                                                                                <tr>
                                                                                    <td>VO2 max (ml/kg/min)</td>
                                                                                    <td>{{ $hasilTesIMTKebugaran->point_kebugaran }}
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="card-footer text-muted">
                                                            {{ \Carbon\Carbon::now()->format('d F Y') }}
                                                        </div>
                                                    </div>
                                                @else
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
                                                                        style="height: 80%;"
                                                                        id="menu{{ $serves->id }}">
                                                                        <iframe width="100%" height="70%"
                                                                            src="https://www.youtube.com/embed/{{ substr($serves->url_video, 17) }}"
                                                                            {{-- title="YouTube video player" frameborder="0" --}} type="text/html"
                                                                            {{-- allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture;" --}} allowfullscreen></iframe>
                                                                        <div class="mt-4">
                                                                            {!! $serves->deskripsi !!}
                                                                        </div>

                                                                    </div>
                                                                @endforeach

                                                            </div>

                                                        </div>
                                                        <div class="col-md-4 p-4">
                                                            <form action="{{ route('submit-tes') }}" method="POST"
                                                                enctype="multipart/form-data">
                                                                @csrf
                                                                <input type="hidden" name="id_tes" id="id_tes"
                                                                    value="{{ $tes->id }}">
                                                                <div class="row">
                                                                    <div class="col-12 mb-2"><b>IMT</b></div>
                                                                    <div class="form-group col-md-12">
                                                                        <label class="text-muted">Jenis Klamin</label>
                                                                        <input type="text"
                                                                            value="{{ Auth::user()->gender }}" readonly
                                                                            id="jenis_klamin" name="jenis_klamin"
                                                                            class="form-control" required
                                                                            placeholder="kg">
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label class="text-muted">Berat Badan</label>
                                                                        <input type="number" step="0.01"
                                                                            id="berat" name="berat"
                                                                            class="form-control" required
                                                                            placeholder="kg">
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label class="text-muted">Tinggi Badan</label>
                                                                        <input type="number" step="0.01"
                                                                            id="tinggi" name="tinggi"
                                                                            class="form-control" required
                                                                            placeholder="cm">
                                                                    </div>
                                                                    <div class="col-12 mt-3 mb-2">
                                                                        <p><b>Tes Kekuatan</b></p>
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label class="text-muted">Push Up</label>
                                                                        <input type="number" step="0.01"
                                                                            id="pushup" name="pushup"
                                                                            class="form-control" required>
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label class="text-muted">Sit Up</label>
                                                                        <input type="number" step="0.01"
                                                                            id="situp" name="situp"
                                                                            class="form-control" required>
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label class="text-muted">Back Up</label>
                                                                        <input type="number" step="0.01"
                                                                            id="backup" name="backup"
                                                                            class="form-control" required>
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label class="text-muted">Squat Jump</label>
                                                                        <input type="number" step="0.01"
                                                                            id="squatjump" name="squatjump"
                                                                            class="form-control" required>
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label class="text-muted">Pull Up</label>
                                                                        <input type="number" step="0.01"
                                                                            id="pullup" name="pullup"
                                                                            class="form-control" required>
                                                                    </div>



                                                                    <div class="col-12 mt-3 mb-2">
                                                                        <p><b>Tes Kebugaran</b></p>
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        <label class="text-muted">Jenis Tes</label>
                                                                        <div class="row ml-2">
                                                                            <div class="form-check col-md-6">
                                                                                <input class="form-check-input"
                                                                                    type="radio" value="cooper"
                                                                                    name="flexRadioDefault"
                                                                                    onclick="hiddenRookporttes()"
                                                                                    id="flexRadioDefault1">
                                                                                <label class="form-check-label"
                                                                                    for="flexRadioDefault1">
                                                                                    Cooper Test
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check col-md-6">
                                                                                <input class="form-check-input"
                                                                                    type="radio" value="rookport"
                                                                                    name="flexRadioDefault"
                                                                                    onclick="showRookporttes()"
                                                                                    id="flexRadioDefault2">
                                                                                <label class="form-check-label"
                                                                                    for="flexRadioDefault2">
                                                                                    Rookport Test
                                                                                </label>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-md-6" id="coop1tes">
                                                                        <label class="text-muted">Waktu Lari</label>
                                                                        <input type="number" step="0.01"
                                                                            id="waktu_lari_coop" name="waktu_lari_coop"
                                                                            class="form-control" placeholder="menit">
                                                                    </div>
                                                                    <div class="form-group col-md-6" id="coop2tes">
                                                                        <label class="text-muted">Detik</label>
                                                                        <input type="number" step="0.01"
                                                                            id="detik_coop" name="detik_coop"
                                                                            max="59" class="form-control">
                                                                    </div>
                                                                    <div class="form-group col-md-12  hiddendong"
                                                                        id="rook1tes">
                                                                        <label class="text-muted">Denyut Nadi Sebelum
                                                                            jalan</label>
                                                                        <input type="number" step="0.01"
                                                                            id="waktu_lari" name="waktu_lari"
                                                                            class="form-control" placeholder="/menit">
                                                                    </div>
                                                                    <div class="form-group col-md-12  hiddendong"
                                                                        id="rook2tes">
                                                                        <label class="text-muted">Waktu jalan</label>
                                                                        <input type="number" step="0.01"
                                                                            id="waktu_jalan" name="waktu_jalan"
                                                                            class="form-control" placeholder="menit">
                                                                    </div>
                                                                    <div class="form-group col-md-12  hiddendong"
                                                                        id="rook3tes">
                                                                        <label class="text-muted">Denyut Nadi sesudah
                                                                            jalan</label>
                                                                        <input type="number" step="0.01"
                                                                            id="denyut_nadi_setelah"
                                                                            name="denyut_nadi_setelah"
                                                                            placeholder="/menit" class="form-control">
                                                                    </div>

                                                                </div>
                                                                <button type="submit"
                                                                    class="btn btn-primary mt-3 float-right">Submit</button>
                                                            </form>

                                                        </div>
                                                    </div>
                                                @endif

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
