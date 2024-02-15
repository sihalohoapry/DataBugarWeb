@extends('layouts.admin')
@section('title')
    Detail Siswa
@endsection
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
        @if ($errors->any())
            <div class="alert alert-danger alert-dismiss=">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
        @endif
        <!-- ############ Main START-->
        <div>
            <div class="page-hero page-container " id="page-hero">
                <div class="padding d-flex pt-0">
                    <div class="page-title">
                        <h2 class="text-md text-highlight">Detail Siswa</h2>
                    </div>
                </div>
            </div>

            <div class="page-content page-container" id="page-content">
                <div class="padding pt-0">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong>Data Siswa</strong>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('update-siswa') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="text" hidden name="id" id="id"
                                            value="{{ $data->id }}">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label class="text-muted">Nama</label>
                                                <input type="text" id="name" name="name"
                                                    value="{{ $data->name }}" class="form-control" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="text-muted">NISN</label>
                                                <input type="text" id="nisn" name="nisn"
                                                    value="{{ $data->nisn }}" class="form-control" required>
                                            </div>
                                            <input type="text" hidden name="sekolah_id" id="sekolah_id"
                                                value="{{ $data->sekolah_id }}">
                                            <div class="form-group col-md-6">
                                                <label class="text-muted">Sekolah</label>

                                                <select class="form-control" name="sekolah_id" id="sekolah_id"
                                                    @readonly(true)>
                                                    <option value="{{ $data->sekolah_id }}">{{ $data->nama_sekolah }}
                                                    </option>
                                                </select>


                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="text-muted">Kelas</label>
                                                <select class="form-control" name="class" id="class">
                                                    <option value="{{ $data->class }}">{{ $data->kelas }}</option>

                                                    @foreach ($kelas as $item)
                                                        <option value="{{ $item->id }}">{{ $item->kelas }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="text-muted">Tanggal Lahir</label>
                                                <input type="date" id="date_of_birth" name="date_of_birth"
                                                    value="{{ $data->date_of_birth }}" class="form-control" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="text-muted">Jenis Klamin</label>
                                                <select class="form-control" name="gender" id="gender" required>
                                                    <option value="{{ $data->gender }}"> {{ $data->gender }}
                                                    </option>
                                                    <option value="PRIA">PRIA</option>
                                                    <option value="WANITA">WANITA</option>


                                                </select>
                                            </div>

                                        </div>

                                        <button type="submit" class="btn btn-primary">Edit Data</button>


                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong>Data Tes Siswa</strong>
                                </div>
                                <div class="card-body">
                                    <div class="col-md-12">

                                        @if (count($datas) == 0)
                                            <div class="col-md-12 card mr-2 mt-2 text-center">
                                                <div class="card-body">
                                                    <h5 class="card-title">Data Kosong</h5>
                                                    <h6 class="card-subtitle mb-2 text-muted">Hasil tes belum tersedia</h6>

                                                </div>
                                            </div>
                                        @endif

                                        @foreach ($datas as $item)
                                            <div class="mb-2">
                                                <button class="accordion" style="color: green"><span
                                                        style="font-size: 16px">Tes No.
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
