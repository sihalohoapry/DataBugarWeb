@extends('layouts.admin')
@section('title')
    Riwayat Kesehatan
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
            <div class="page-content page-container" id="page-content">
                <div class="padding pt-0">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    Riwayat Kesehatan
                                </div>
                                <div class="card-body">
                                    <div class="mb-2">
                                        <button class="accordion">Dokter Keluarga @if ($dataDokter)
                                                <span style="float: right; color:green">
                                                    &#10004;
                                                </span>
                                            @endif
                                        </button>
                                        <div class="panel">
                                            @if ($dataDokter)
                                                <div class="mt-2">
                                                    <form action="{{ route('edit-riwayat-dokter') }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="row">
                                                            <input type="hidden" id="id" name="id"
                                                                value="{{ $dataDokter->id }}">
                                                            <div class="col-12 mb-2"><b>Lengkapi Data dibawah ini</b></div>

                                                            <div class="form-group col-md-12">
                                                                <label class="text-muted">Nama Dokter</label>
                                                                <input type="text" id="nama_dokter" name="nama_dokter"
                                                                    value="{{ $dataDokter->nama_dokter }}"
                                                                    class="form-control" required>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <label class="text-muted">Alamat Tempat Praktek</label>
                                                                <textarea class="form-control" id="alamat_praktek" name="alamat_praktek" value="{{ $dataDokter->alamat_praktek }}"
                                                                    required rows="4">{{ $dataDokter->alamat_praktek }}
                                                            </textarea>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label class="text-muted">Nomer Telpon</label>
                                                                <input type="text" id="no_telpon" name="no_telpon"
                                                                    value="{{ $dataDokter->no_telpon }}"
                                                                    class="form-control" required>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label class="text-muted">Tanggal Checkup Terakhir</label>
                                                                <input type="date" id="terakhir_checkup"
                                                                    name="terakhir_checkup" class="form-control"
                                                                    value="{{ $dataDokter->terakhir_checkup }}" required>
                                                            </div>

                                                        </div>
                                                        <button type="submit" class="btn btn-primary mt-1 ">Edit</button>
                                                    </form>
                                                </div>
                                            @else
                                                <div class="mt-2">
                                                    <form action="{{ route('submit-riwayat-dokter') }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-12 mb-2"><b>Lengkapi Data dibawah ini</b></div>

                                                            <div class="form-group col-md-12">
                                                                <label class="text-muted">Nama Dokter</label>
                                                                <input type="text" id="nama_dokter" name="nama_dokter"
                                                                    class="form-control" required>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <label class="text-muted">Alamat Tempat Praktek</label>
                                                                <textarea class="form-control" id="alamat_praktek" name="alamat_praktek" required rows="4">

                                                            </textarea>
                                                                {{-- <input type="text" id="alamat_praktek" name="alamat_praktek"
                                                                class="form-control" required> --}}
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label class="text-muted">Nomer Telpon</label>
                                                                <input type="text" id="no_telpon" name="no_telpon"
                                                                    class="form-control" required>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label class="text-muted">Tanggal Checkup Terakhir</label>
                                                                <input type="date" id="terakhir_checkup"
                                                                    name="terakhir_checkup" class="form-control" required>
                                                            </div>

                                                        </div>
                                                        <button type="submit" class="btn btn-primary mt-1 ">Submit</button>
                                                    </form>
                                                </div>
                                            @endif

                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <button class="accordion">Sejarah Keluarga @if ($dataSejarahKeluarga)
                                                <span style="float: right; color:green">
                                                    &#10004;
                                                </span>
                                            @endif
                                        </button>
                                        <div class="panel">
                                            @if ($dataSejarahKeluarga)
                                                <div class="mt-2">
                                                    <form action="{{ route('edit-sejarah-keluarga') }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden" id="keluarga_id" name="keluarga_id"
                                                            value="{{ $dataSejarahKeluarga->id }}">
                                                        <div class="row">
                                                            <div class="col-12 mb-2"><b>Catatan keluarga sampai generasi
                                                                    kedua.</b></div>
                                                            <div class="form-group col-md-12">
                                                                <label class="text-muted">Masalah kesehatan yang pernah
                                                                    terjadi di keluarga
                                                                </label>
                                                                <textarea class="form-control" id="masalah_kesehatan_kk" name="masalah_kesehatan_kk" rows="4"
                                                                    value="{{ $dataSejarahKeluarga->masalah_kesehatan_kk }}" required>{{ $dataSejarahKeluarga->masalah_kesehatan_kk }}
                                                                </textarea>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <label class="text-muted">Apakah ada seseorang di keluarga
                                                                    yang meninggal sebelum usia lima puluh tahun?
                                                                </label>
                                                                <div class="row ml-2">
                                                                    <div class="form-check col-md-2">
                                                                        <input class="form-check-input"
                                                                            @if ($dataSejarahKeluarga->meninggal_under_50 == 'ya') checked @endif
                                                                            type="radio" value="ya"
                                                                            name="meninggal_under_50" onclick="show50()"
                                                                            id="meninggal_under_501">
                                                                        <label class="form-check-label"
                                                                            for="meninggal_under_501">
                                                                            Ya
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check col-md-2">
                                                                        <input class="form-check-input" type="radio"
                                                                            @if ($dataSejarahKeluarga->meninggal_under_50 == 'tidak') checked @endif
                                                                            value="tidak" name="meninggal_under_50"
                                                                            onclick="hidden50()" id="meninggal_under_502">
                                                                        <label class="form-check-label"
                                                                            for="meninggal_under_502">
                                                                            Tidak
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check col-md-8"></div>

                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-12" id="meninggal">
                                                                <label class="text-muted">Deskripsi penyebab meninggal
                                                                </label>
                                                                <textarea class="form-control" id="deskripsi_penyebab_meninggal" name="deskripsi_penyebab_meninggal" required
                                                                    rows="4" value="{{ $dataSejarahKeluarga->deskripsi_penyebab_meninggal }}">{{ $dataSejarahKeluarga->deskripsi_penyebab_meninggal }}
                                                                </textarea>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <label class="text-muted">Apakah ada sejarah keluarga yang
                                                                    menderita:
                                                                </label>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <input type="checkbox" id="vehicle1"
                                                                            name="penyakit_keluarga[]"
                                                                            value="Tekanan Darah Tinggi"
                                                                            @php $value = 0;
                                                                                foreach ($dataPenyakitKeluarga as $item) {
                                                                                    if ($item->nama_penyakit == 'Tekanan Darah Tinggi') {
                                                                                        $value++;
                                                                                    } else {
                                                                                        continue;
                                                                                    }
                                                                                } @endphp
                                                                            @if ($value > 0) checked @endif>
                                                                        <label for="vehicle1">Tekanan Darah
                                                                            Tinggi</label><br>

                                                                        <input type="checkbox" id="vehicle2"
                                                                            name="penyakit_keluarga[]"
                                                                            value="Kanker/Tumor"
                                                                            @php $value = 0;
                                                                                foreach ($dataPenyakitKeluarga as $item) {
                                                                                    if ($item->nama_penyakit == 'Kanker/Tumor') {
                                                                                        $value++;
                                                                                    } else {
                                                                                        continue;
                                                                                    }
                                                                                } @endphp
                                                                            @if ($value > 0) checked @endif>
                                                                        <label for="vehicle2"> Kanker/Tumor</label><br>

                                                                        <input type="checkbox" id="vehicle3"
                                                                            name="penyakit_keluarga[]"
                                                                            value="Gangguan Usus"
                                                                            @php $value = 0;
                                                                                foreach ($dataPenyakitKeluarga as $item) {
                                                                                    if ($item->nama_penyakit == 'Gangguan Usus') {
                                                                                        $value++;
                                                                                    } else {
                                                                                        continue;
                                                                                    }
                                                                                } @endphp
                                                                            @if ($value > 0) checked @endif>
                                                                        <label for="vehicle3">Gangguan Usus</label><br>

                                                                        <input type="checkbox" id="vehicle3"
                                                                            name="penyakit_keluarga[]"
                                                                            value="Kecenderungan Gemetar"
                                                                            @php $value = 0;
                                                                                foreach ($dataPenyakitKeluarga as $item) {
                                                                                    if ($item->nama_penyakit == 'Gangguan Genetik (Contoh: Hemofilia)') {
                                                                                        $value++;
                                                                                    } else {
                                                                                        continue;
                                                                                    }
                                                                                } @endphp
                                                                            @if ($value > 0) checked @endif>
                                                                        <label for="vehicle3">Gangguan Genetik (Contoh:
                                                                            Hemofilia)</label><br>

                                                                        <input type="checkbox" id="vehicle3"
                                                                            name="penyakit_keluarga[]" value="Epilepsi"
                                                                            @php $value = 0;
                                                                                foreach ($dataPenyakitKeluarga as $item) {
                                                                                    if ($item->nama_penyakit == 'Epilepsi') {
                                                                                        $value++;
                                                                                    } else {
                                                                                        continue;
                                                                                    }
                                                                                } @endphp
                                                                            @if ($value > 0) checked @endif>
                                                                        <label for="vehicle3">Epilepsi</label><br>

                                                                        <input type="checkbox" id="vehicle3"
                                                                            name="penyakit_keluarga[]"
                                                                            value="Gangguan Ginjal"
                                                                            @php $value = 0;
                                                                                foreach ($dataPenyakitKeluarga as $item) {
                                                                                    if ($item->nama_penyakit == 'Gangguan Ginjal') {
                                                                                        $value++;
                                                                                    } else {
                                                                                        continue;
                                                                                    }
                                                                                } @endphp
                                                                            @if ($value > 0) checked @endif>
                                                                        <label for="vehicle3">Gangguan Ginjal</label><br>

                                                                        <input type="checkbox" id="vehicle3"
                                                                            name="penyakit_keluarga[]" value="Asma"
                                                                            @php $value = 0;
                                                                                foreach ($dataPenyakitKeluarga as $item) {
                                                                                    if ($item->nama_penyakit == 'Asma') {
                                                                                        $value++;
                                                                                    } else {
                                                                                        continue;
                                                                                    }
                                                                                } @endphp
                                                                            @if ($value > 0) checked @endif>
                                                                        <label for="vehicle3">Asma</label><br>

                                                                        <input type="checkbox" id="vehicle3"
                                                                            name="penyakit_keluarga[]"
                                                                            value="Masalah Emosi"
                                                                            @php $value = 0;
                                                                                foreach ($dataPenyakitKeluarga as $item) {
                                                                                    if ($item->nama_penyakit == 'Masalah Emosi') {
                                                                                        $value++;
                                                                                    } else {
                                                                                        continue;
                                                                                    }
                                                                                } @endphp
                                                                            @if ($value > 0) checked @endif>
                                                                        <label for="vehicle3"> Masalah
                                                                            Emosi </label><br>


                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <input type="checkbox" id="vehicle1"
                                                                            name="penyakit_keluarga[]"
                                                                            value="Masalah Jantung"
                                                                            @php $value = 0;
                                                                                foreach ($dataPenyakitKeluarga as $item) {
                                                                                    if ($item->nama_penyakit == 'Masalah Jantung') {
                                                                                        $value++;
                                                                                    } else {
                                                                                        continue;
                                                                                    }
                                                                                } @endphp
                                                                            @if ($value > 0) checked @endif>
                                                                        <label for="vehicle1">Masalah Jantung</label><br>

                                                                        <input type="checkbox" id="vehicle2"
                                                                            name="penyakit_keluarga[]"
                                                                            value="Kepala Migrain"
                                                                            @php $value = 0;
                                                                                foreach ($dataPenyakitKeluarga as $item) {
                                                                                    if ($item->nama_penyakit == 'Kepala Migrain') {
                                                                                        $value++;
                                                                                    } else {
                                                                                        continue;
                                                                                    }
                                                                                } @endphp
                                                                            @if ($value > 0) checked @endif>
                                                                        <label for="vehicle2"> Kepala Migrain</label><br>

                                                                        <input type="checkbox" id="vehicle3"
                                                                            name="penyakit_keluarga[]" value="Diabetes"
                                                                            @php $value = 0;
                                                                                foreach ($dataPenyakitKeluarga as $item) {
                                                                                    if ($item->nama_penyakit == 'Diabetes') {
                                                                                        $value++;
                                                                                    } else {
                                                                                        continue;
                                                                                    }
                                                                                } @endphp
                                                                            @if ($value > 0) checked @endif>
                                                                        <label for="vehicle3">Diabetes</label><br>

                                                                        <input type="checkbox" id="vehicle3"
                                                                            name="penyakit_keluarga[]"
                                                                            value="Gangguan Kehamilan"
                                                                            @php $value = 0;
                                                                                foreach ($dataPenyakitKeluarga as $item) {
                                                                                    if ($item->nama_penyakit == 'Gangguan Kehamilan') {
                                                                                        $value++;
                                                                                    } else {
                                                                                        continue;
                                                                                    }
                                                                                } @endphp
                                                                            @if ($value > 0) checked @endif>
                                                                        <label for="vehicle3">Gangguan
                                                                            Kehamilan</label><br>

                                                                        <input type="checkbox" id="vehicle3"
                                                                            name="penyakit_keluarga[]" value="Anemia"
                                                                            @php $value = 0;
                                                                                foreach ($dataPenyakitKeluarga as $item) {
                                                                                    if ($item->nama_penyakit == 'Anemia') {
                                                                                        $value++;
                                                                                    } else {
                                                                                        continue;
                                                                                    }
                                                                                } @endphp
                                                                            @if ($value > 0) checked @endif>
                                                                        <label for="vehicle3">Anemia</label><br>

                                                                        <input type="checkbox" id="vehicle3"
                                                                            name="penyakit_keluarga[]"
                                                                            value="Arthritis (Radang Sendi)"
                                                                            @php $value = 0;
                                                                                foreach ($dataPenyakitKeluarga as $item) {
                                                                                    if ($item->nama_penyakit == 'Arthritis (Radang Sendi)') {
                                                                                        $value++;
                                                                                    } else {
                                                                                        continue;
                                                                                    }
                                                                                } @endphp
                                                                            @if ($value > 0) checked @endif>
                                                                        <label for="vehicle3">Arthritis (Radang
                                                                            Sendi)</label><br>

                                                                        <input type="checkbox" id="vehicle3"
                                                                            name="penyakit_keluarga[]"
                                                                            value="Gangguan Perut"
                                                                            @php $value = 0;
                                                                                foreach ($dataPenyakitKeluarga as $item) {
                                                                                    if ($item->nama_penyakit == 'Gangguan Perut') {
                                                                                        $value++;
                                                                                    } else {
                                                                                        continue;
                                                                                    }
                                                                                } @endphp
                                                                            @if ($value > 0) checked @endif>
                                                                        <label for="vehicle3">Gangguan Perut</label><br>

                                                                        <input type="checkbox" id="vehicle3"
                                                                            name="penyakit_keluarga[]" id="lainnya"
                                                                            onclick="showLainnya()" value="Lain-lain">
                                                                        <label for="vehicle3">Lain-lain</label><br>

                                                                        <div class="form-group col-md-12  hiddendong"
                                                                            id="penyakit_lainnya">
                                                                            <input type="text"
                                                                                placeholder="Isi nama penyakit"
                                                                                name="penyakit_keluarga[]"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <button type="submit"
                                                            class="btn btn-primary mt-1 ">Submit</button>
                                                    </form>
                                                </div>
                                            @else
                                                <div class="mt-2">
                                                    <form action="{{ route('submit-sejarah-keluarga') }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-12 mb-2"><b>Catatan keluarga sampai generasi
                                                                    kedua.</b></div>
                                                            <div class="form-group col-md-12">
                                                                <label class="text-muted">Masalah kesehatan yang pernah
                                                                    terjadi di keluarga
                                                                </label>
                                                                <textarea class="form-control" id="masalah_kesehatan_kk" name="masalah_kesehatan_kk" rows="4" required>

                                                                </textarea>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <label class="text-muted">Apakah ada seseorang di keluarga
                                                                    yang meninggal sebelum usia lima puluh tahun?
                                                                </label>
                                                                <div class="row ml-2">
                                                                    <div class="form-check col-md-2">
                                                                        <input class="form-check-input" type="radio"
                                                                            value="ya" name="meninggal_under_50"
                                                                            onclick="show50()" id="meninggal_under_501">
                                                                        <label class="form-check-label"
                                                                            for="meninggal_under_501">
                                                                            Ya
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check col-md-2">
                                                                        <input class="form-check-input" type="radio"
                                                                            value="tidak" name="meninggal_under_50"
                                                                            onclick="hidden50()" id="meninggal_under_502">
                                                                        <label class="form-check-label"
                                                                            for="meninggal_under_502">
                                                                            Tidak
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check col-md-8"></div>

                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-12" id="meninggal">
                                                                <label class="text-muted">Deskripsi penyebab meninggal
                                                                </label>
                                                                <textarea class="form-control" id="deskripsi_penyebab_meninggal" name="deskripsi_penyebab_meninggal" required
                                                                    rows="4">

                                                                </textarea>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <label class="text-muted">Apakah ada sejarah keluarga yang
                                                                    menderita:
                                                                </label>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <input type="checkbox" id="vehicle1"
                                                                            name="penyakit_keluarga[]"
                                                                            value="Tekanan Darah Tinggi">
                                                                        <label for="vehicle1">Tekanan Darah
                                                                            Tinggi</label><br>

                                                                        <input type="checkbox" id="vehicle2"
                                                                            name="penyakit_keluarga[]"
                                                                            value="Kanker/Tumor">
                                                                        <label for="vehicle2"> Kanker/Tumor</label><br>

                                                                        <input type="checkbox" id="vehicle3"
                                                                            name="penyakit_keluarga[]"
                                                                            value="Gangguan Usus">
                                                                        <label for="vehicle3">Gangguan Usus</label><br>

                                                                        <input type="checkbox" id="vehicle3"
                                                                            name="penyakit_keluarga[]"
                                                                            value="Gangguan Genetik (Contoh: Hemofilia)">
                                                                        <label for="vehicle3">Gangguan Genetik (Contoh:
                                                                            Hemofilia)</label><br>

                                                                        <input type="checkbox" id="vehicle3"
                                                                            name="penyakit_keluarga[]" value="Epilepsi">
                                                                        <label for="vehicle3">Epilepsi</label><br>

                                                                        <input type="checkbox" id="vehicle3"
                                                                            name="penyakit_keluarga[]"
                                                                            value="Gangguan Ginjal">
                                                                        <label for="vehicle3">Gangguan Ginjal</label><br>

                                                                        <input type="checkbox" id="vehicle3"
                                                                            name="penyakit_keluarga[]" value="Asma">
                                                                        <label for="vehicle3">Asma</label><br>

                                                                        <input type="checkbox" id="vehicle3"
                                                                            name="penyakit_keluarga[]"
                                                                            value="Masalah Emosi">
                                                                        <label for="vehicle3"> Masalah
                                                                            Emosi</label><br>


                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <input type="checkbox" id="vehicle1"
                                                                            name="penyakit_keluarga[]"
                                                                            value="Masalah Jantung">
                                                                        <label for="vehicle1">Masalah Jantung</label><br>

                                                                        <input type="checkbox" id="vehicle2"
                                                                            name="penyakit_keluarga[]"
                                                                            value="Kepala Migrain">
                                                                        <label for="vehicle2"> Kepala Migrain</label><br>

                                                                        <input type="checkbox" id="vehicle3"
                                                                            name="penyakit_keluarga[]" value="Diabetes">
                                                                        <label for="vehicle3">Diabetes</label><br>

                                                                        <input type="checkbox" id="vehicle3"
                                                                            name="penyakit_keluarga[]"
                                                                            value="Gangguan Kehamilan">
                                                                        <label for="vehicle3">Gangguan
                                                                            Kehamilan</label><br>

                                                                        <input type="checkbox" id="vehicle3"
                                                                            name="penyakit_keluarga[]" value="Anemia">
                                                                        <label for="vehicle3">Anemia</label><br>

                                                                        <input type="checkbox" id="vehicle3"
                                                                            name="penyakit_keluarga[]"
                                                                            value="Arthritis (Radang Sendi)">
                                                                        <label for="vehicle3">Arthritis (Radang
                                                                            Sendi)</label><br>

                                                                        <input type="checkbox" id="vehicle3"
                                                                            name="penyakit_keluarga[]"
                                                                            value="Gangguan Perut">
                                                                        <label for="vehicle3">Gangguan Perut</label><br>

                                                                        <input type="checkbox" id="vehicle3"
                                                                            name="penyakit_keluarga[]" id="lainnya"
                                                                            onclick="showLainnya()" value="Lain-lain">
                                                                        <label for="vehicle3">Lain-lain</label><br>

                                                                        <div class="form-group col-md-12  hiddendong"
                                                                            id="penyakit_lainnya">
                                                                            <input type="text"
                                                                                placeholder="Isi nama penyakit"
                                                                                name="penyakit_keluarga[]"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <button type="submit"
                                                            class="btn btn-primary mt-1 ">Submit</button>
                                                    </form>
                                                </div>
                                            @endif

                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <button class="accordion">Kondisi Anda Sekarang @if ($kondisSekarang)
                                                <span style="float: right; color:green">
                                                    &#10004;
                                                </span>
                                            @endif
                                        </button>
                                        <div class="panel">
                                            @if ($kondisSekarang)
                                                <div class="mt-2">
                                                    <form action="{{ route('edit-kondisi-sekarang') }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden" id="kondisi_sekarang_id"
                                                            name="kondisi_sekarang_id" value="{{ $kondisSekarang->id }}">
                                                        <div class="row">
                                                            <div class="col-12 mb-2"><b>Kondisi Anda saat ini.
                                                                    .</b></div>
                                                            <div class="form-group col-md-12">
                                                                <label class="text-muted">Saya pernah mengalami:
                                                                </label>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <input type="checkbox" id="vehicle1"
                                                                            @php $value = 0;
                                                                                foreach ($dataPenyakitSekarang as $item) {
                                                                                    if ($item->penyakit_sekarang == 'Alergi') {
                                                                                        $value++;
                                                                                    } else {
                                                                                        continue;
                                                                                    }
                                                                                } @endphp
                                                                            @if ($value > 0) checked @endif
                                                                            name="penyakit_sekarang[]" value="Alergi">
                                                                        <label for="vehicle1">Alergi</label><br>

                                                                        <input type="checkbox" id="vehicle2"
                                                                            name="penyakit_sekarang[]"
                                                                            @php $value = 0;
                                                                                foreach ($dataPenyakitSekarang as $item) {
                                                                                    if ($item->penyakit_sekarang == 'Masalah Pada Hidung') {
                                                                                        $value++;
                                                                                    } else {
                                                                                        continue;
                                                                                    }
                                                                                } @endphp
                                                                            @if ($value > 0) checked @endif
                                                                            value="Masalah Pada Hidung">
                                                                        <label for="vehicle2"> Masalah Pada
                                                                            Hidung</label><br>

                                                                        <input type="checkbox" id="vehicle3"
                                                                            name="penyakit_sekarang[]"
                                                                            @php $value = 0;
                                                                                foreach ($dataPenyakitSekarang as $item) {
                                                                                    if ($item->penyakit_sekarang == 'Sakit Kepala, Pusing, Lemas, Pingsan, Masalah Koordinasi/Keseimbangan') {
                                                                                        $value++;
                                                                                    } else {
                                                                                        continue;
                                                                                    }
                                                                                } @endphp
                                                                            @if ($value > 0) checked @endif
                                                                            value="Sakit Kepala, Pusing, Lemas, Pingsan, Masalah Koordinasi/Keseimbangan">
                                                                        <label for="vehicle3">Sakit Kepala, Pusing, Lemas,
                                                                            Pingsan, Masalah
                                                                            Koordinasi/Keseimbangan</label><br>

                                                                        <input type="checkbox" id="vehicle3"
                                                                            name="penyakit_sekarang[]"
                                                                            @php $value = 0;
                                                                                foreach ($dataPenyakitSekarang as $item) {
                                                                                    if ($item->penyakit_sekarang == 'Kecenderungan Gemetar') {
                                                                                        $value++;
                                                                                    } else {
                                                                                        continue;
                                                                                    }
                                                                                } @endphp
                                                                            @if ($value > 0) checked @endif
                                                                            value="Kecenderungan Gemetar">
                                                                        <label for="vehicle3">Kecenderungan
                                                                            Gemetar</label><br>

                                                                        <input type="checkbox" id="vehicle3"
                                                                            @php $value = 0;
                                                                                foreach ($dataPenyakitSekarang as $item) {
                                                                                    if ($item->penyakit_sekarang == 'Epilepsi') {
                                                                                        $value++;
                                                                                    } else {
                                                                                        continue;
                                                                                    }
                                                                                } @endphp
                                                                            @if ($value > 0) checked @endif
                                                                            name="penyakit_sekarang[]" value="Epilepsi">
                                                                        <label for="vehicle3">Epilepsi</label><br>

                                                                        <input type="checkbox" id="vehicle3"
                                                                            name="penyakit_sekarang[]"
                                                                            @php $value = 0;
                                                                                foreach ($dataPenyakitSekarang as $item) {
                                                                                    if ($item->penyakit_sekarang == 'Gangguan Ginjal') {
                                                                                        $value++;
                                                                                    } else {
                                                                                        continue;
                                                                                    }
                                                                                } @endphp
                                                                            @if ($value > 0) checked @endif
                                                                            value="Gangguan Ginjal">
                                                                        <label for="vehicle3">Gangguan Ginjal</label><br>

                                                                        <input type="checkbox" id="vehicle3"
                                                                            name="penyakit_sekarang[]"
                                                                            @php $value = 0;
                                                                                foreach ($dataPenyakitSekarang as $item) {
                                                                                    if ($item->penyakit_sekarang == 'Masalah Menstruasi') {
                                                                                        $value++;
                                                                                    } else {
                                                                                        continue;
                                                                                    }
                                                                                } @endphp
                                                                            @if ($value > 0) checked @endif
                                                                            value="Masalah Menstruasi">
                                                                        <label for="vehicle3">Masalah
                                                                            Menstruasi</label><br>


                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <input type="checkbox" id="vehicle1"
                                                                            name="penyakit_sekarang[]"
                                                                            @php $value = 0;
                                                                                foreach ($dataPenyakitSekarang as $item) {
                                                                                    if ($item->penyakit_sekarang == 'Kesulitan Penglihatan') {
                                                                                        $value++;
                                                                                    } else {
                                                                                        continue;
                                                                                    }
                                                                                } @endphp
                                                                            @if ($value > 0) checked @endif
                                                                            value="Kesulitan Penglihatan">
                                                                        <label for="vehicle1">Kesulitan
                                                                            Penglihatan</label><br>

                                                                        <input type="checkbox" id="vehicle2"
                                                                            name="penyakit_sekarang[]"
                                                                            @php $value = 0;
                                                                                foreach ($dataPenyakitSekarang as $item) {
                                                                                    if ($item->penyakit_sekarang == 'Masalah Pada Pendengaran') {
                                                                                        $value++;
                                                                                    } else {
                                                                                        continue;
                                                                                    }
                                                                                } @endphp
                                                                            @if ($value > 0) checked @endif
                                                                            value="Masalah Pada Pendengaran">
                                                                        <label for="vehicle2"> Masalah Pada
                                                                            Pendengaran</label><br>

                                                                        <input type="checkbox" id="vehicle3"
                                                                            @php $value = 0;
                                                                                foreach ($dataPenyakitSekarang as $item) {
                                                                                    if ($item->penyakit_sekarang == 'Mati Rasa') {
                                                                                        $value++;
                                                                                    } else {
                                                                                        continue;
                                                                                    }
                                                                                } @endphp
                                                                            @if ($value > 0) checked @endif
                                                                            name="penyakit_sekarang[]" value="Mati Rasa">
                                                                        <label for="vehicle3">Mati Rasa</label><br>

                                                                        <input type="checkbox" id="vehicle3"
                                                                            name="penyakit_sekarang[]"
                                                                            @php $value = 0;
                                                                                foreach ($dataPenyakitSekarang as $item) {
                                                                                    if ($item->penyakit_sekarang == 'Batuk, Napas Pendek, Sakit Dada, Pusing, atau Debaran Jantung (jantung berdetak cepat) dengan Latihan') {
                                                                                        $value++;
                                                                                    } else {
                                                                                        continue;
                                                                                    }
                                                                                } @endphp
                                                                            @if ($value > 0) checked @endif
                                                                            value="Batuk, Napas Pendek, Sakit Dada, Pusing, atau Debaran Jantung (jantung berdetak cepat) dengan Latihan">
                                                                        <label for="vehicle3">Batuk, Napas Pendek, Sakit
                                                                            Dada, Pusing, atau Debaran Jantung (jantung
                                                                            berdetak cepat) dengan Latihan</label><br>

                                                                        <input type="checkbox" id="vehicle3"
                                                                            name="penyakit_sekarang[]"
                                                                            @php $value = 0;
                                                                                foreach ($dataPenyakitSekarang as $item) {
                                                                                    if ($item->penyakit_sekarang == 'Gejala Pada Otot, Tulang, atau Sendi (seperti kaku, bengkak, sakit)') {
                                                                                        $value++;
                                                                                    } else {
                                                                                        continue;
                                                                                    }
                                                                                } @endphp
                                                                            @if ($value > 0) checked @endif
                                                                            value="Gejala Pada Otot, Tulang, atau Sendi (seperti kaku, bengkak, sakit)">
                                                                        <label for="vehicle3">Gejala Pada Otot, Tulang,
                                                                            atau Sendi (seperti kaku, bengkak,
                                                                            sakit)</label><br>

                                                                        <input type="checkbox" id="vehicle3"
                                                                            name="penyakit_sekarang[]" id="lainnya"
                                                                            onclick="showGejalaLainnya()"
                                                                            @php $value = 0;
                                                                                foreach ($dataPenyakitSekarang as $item) {
                                                                                    if ($item->penyakit_sekarang == 'Gejala Lainnya') {
                                                                                        $value++;
                                                                                    } else {
                                                                                        continue;
                                                                                    }
                                                                                } @endphp
                                                                            @if ($value > 0) checked @endif
                                                                            value="Gejala Lainnya">
                                                                        <label for="vehicle3">Gejala Lainnya</label><br>

                                                                        <div class="form-group col-md-12  hiddendong"
                                                                            id="gejala_lainnya">
                                                                            <input type="text"
                                                                                placeholder="Isi nama penyakit"
                                                                                name="penyakit_sekarang[]"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <p>Pernahkah terjadi perubahan berat badan dari tahun lalu?
                                                                    Bertambah atau berkurang?</p>
                                                            </div>

                                                            <div class="form-group col-md-6">
                                                                <label class="text-muted">Berat Badan Tahun Lalu</label>
                                                                <input type="number" step="0.01" id="berat_lalu"
                                                                    name="berat_lalu" class="form-control" required
                                                                    value="{{ $kondisSekarang->berat_lalu }}"
                                                                    placeholder="kg">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label class="text-muted">Berat Badan Tahun
                                                                    Sekarang</label>
                                                                <input type="number" step="0.01" id="berat_sekarang"
                                                                    name="berat_sekarang" class="form-control" required
                                                                    value="{{ $kondisSekarang->berat_sekarang }}"
                                                                    placeholder="kg">
                                                            </div>
                                                            <div class="col-md-12">
                                                                <p>Adakah perubahan tinggi badan dari tahun lalu?
                                                                </p>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label class="text-muted">Tinggi Badan Tahun Lalu</label>
                                                                <input type="number" step="0.01" id="tinggi_lalu"
                                                                    name="tinggi_lalu" class="form-control" required
                                                                    value="{{ $kondisSekarang->tinggi_lalu }}"
                                                                    placeholder="cm">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label class="text-muted">Tinggi Badan Tahun
                                                                    Sekarang</label>
                                                                <input type="number" step="0.01" id="tinggi_sekarang"
                                                                    name="tinggi_sekarang" class="form-control" required
                                                                    value="{{ $kondisSekarang->tinggi_sekarang }}"
                                                                    placeholder="cm">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label class="text-muted">Perubahan berat badan dari tahun
                                                                    lalu</label>
                                                                <input type="number" step="0.01" id=""
                                                                    name="" class="form-control" readonly
                                                                    value="{{ $kondisSekarang->result_berat }}"
                                                                    placeholder="cm">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label class="text-muted">Perubahan tinggi badan dari tahun
                                                                    lalu</label>
                                                                <input type="number" step="0.01" id=""
                                                                    readonly value="{{ $kondisSekarang->result_tinggi }}"
                                                                    name="" class="form-control" placeholder="cm">
                                                            </div>

                                                        </div>
                                                        <button type="submit" class="btn btn-success mt-1 ">Edit</button>
                                                    </form>
                                                </div>
                                            @else
                                                <div class="mt-2">
                                                    <form action="{{ route('submit-kondisi-sekarang') }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-12 mb-2"><b>Kondisi Anda saat ini.
                                                                    .</b></div>
                                                            <div class="form-group col-md-12">
                                                                <label class="text-muted">Saya pernah mengalami:
                                                                </label>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <input type="checkbox" id="vehicle1"
                                                                            name="penyakit_sekarang[]" value="Alergi">
                                                                        <label for="vehicle1">Alergi</label><br>

                                                                        <input type="checkbox" id="vehicle2"
                                                                            name="penyakit_sekarang[]"
                                                                            value="Masalah Pada Hidung">
                                                                        <label for="vehicle2"> Masalah Pada
                                                                            Hidung</label><br>

                                                                        <input type="checkbox" id="vehicle3"
                                                                            name="penyakit_sekarang[]"
                                                                            value="Sakit Kepala, Pusing, Lemas, Pingsan, Masalah Koordinasi/Keseimbangan">
                                                                        <label for="vehicle3">Sakit Kepala, Pusing, Lemas,
                                                                            Pingsan, Masalah
                                                                            Koordinasi/Keseimbangan</label><br>

                                                                        <input type="checkbox" id="vehicle3"
                                                                            name="penyakit_sekarang[]"
                                                                            value="Kecenderungan Gemetar">
                                                                        <label for="vehicle3">Kecenderungan
                                                                            Gemetar</label><br>

                                                                        <input type="checkbox" id="vehicle3"
                                                                            name="penyakit_sekarang[]" value="Epilepsi">
                                                                        <label for="vehicle3">Epilepsi</label><br>

                                                                        <input type="checkbox" id="vehicle3"
                                                                            name="penyakit_sekarang[]"
                                                                            value="Gangguan Ginjal">
                                                                        <label for="vehicle3">Gangguan Ginjal</label><br>

                                                                        <input type="checkbox" id="vehicle3"
                                                                            name="penyakit_sekarang[]"
                                                                            value="Masalah Menstruasi">
                                                                        <label for="vehicle3">Masalah
                                                                            Menstruasi</label><br>


                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <input type="checkbox" id="vehicle1"
                                                                            name="penyakit_sekarang[]"
                                                                            value="Kesulitan Penglihatan">
                                                                        <label for="vehicle1">Kesulitan
                                                                            Penglihatan</label><br>

                                                                        <input type="checkbox" id="vehicle2"
                                                                            name="penyakit_sekarang[]"
                                                                            value="Masalah Pada Pendengaran">
                                                                        <label for="vehicle2"> Masalah Pada
                                                                            Pendengaran</label><br>

                                                                        <input type="checkbox" id="vehicle3"
                                                                            name="penyakit_sekarang[]" value="Mati Rasa">
                                                                        <label for="vehicle3">Mati Rasa</label><br>

                                                                        <input type="checkbox" id="vehicle3"
                                                                            name="penyakit_sekarang[]"
                                                                            value="Batuk, Napas Pendek, Sakit Dada, Pusing, atau Debaran Jantung (jantung berdetak cepat) dengan Latihan">
                                                                        <label for="vehicle3">Batuk, Napas Pendek, Sakit
                                                                            Dada, Pusing, atau Debaran Jantung (jantung
                                                                            berdetak cepat) dengan Latihan</label><br>

                                                                        <input type="checkbox" id="vehicle3"
                                                                            name="penyakit_sekarang[]"
                                                                            value="Gejala Pada Otot, Tulang, atau Sendi (seperti kaku, bengkak, sakit)">
                                                                        <label for="vehicle3">Gejala Pada Otot, Tulang,
                                                                            atau Sendi (seperti kaku, bengkak,
                                                                            sakit)</label><br>

                                                                        <input type="checkbox" id="vehicle3"
                                                                            name="penyakit_sekarang[]" id="lainnya"
                                                                            onclick="showGejalaLainnya()"
                                                                            value="Gejala Lainnya">
                                                                        <label for="vehicle3">Gejala Lainnya</label><br>

                                                                        <div class="form-group col-md-12  hiddendong"
                                                                            id="gejala_lainnya">
                                                                            <input type="text"
                                                                                placeholder="Isi nama penyakit"
                                                                                name="penyakit_sekarang[]"
                                                                                class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <p>Pernahkah terjadi perubahan berat badan dari tahun lalu?
                                                                    Bertambah atau berkurang?</p>
                                                            </div>

                                                            <div class="form-group col-md-6">
                                                                <label class="text-muted">Berat Badan Tahun Lalu</label>
                                                                <input type="number" step="0.01" id="berat_lalu"
                                                                    name="berat_lalu" class="form-control" required
                                                                    placeholder="kg">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label class="text-muted">Berat Badan Tahun
                                                                    Sekarang</label>
                                                                <input type="number" step="0.01" id="berat_sekarang"
                                                                    name="berat_sekarang" class="form-control" required
                                                                    placeholder="kg">
                                                            </div>
                                                            <div class="col-md-12">
                                                                <p>Adakah perubahan tinggi badan dari tahun lalu?
                                                                </p>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label class="text-muted">Tinggi Badan Tahun Lalu</label>
                                                                <input type="number" step="0.01" id="tinggi_lalu"
                                                                    name="tinggi_lalu" class="form-control" required
                                                                    placeholder="cm">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label class="text-muted">Tinggi Badan Tahun
                                                                    Sekarang</label>
                                                                <input type="number" step="0.01" id="tinggi_sekarang"
                                                                    name="tinggi_sekarang" class="form-control" required
                                                                    placeholder="cm">
                                                            </div>

                                                        </div>
                                                        <button type="submit"
                                                            class="btn btn-primary mt-1 ">Submit</button>
                                                    </form>
                                                </div>
                                            @endif

                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <button class="accordion">Permasalahan Medis Terakhir @if ($permasalahMedisTerakhir->count() > 0)
                                                <span style="float: right; color:green">
                                                    &#10004;
                                                </span>
                                            @endif
                                        </button>
                                        <div class="panel">
                                            @if ($permasalahMedisTerakhir->count() > 0)
                                                <div class="mt-2">
                                                    <form action="{{ route('edit-permasalahan-medis') }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-12 mb-2"><b>Lengkapi data di bawah ini apabila
                                                                    ada.</b></div>
                                                            <div class="form-group col-md-12">
                                                                <label class="text-muted">Saya pernah, atau telah
                                                                    diberitahu bahwa saya memiliki, atau saya konsultasi
                                                                    kepada dokter untuk:
                                                                </label>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <input type="checkbox"
                                                                            @php $value = 0;
                                                                                foreach ($permasalahMedisTerakhir as $item) {
                                                                                    if ($item->nama_permasalahan_medis == 'Cedera Pada Panggul, Lutut, Pergelangan Kaki, atau Kaki Hingga Tak Mampu Bergerak') {
                                                                                        $value++;
                                                                                    } else {
                                                                                        continue;
                                                                                    }
                                                                                } @endphp
                                                                            @if ($value > 0) checked @endif
                                                                            id="vehicle1"
                                                                            name="nama_permasalahan_medis[]"
                                                                            value="Cedera Pada Panggul, Lutut, Pergelangan Kaki, atau Kaki Hingga Tak Mampu Bergerak">
                                                                        <label for="vehicle1">Cedera Pada Panggul, Lutut,
                                                                            Pergelangan Kaki, atau Kaki Hingga Tak Mampu
                                                                            Bergerak</label><br>

                                                                        <input type="checkbox"
                                                                            @php $value = 0;
                                                                                foreach ($permasalahMedisTerakhir as $item) {
                                                                                    if ($item->nama_permasalahan_medis == 'Prosedur Operasi') {
                                                                                        $value++;
                                                                                    } else {
                                                                                        continue;
                                                                                    }
                                                                                } @endphp
                                                                            @if ($value > 0) checked @endif
                                                                            id="vehicle1"
                                                                            name="nama_permasalahan_medis[]"
                                                                            value="Prosedur Operasi">
                                                                        <label for="vehicle1">Prosedur Operasi</label><br>

                                                                        <input type="checkbox"
                                                                            @php $value = 0;
                                                                                foreach ($permasalahMedisTerakhir as $item) {
                                                                                    if ($item->nama_permasalahan_medis == 'Gangguan Psikologis/Psikiatrik') {
                                                                                        $value++;
                                                                                    } else {
                                                                                        continue;
                                                                                    }
                                                                                } @endphp
                                                                            @if ($value > 0) checked @endif
                                                                            id="vehicle1"
                                                                            name="nama_permasalahan_medis[]"
                                                                            value="Gangguan Psikologis/Psikiatrik">
                                                                        <label for="vehicle1">Gangguan
                                                                            Psikologis/Psikiatrik</label><br>

                                                                        <input type="checkbox"
                                                                            @php $value = 0;
                                                                                foreach ($permasalahMedisTerakhir as $item) {
                                                                                    if ($item->nama_permasalahan_medis == 'Heatstroke') {
                                                                                        $value++;
                                                                                    } else {
                                                                                        continue;
                                                                                    }
                                                                                } @endphp
                                                                            @if ($value > 0) checked @endif
                                                                            id="vehicle1"
                                                                            name="nama_permasalahan_medis[]"
                                                                            value="Heatstroke">
                                                                        <label for="vehicle1">Heatstroke</label><br>

                                                                        <input type="checkbox"
                                                                            @php $value = 0;
                                                                                foreach ($permasalahMedisTerakhir as $item) {
                                                                                    if ($item->nama_permasalahan_medis == 'Hernia atau Penyakit Pada Otot') {
                                                                                        $value++;
                                                                                    } else {
                                                                                        continue;
                                                                                    }
                                                                                } @endphp
                                                                            @if ($value > 0) checked @endif
                                                                            id="vehicle1"
                                                                            name="nama_permasalahan_medis[]"
                                                                            value="Hernia atau Penyakit Pada Otot">
                                                                        <label for="vehicle1">Hernia atau Penyakit Pada
                                                                            Otot</label><br>

                                                                        <input type="checkbox"
                                                                            @php $value = 0;
                                                                                foreach ($permasalahMedisTerakhir as $item) {
                                                                                    if ($item->nama_permasalahan_medis == 'Penyakit Ginjal (terdapat Gula/Albumin/Darah pada Urin)') {
                                                                                        $value++;
                                                                                    } else {
                                                                                        continue;
                                                                                    }
                                                                                } @endphp
                                                                            @if ($value > 0) checked @endif
                                                                            id="vehicle1"
                                                                            name="nama_permasalahan_medis[]"
                                                                            value="Penyakit Ginjal (terdapat Gula/Albumin/Darah pada Urin)">
                                                                        <label for="vehicle1">Penyakit Ginjal (terdapat
                                                                            Gula/Albumin/Darah pada Urin)</label><br>

                                                                        <input type="checkbox"
                                                                            @php $value = 0;
                                                                                foreach ($permasalahMedisTerakhir as $item) {
                                                                                    if ($item->nama_permasalahan_medis == 'GejalaPenyakit Darah (seperti Anemia), Kecenderungan Pendarahan (seperti Hemofilia)') {
                                                                                        $value++;
                                                                                    } else {
                                                                                        continue;
                                                                                    }
                                                                                } @endphp
                                                                            @if ($value > 0) checked @endif
                                                                            id="vehicle2"
                                                                            name="nama_permasalahan_medis[]"
                                                                            value="Penyakit Darah (seperti Anemia), Kecenderungan Pendarahan (seperti Hemofilia)">
                                                                        <label for="vehicle2"> Penyakit Darah (seperti
                                                                            Anemia), Kecenderungan Pendarahan (seperti
                                                                            Hemofilia)</label><br>

                                                                        <input type="checkbox"
                                                                            @php $value = 0;
                                                                                foreach ($permasalahMedisTerakhir as $item) {
                                                                                    if ($item->nama_permasalahan_medis == 'Epilepsi') {
                                                                                        $value++;
                                                                                    } else {
                                                                                        continue;
                                                                                    }
                                                                                } @endphp
                                                                            @if ($value > 0) checked @endif
                                                                            id="vehicle3"
                                                                            name="nama_permasalahan_medis[]"
                                                                            value="Epilepsi">
                                                                        <label for="vehicle3">Epilepsi</label><br>
                                                                        <input type="checkbox"
                                                                            @php $value = 0;
                                                                                foreach ($permasalahMedisTerakhir as $item) {
                                                                                    if ($item->nama_permasalahan_medis == 'Tuberkulosis, Asma, atau Berbagai Penyakit/Gangguan Pernapasan Lainnya') {
                                                                                        $value++;
                                                                                    } else {
                                                                                        continue;
                                                                                    }
                                                                                } @endphp
                                                                            @if ($value > 0) checked @endif
                                                                            id="vehicle3"
                                                                            name="nama_permasalahan_medis[]"
                                                                            value="Tuberkulosis, Asma, atau Berbagai Penyakit/Gangguan Pernapasan Lainnya">
                                                                        <label for="vehicle3">Tuberkulosis, Asma, atau
                                                                            Berbagai Penyakit/Gangguan Pernapasan
                                                                            Lainnya</label><br>



                                                                    </div>
                                                                    <div class="col-md-6">


                                                                        <input type="checkbox"
                                                                            @php $value = 0;
                                                                                foreach ($permasalahMedisTerakhir as $item) {
                                                                                    if ($item->nama_permasalahan_medis == 'Tekanan Darah Tinggi') {
                                                                                        $value++;
                                                                                    } else {
                                                                                        continue;
                                                                                    }
                                                                                } @endphp
                                                                            @if ($value > 0) checked @endif
                                                                            id="vehicle3"
                                                                            name="nama_permasalahan_medis[]"
                                                                            value="Tekanan Darah Tinggi">
                                                                        <label for="vehicle3">Tekanan Darah
                                                                            Tinggi</label><br>

                                                                        <input type="checkbox"
                                                                            @php $value = 0;
                                                                                foreach ($permasalahMedisTerakhir as $item) {
                                                                                    if ($item->nama_permasalahan_medis == 'Arthritis, Reumatik, Cedera, atau Penyakit pada Tulang, Sendi, Tulang Belakang, Bagian Belakang Tubuh (termasuk Leher)') {
                                                                                        $value++;
                                                                                    } else {
                                                                                        continue;
                                                                                    }
                                                                                } @endphp
                                                                            @if ($value > 0) checked @endif
                                                                            id="vehicle3"
                                                                            name="nama_permasalahan_medis[]"
                                                                            value="Arthritis, Reumatik, Cedera, atau Penyakit pada Tulang, Sendi, Tulang Belakang, Bagian Belakang Tubuh (termasuk Leher)">
                                                                        <label for="vehicle3">Arthritis, Reumatik, Cedera,
                                                                            atau Penyakit pada Tulang, Sendi, Tulang
                                                                            Belakang, Bagian Belakang Tubuh (termasuk
                                                                            Leher)</label><br>

                                                                        <input type="checkbox"
                                                                            @php $value = 0;
                                                                                foreach ($permasalahMedisTerakhir as $item) {
                                                                                    if ($item->nama_permasalahan_medis == 'Kanker, Tumor, atau Perkembangan Sel yang Membahayakan') {
                                                                                        $value++;
                                                                                    } else {
                                                                                        continue;
                                                                                    }
                                                                                } @endphp
                                                                            @if ($value > 0) checked @endif
                                                                            id="vehicle3"
                                                                            name="nama_permasalahan_medis[]"
                                                                            value="Kanker, Tumor, atau Perkembangan Sel yang Membahayakan">
                                                                        <label for="vehicle3">Kanker, Tumor, atau
                                                                            Perkembangan Sel yang Membahayakan</label><br>
                                                                        <input type="checkbox"
                                                                            @php $value = 0;
                                                                                foreach ($permasalahMedisTerakhir as $item) {
                                                                                    if ($item->nama_permasalahan_medis == 'Cedera Kepala yang Menyebabkan Pusing, Hilang Memori, Muntah, Hilang Kesadaran, atau Memerlukan Perhatian Medis') {
                                                                                        $value++;
                                                                                    } else {
                                                                                        continue;
                                                                                    }
                                                                                } @endphp
                                                                            @if ($value > 0) checked @endif
                                                                            id="vehicle1"
                                                                            name="nama_permasalahan_medis[]"
                                                                            value="Cedera Kepala yang Menyebabkan Pusing, Hilang Memori, Muntah, Hilang Kesadaran, atau Memerlukan Perhatian Medis">
                                                                        <label for="vehicle1">Cedera Kepala yang
                                                                            Menyebabkan Pusing, Hilang Memori, Muntah,
                                                                            Hilang Kesadaran, atau Memerlukan Perhatian
                                                                            Medis</label><br>

                                                                        <input type="checkbox"
                                                                            @php $value = 0;
                                                                                foreach ($permasalahMedisTerakhir as $item) {
                                                                                    if ($item->nama_permasalahan_medis == 'Rasa Sakit di Bagian Belakang, Sangat Jarang/Berkelanjutan/Hanya Setelah Latihan dalam Intensitas Tinggi') {
                                                                                        $value++;
                                                                                    } else {
                                                                                        continue;
                                                                                    }
                                                                                } @endphp
                                                                            @if ($value > 0) checked @endif
                                                                            id="vehicle2"
                                                                            name="nama_permasalahan_medis[]"
                                                                            value="Rasa Sakit di Bagian Belakang, Sangat Jarang/Berkelanjutan/Hanya Setelah Latihan dalam Intensitas Tinggi">
                                                                        <label for="vehicle2"> Rasa Sakit di Bagian
                                                                            Belakang, Sangat Jarang/Berkelanjutan/Hanya
                                                                            Setelah Latihan dalam Intensitas
                                                                            Tinggi</label><br>

                                                                        <input type="checkbox"
                                                                            @php $value = 0;
                                                                                foreach ($permasalahMedisTerakhir as $item) {
                                                                                    if ($item->nama_permasalahan_medis == 'Cedera (seperti Dislokasi, Retak) pada Bahu, Lengan, Sikut, Pergelangan, atau Tangan Hingga Tak Mampu Bergerak') {
                                                                                        $value++;
                                                                                    } else {
                                                                                        continue;
                                                                                    }
                                                                                } @endphp
                                                                            @if ($value > 0) checked @endif
                                                                            id="vehicle3"
                                                                            name="nama_permasalahan_medis[]"
                                                                            value="Cedera (seperti Dislokasi, Retak) pada Bahu, Lengan, Sikut, Pergelangan, atau Tangan Hingga Tak Mampu Bergerak">
                                                                        <label for="vehicle3">Cedera (seperti Dislokasi,
                                                                            Retak) pada Bahu, Lengan, Sikut, Pergelangan,
                                                                            atau Tangan Hingga Tak Mampu
                                                                            Bergerak</label><br>

                                                                        <input type="checkbox"
                                                                            @php $value = 0;
                                                                                foreach ($permasalahMedisTerakhir as $item) {
                                                                                    if ($item->nama_permasalahan_medis == 'Rehabilitasi Sebagian/Program Fisioterapi') {
                                                                                        $value++;
                                                                                    } else {
                                                                                        continue;
                                                                                    }
                                                                                } @endphp
                                                                            @if ($value > 0) checked @endif
                                                                            id="vehicle3"
                                                                            name="nama_permasalahan_medis[]"
                                                                            value="Rehabilitasi Sebagian/Program Fisioterapi">
                                                                        <label for="vehicle3">Rehabilitasi Sebagian/Program
                                                                            Fisioterapi</label><br>


                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-success mt-1 ">Edit</button>
                                                    </form>
                                                </div>
                                            @else
                                                <div class="mt-2">
                                                    <form action="{{ route('submit-permasalahan-medis') }}"
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-12 mb-2"><b>Lengkapi data di bawah ini apabila
                                                                    ada.</b></div>
                                                            <div class="form-group col-md-12">
                                                                <label class="text-muted">Saya pernah, atau telah
                                                                    diberitahu bahwa saya memiliki, atau saya konsultasi
                                                                    kepada dokter untuk:
                                                                </label>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <input type="checkbox" id="vehicle1"
                                                                            name="nama_permasalahan_medis[]"
                                                                            value="Cedera Pada Panggul, Lutut, Pergelangan Kaki, atau Kaki Hingga Tak Mampu Bergerak">
                                                                        <label for="vehicle1">Cedera Pada Panggul, Lutut,
                                                                            Pergelangan Kaki, atau Kaki Hingga Tak Mampu
                                                                            Bergerak</label><br>

                                                                        <input type="checkbox" id="vehicle1"
                                                                            name="nama_permasalahan_medis[]"
                                                                            value="Prosedur Operasi">
                                                                        <label for="vehicle1">Prosedur Operasi</label><br>

                                                                        <input type="checkbox" id="vehicle1"
                                                                            name="nama_permasalahan_medis[]"
                                                                            value="Gangguan Psikologis/Psikiatrik">
                                                                        <label for="vehicle1">Gangguan
                                                                            Psikologis/Psikiatrik</label><br>

                                                                        <input type="checkbox" id="vehicle1"
                                                                            name="nama_permasalahan_medis[]"
                                                                            value="Heatstroke">
                                                                        <label for="vehicle1">Heatstroke</label><br>

                                                                        <input type="checkbox" id="vehicle1"
                                                                            name="nama_permasalahan_medis[]"
                                                                            value="Hernia atau Penyakit Pada Otot">
                                                                        <label for="vehicle1">Hernia atau Penyakit Pada
                                                                            Otot</label><br>

                                                                        <input type="checkbox" id="vehicle1"
                                                                            name="nama_permasalahan_medis[]"
                                                                            value="Penyakit Ginjal (terdapat Gula/Albumin/Darah pada Urin)">
                                                                        <label for="vehicle1">Penyakit Ginjal (terdapat
                                                                            Gula/Albumin/Darah pada Urin)</label><br>

                                                                        <input type="checkbox" id="vehicle2"
                                                                            name="nama_permasalahan_medis[]"
                                                                            value="Penyakit Darah (seperti Anemia), Kecenderungan Pendarahan (seperti Hemofilia)">
                                                                        <label for="vehicle2"> Penyakit Darah (seperti
                                                                            Anemia), Kecenderungan Pendarahan (seperti
                                                                            Hemofilia)</label><br>

                                                                        <input type="checkbox" id="vehicle3"
                                                                            name="nama_permasalahan_medis[]"
                                                                            value="Epilepsi">
                                                                        <label for="vehicle3">Epilepsi</label><br>
                                                                        <input type="checkbox" id="vehicle3"
                                                                            name="nama_permasalahan_medis[]"
                                                                            value="Tuberkulosis, Asma, atau Berbagai Penyakit/Gangguan Pernapasan Lainnya">
                                                                        <label for="vehicle3">Tuberkulosis, Asma, atau
                                                                            Berbagai Penyakit/Gangguan Pernapasan
                                                                            Lainnya</label><br>



                                                                    </div>
                                                                    <div class="col-md-6">


                                                                        <input type="checkbox" id="vehicle3"
                                                                            name="nama_permasalahan_medis[]"
                                                                            value="Tekanan Darah Tinggi">
                                                                        <label for="vehicle3">Tekanan Darah
                                                                            Tinggi</label><br>

                                                                        <input type="checkbox" id="vehicle3"
                                                                            name="nama_permasalahan_medis[]"
                                                                            value="Arthritis, Reumatik, Cedera, atau Penyakit pada Tulang, Sendi, Tulang Belakang, Bagian Belakang Tubuh (termasuk Leher)">
                                                                        <label for="vehicle3">Arthritis, Reumatik, Cedera,
                                                                            atau Penyakit pada Tulang, Sendi, Tulang
                                                                            Belakang, Bagian Belakang Tubuh (termasuk
                                                                            Leher)</label><br>

                                                                        <input type="checkbox" id="vehicle3"
                                                                            name="nama_permasalahan_medis[]"
                                                                            value="Kanker, Tumor, atau Perkembangan Sel yang Membahayakan">
                                                                        <label for="vehicle3">Kanker, Tumor, atau
                                                                            Perkembangan Sel yang Membahayakan</label><br>
                                                                        <input type="checkbox" id="vehicle1"
                                                                            name="nama_permasalahan_medis[]"
                                                                            value="Cedera Kepala yang Menyebabkan Pusing, Hilang Memori, Muntah, Hilang Kesadaran, atau Memerlukan Perhatian Medis">
                                                                        <label for="vehicle1">Cedera Kepala yang
                                                                            Menyebabkan Pusing, Hilang Memori, Muntah,
                                                                            Hilang Kesadaran, atau Memerlukan Perhatian
                                                                            Medis</label><br>

                                                                        <input type="checkbox" id="vehicle2"
                                                                            name="nama_permasalahan_medis[]"
                                                                            value="Rasa Sakit di Bagian Belakang, Sangat Jarang/Berkelanjutan/Hanya Setelah Latihan dalam Intensitas Tinggi">
                                                                        <label for="vehicle2"> Rasa Sakit di Bagian
                                                                            Belakang, Sangat Jarang/Berkelanjutan/Hanya
                                                                            Setelah Latihan dalam Intensitas
                                                                            Tinggi</label><br>

                                                                        <input type="checkbox" id="vehicle3"
                                                                            name="nama_permasalahan_medis[]"
                                                                            value="Cedera (seperti Dislokasi, Retak) pada Bahu, Lengan, Sikut, Pergelangan, atau Tangan Hingga Tak Mampu Bergerak">
                                                                        <label for="vehicle3">Cedera (seperti Dislokasi,
                                                                            Retak) pada Bahu, Lengan, Sikut, Pergelangan,
                                                                            atau Tangan Hingga Tak Mampu
                                                                            Bergerak</label><br>

                                                                        <input type="checkbox" id="vehicle3"
                                                                            name="nama_permasalahan_medis[]"
                                                                            value="Rehabilitasi Sebagian/Program Fisioterapi">
                                                                        <label for="vehicle3">Rehabilitasi Sebagian/Program
                                                                            Fisioterapi</label><br>


                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button type="submit"
                                                            class="btn btn-primary mt-1 ">Submit</button>
                                                    </form>
                                                </div>
                                            @endif

                                        </div>
                                    </div>

                                    <div class="mb-2">
                                        <button class="accordion">Obat-obatan, Suplemen Makanan, dan Berbagai Macam Obat
                                            Lainnya @if ($konsumsiObat->count() > 0)
                                                <span style="float: right; color:green">
                                                    &#10004;
                                                </span>
                                            @endif
                                        </button>
                                        <div class="panel">
                                            @if ($konsumsiObat->count() > 0)
                                                <div class="mt-2">
                                                    <form action="{{ route('edit-konsumsi-obat') }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="checkbox" id="vehicle1"
                                                                    @php $value = 0;
                                                                                foreach ($konsumsiObat as $item) {
                                                                                    if ($item->value == 'Saya Mengonsumsi Suplemen Nutrisi Sekarang (seperti Vitamin, Zat Besi, Kalsium, dan lainnya)') {
                                                                                        $value++;
                                                                                    } else {
                                                                                        continue;
                                                                                    }
                                                                                } @endphp
                                                                    @if ($value > 0) checked @endif
                                                                    name="kosumsi_obat[]"
                                                                    value="Saya Mengonsumsi Suplemen Nutrisi Sekarang (seperti Vitamin, Zat Besi, Kalsium, dan lainnya)">
                                                                <label for="vehicle1">Saya Mengonsumsi Suplemen
                                                                    Nutrisi Sekarang (seperti Vitamin, Zat Besi,
                                                                    Kalsium, dan lainnya)</label><br>

                                                                <input type="checkbox" id="vehicle1"
                                                                    @php $value = 0;
                                                                                foreach ($konsumsiObat as $item) {
                                                                                    if ($item->value == 'Saya Mengonsumsi Anabolic Agents (seperti Steroid, Hormon Pertumbuhan, dan lainnya)') {
                                                                                        $value++;
                                                                                    } else {
                                                                                        continue;
                                                                                    }
                                                                                } @endphp
                                                                    @if ($value > 0) checked @endif
                                                                    name="kosumsi_obat[]"
                                                                    value="Saya Mengonsumsi Anabolic Agents (seperti Steroid, Hormon Pertumbuhan, dan lainnya)">
                                                                <label for="vehicle1">Saya Mengonsumsi Anabolic
                                                                    Agents (seperti Steroid, Hormon Pertumbuhan, dan
                                                                    lainnya)</label><br>

                                                                <input type="checkbox" id="vehicle1"
                                                                    @php $value = 0;
                                                                                foreach ($konsumsiObat as $item) {
                                                                                    if ($item->value == 'Saya Mengonsumsi Oral Kontrasepsi') {
                                                                                        $value++;
                                                                                    } else {
                                                                                        continue;
                                                                                    }
                                                                                } @endphp
                                                                    @if ($value > 0) checked @endif
                                                                    name="kosumsi_obat[]"
                                                                    value="Saya Mengonsumsi Oral Kontrasepsi">
                                                                <label for="vehicle1">Saya Mengonsumsi Oral
                                                                    Kontrasepsi</label><br>

                                                                <input type="checkbox" id="vehicle1"
                                                                    @php $value = 0;
                                                                                foreach ($konsumsiObat as $item) {
                                                                                    if ($item->value == 'Saya Disarankan untuk Beberapa Alasan Medis agar Tidak Berpartisipasi dalam Berbagai bentuk Olahraga Apa Pun dalam Rentang Waktu yang Telah Ditentukan') {
                                                                                        $value++;
                                                                                    } else {
                                                                                        continue;
                                                                                    }
                                                                                } @endphp
                                                                    @if ($value > 0) checked @endif
                                                                    name="kosumsi_obat[]"
                                                                    value="Saya Disarankan untuk Beberapa Alasan Medis agar Tidak Berpartisipasi dalam Berbagai bentuk Olahraga Apa Pun dalam Rentang Waktu yang Telah Ditentukan">
                                                                <label for="vehicle1">Saya Disarankan untuk
                                                                    Beberapa Alasan Medis agar Tidak Berpartisipasi
                                                                    dalam Berbagai bentuk Olahraga Apa Pun dalam
                                                                    Rentang Waktu yang Telah Ditentukan</label><br>

                                                                <input type="checkbox" id="vehicle1"
                                                                    @php $value = 0;
                                                                                foreach ($konsumsiObat as $item) {
                                                                                    if ($item->value == 'Saya Memakai Lensa Kontak Saat Berolahraga') {
                                                                                        $value++;
                                                                                    } else {
                                                                                        continue;
                                                                                    }
                                                                                } @endphp
                                                                    @if ($value > 0) checked @endif
                                                                    name="kosumsi_obat[]"
                                                                    value="Saya Memakai Lensa Kontak Saat Berolahraga">
                                                                <label for="vehicle1">Saya Memakai Lensa Kontak
                                                                    Saat Berolahraga</label><br>

                                                                <input type="checkbox" id="vehicle1"
                                                                    @php $value = 0;
                                                                                foreach ($konsumsiObat as $item) {
                                                                                    if ($item->value == 'Saya Meminum Minuman Beralkohol. Jumlah Per Minggu Sebanyak') {
                                                                                        $value++;
                                                                                    } else {
                                                                                        continue;
                                                                                    }
                                                                                } @endphp
                                                                    @if ($value > 0) checked @endif
                                                                    name="kosumsi_obat[]"
                                                                    value="Saya Meminum Minuman Beralkohol. Jumlah Per Minggu Sebanyak">
                                                                <label for="vehicle1">Saya Meminum Minuman
                                                                    Beralkohol. Jumlah Per Minggu
                                                                    Sebanyak</label><br>

                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="checkbox" id="vehicle2"
                                                                    @php $value = 0;
                                                                                foreach ($konsumsiObat as $item) {
                                                                                    if ($item->value == 'Saya Mengonsumsi Stimulan (seperti Amphetamine, dan lainnya)') {
                                                                                        $value++;
                                                                                    } else {
                                                                                        continue;
                                                                                    }
                                                                                } @endphp
                                                                    @if ($value > 0) checked @endif
                                                                    name="kosumsi_obat[]"
                                                                    value="Saya Mengonsumsi Stimulan (seperti Amphetamine, dan lainnya)">
                                                                <label for="vehicle2"> Saya Mengonsumsi Stimulan
                                                                    (seperti Amphetamine, dan lainnya)</label><br>

                                                                <input type="checkbox" id="vehicle3"
                                                                    @php $value = 0;
                                                                                foreach ($konsumsiObat as $item) {
                                                                                    if ($item->value == 'Saya Mengonsumsi Pil Tidur') {
                                                                                        $value++;
                                                                                    } else {
                                                                                        continue;
                                                                                    }
                                                                                } @endphp
                                                                    @if ($value > 0) checked @endif
                                                                    name="kosumsi_obat[]"
                                                                    value="Saya Mengonsumsi Pil Tidur">
                                                                <label for="vehicle3">Saya Mengonsumsi Pil
                                                                    Tidur</label><br>
                                                                <input type="checkbox" id="vehicle3"
                                                                    @php $value = 0;
                                                                                foreach ($konsumsiObat as $item) {
                                                                                    if ($item->value == 'Saya Mengonsumsi Obat-obatan yang Tidak Disebutkan di Atas') {
                                                                                        $value++;
                                                                                    } else {
                                                                                        continue;
                                                                                    }
                                                                                } @endphp
                                                                    @if ($value > 0) checked @endif
                                                                    name="kosumsi_obat[]"
                                                                    value="Saya Mengonsumsi Obat-obatan yang Tidak Disebutkan di Atas">
                                                                <label for="vehicle3">Saya Mengonsumsi Obat-obatan
                                                                    yang Tidak Disebutkan di Atas</label><br>

                                                                <input type="checkbox" id="vehicle3"
                                                                    @php $value = 0;
                                                                                foreach ($konsumsiObat as $item) {
                                                                                    if ($item->value == 'Saya Memakai Kacamata Saat Berolahraga') {
                                                                                        $value++;
                                                                                    } else {
                                                                                        continue;
                                                                                    }
                                                                                } @endphp
                                                                    @if ($value > 0) checked @endif
                                                                    name="kosumsi_obat[]"
                                                                    value="Saya Memakai Kacamata Saat Berolahraga">
                                                                <label for="vehicle3">Saya Memakai Kacamata Saat
                                                                    Berolahraga</label><br>

                                                                <input type="checkbox" id="vehicle3"
                                                                    @php $value = 0;
                                                                                foreach ($konsumsiObat as $item) {
                                                                                    if ($item->value == 'Saya Merokok. Jumlah per Hari Sebanyak') {
                                                                                        $value++;
                                                                                    } else {
                                                                                        continue;
                                                                                    }
                                                                                } @endphp
                                                                    @if ($value > 0) checked @endif
                                                                    name="kosumsi_obat[]"
                                                                    value="Saya Merokok. Jumlah per Hari Sebanyak">
                                                                <label for="vehicle3">Saya Merokok. Jumlah per Hari
                                                                    Sebanyak</label><br>




                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-success mt-1 ">Edit</button>
                                                    </form>
                                                </div>
                                            @else
                                                <div class="mt-2">
                                                    <form action="{{ route('submit-konsumsi-obat') }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-12 mb-2"><b>Lengkapi data di bawah ini apabila
                                                                    ada.</b></div>
                                                            <div class="form-group col-md-12">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <input type="checkbox" id="vehicle1"
                                                                            name="kosumsi_obat[]"
                                                                            value="Saya Mengonsumsi Suplemen Nutrisi Sekarang (seperti Vitamin, Zat Besi, Kalsium, dan lainnya)">
                                                                        <label for="vehicle1">Saya Mengonsumsi Suplemen
                                                                            Nutrisi Sekarang (seperti Vitamin, Zat Besi,
                                                                            Kalsium, dan lainnya)</label><br>

                                                                        <input type="checkbox" id="vehicle1"
                                                                            name="kosumsi_obat[]"
                                                                            value="Saya Mengonsumsi Anabolic Agents (seperti Steroid, Hormon Pertumbuhan, dan lainnya)">
                                                                        <label for="vehicle1">Saya Mengonsumsi Anabolic
                                                                            Agents (seperti Steroid, Hormon Pertumbuhan, dan
                                                                            lainnya)</label><br>

                                                                        <input type="checkbox" id="vehicle1"
                                                                            name="kosumsi_obat[]"
                                                                            value="Saya Mengonsumsi Oral Kontrasepsi">
                                                                        <label for="vehicle1">Saya Mengonsumsi Oral
                                                                            Kontrasepsi</label><br>

                                                                        <input type="checkbox" id="vehicle1"
                                                                            name="kosumsi_obat[]"
                                                                            value="Saya Disarankan untuk Beberapa Alasan Medis agar Tidak Berpartisipasi dalam Berbagai bentuk Olahraga Apa Pun dalam Rentang Waktu yang Telah Ditentukan">
                                                                        <label for="vehicle1">Saya Disarankan untuk
                                                                            Beberapa Alasan Medis agar Tidak Berpartisipasi
                                                                            dalam Berbagai bentuk Olahraga Apa Pun dalam
                                                                            Rentang Waktu yang Telah Ditentukan</label><br>

                                                                        <input type="checkbox" id="vehicle1"
                                                                            name="kosumsi_obat[]"
                                                                            value="Saya Memakai Lensa Kontak Saat Berolahraga">
                                                                        <label for="vehicle1">Saya Memakai Lensa Kontak
                                                                            Saat Berolahraga</label><br>

                                                                        <input type="checkbox" id="vehicle1"
                                                                            name="kosumsi_obat[]"
                                                                            value="Saya Meminum Minuman Beralkohol. Jumlah Per Minggu Sebanyak">
                                                                        <label for="vehicle1">Saya Meminum Minuman
                                                                            Beralkohol. Jumlah Per Minggu
                                                                            Sebanyak</label><br>

                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <input type="checkbox" id="vehicle2"
                                                                            name="kosumsi_obat[]"
                                                                            value="Saya Mengonsumsi Stimulan (seperti Amphetamine, dan lainnya)">
                                                                        <label for="vehicle2"> Saya Mengonsumsi Stimulan
                                                                            (seperti Amphetamine, dan lainnya)</label><br>

                                                                        <input type="checkbox" id="vehicle3"
                                                                            name="kosumsi_obat[]"
                                                                            value="Saya Mengonsumsi Pil Tidur">
                                                                        <label for="vehicle3">Saya Mengonsumsi Pil
                                                                            Tidur</label><br>
                                                                        <input type="checkbox" id="vehicle3"
                                                                            name="kosumsi_obat[]"
                                                                            value="Saya Mengonsumsi Obat-obatan yang Tidak Disebutkan di Atas">
                                                                        <label for="vehicle3">Saya Mengonsumsi Obat-obatan
                                                                            yang Tidak Disebutkan di Atas</label><br>

                                                                        <input type="checkbox" id="vehicle3"
                                                                            name="kosumsi_obat[]"
                                                                            value="Saya Memakai Kacamata Saat Berolahraga">
                                                                        <label for="vehicle3">Saya Memakai Kacamata Saat
                                                                            Berolahraga</label><br>

                                                                        <input type="checkbox" id="vehicle3"
                                                                            name="kosumsi_obat[]"
                                                                            value="Saya Merokok. Jumlah per Hari Sebanyak">
                                                                        <label for="vehicle3">Saya Merokok. Jumlah per Hari
                                                                            Sebanyak</label><br>




                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button type="submit"
                                                            class="btn btn-primary mt-1 ">Submit</button>
                                                    </form>
                                                </div>
                                            @endif

                                        </div>
                                    </div>

                                    <div class="mb-2">
                                        <button class="accordion">Pola Tidur @if ($polaTidur)
                                                <span style="float: right; color:green">
                                                    &#10004;
                                                </span>
                                            @endif
                                        </button>
                                        <div class="panel">
                                            @if ($polaTidur)
                                                <div class="mt-2">
                                                    <form action="{{ route('edit-pola-tidur') }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden" id="pola_tidur_id" name="pola_tidur_id"
                                                            value="{{ $polaTidur->id }}">
                                                        <div class="row">
                                                            <div class="col-12 mb-2"><b>Lengkapi Data dibawah ini</b>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <label class="text-muted">Pukul berapa biasanya Anda tidur
                                                                    malam setiap hari?</label>
                                                                <input type="time" id="jam_tidur"
                                                                    value="{{ $polaTidur->jam_tidur }}" name="jam_tidur"
                                                                    class="form-control" required>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <label class="text-muted">Pukul berapa biasanya Anda
                                                                    bangun di pagi hari?</label>
                                                                <input type="time" id="jam_bangun"
                                                                    value="{{ $polaTidur->jam_bangun }}"
                                                                    name="jam_bangun" class="form-control" required>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <label class="text-muted">Berapa lama durasi tidur
                                                                    Anda?</label>
                                                                <input type="number" type="number" step="0.01"
                                                                    id="durasi_tidur"
                                                                    value="{{ $polaTidur->durasi_tidur }}"
                                                                    name="durasi_tidur" class="form-control" required>
                                                            </div>

                                                        </div>
                                                        <button type="submit"
                                                            class="btn btn-success mt-1 ">Edit</button>
                                                    </form>
                                                </div>
                                            @else
                                                <div class="mt-2">
                                                    <form action="{{ route('submit-pola-tidur') }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-12 mb-2"><b>Lengkapi Data dibawah ini</b>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <label class="text-muted">Pukul berapa biasanya Anda tidur
                                                                    malam setiap hari?</label>
                                                                <input type="time" id="jam_tidur" name="jam_tidur"
                                                                    class="form-control" required>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <label class="text-muted">Pukul berapa biasanya Anda
                                                                    bangun di pagi hari?</label>
                                                                <input type="time" id="jam_bangun"
                                                                    name="jam_bangun" class="form-control" required>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <label class="text-muted">Berapa lama durasi tidur
                                                                    Anda?</label>
                                                                <input type="number" type="number" step="0.01"
                                                                    id="durasi_tidur" name="durasi_tidur"
                                                                    class="form-control" required>
                                                            </div>

                                                        </div>
                                                        <button type="submit"
                                                            class="btn btn-primary mt-1 ">Submit</button>
                                                    </form>
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
        <!-- ############ Main END-->
    </div>



    <!-- ############ Content END-->
@endsection
@push('addon-script')
    <script>
        function show50() {
            document.getElementById('meninggal').classList.remove('hiddendong')
        }
        if (document.getElementById('meninggal_under_502').checked) {
            document.getElementById('meninggal').classList.add('hiddendong')


        }
    </script>
    <script>
        function hidden50() {
            document.getElementById('meninggal').classList.add('hiddendong')

        }

        function showLainnya() {
            document.getElementById('penyakit_lainnya').classList.remove('hiddendong')
        }

        function showGejalaLainnya() {
            document.getElementById('gejala_lainnya').classList.remove('hiddendong')
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
@endpush
