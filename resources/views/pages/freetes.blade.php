@extends('layouts.app')

@section('content')
    <style>
        .hiddendong {
            display: none;
        }
    </style>
    <div class="container">
        <div class=" justify-content-center ">
            <div class="card text-center">
                <div class="card-header" style="font-family: Georgia, 'Times New Roman', Times, serif; font-size: 18px">
                    HASIL FREE TEST DATA BUGAR
                </div>
                <div class="card-body row">
                    <div class="col-md-4">
                        <div
                            class="card @if () border-success
                        @else
                            border-warning @endif mb-3">
                            <div class="card-header">Hasil IMT</div>
                            <div class="card-body ">
                                <h5
                                    class="card-title @if () text-success
                        @else
                            text-warning @endif">
                                    {{ $resultIMT->result }}</h5>
                                <p class="card-text">Angka IMT mu <b style="color: black">{{ $inputResult }}</b> hasil dari
                                    berat badan
                                    <b style="color: black">{{ $berat }}</b> dan tinggi badan <b
                                        style="color: black">{{ $tinggi }}</b>
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
                                            <th scope="row" style="text-align: left">Push Up</th>
                                            <td style="text-align: right">{{ $pushup }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row" style="text-align: left">Sit Up</th>
                                            <td style="text-align: right">{{ $situp }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row" style="text-align: left">Back Up</th>
                                            <td style="text-align: right">{{ $backup }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row" style="text-align: left">Squat Jump</th>
                                            <td style="text-align: right">{{ $squatjump }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row" style="text-align: left">Pull Up</th>
                                            <td style="text-align: right">{{ $pullup }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div
                            class="card @if (
                                $resultKebugaran->result == 'SUPERIOR' ||
                                    $resultKebugaran->result == 'SANGAT BAIK' ||
                                    $resultKebugaran->result == 'BAIK' ||
                                    $resultKebugaran->result == 'SEDANG') border-success
                        @else
                            border-warning @endif mb-3">
                            <div class="card-header">Nilai Tes Kebugaran</div>
                            <div class="card-body ">
                                <h5
                                    class="card-title @if (
                                        $resultKebugaran->result == 'SUPERIOR' ||
                                            $resultKebugaran->result == 'SANGAT BAIK' ||
                                            $resultKebugaran->result == 'BAIK' ||
                                            $resultKebugaran->result == 'SEDANG') text-success
                        @else
                            text-warning @endif">
                                    {{ $resultKebugaran->result }}</h5>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col" colspan="2">{{ $jenis_kebugaran }}</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($waktu_jalan != null)
                                            <tr>
                                                <td>Waktu Jalan 1,6 km</td>
                                                <td>{{ $waktu_jalan }}</td>
                                            </tr>
                                        @endif
                                        @if ($waktu_lari != null)
                                            <tr>
                                                <td>Waktu Jalan 2,4 km</td>
                                                <td>{{ $waktu_lari }}</td>
                                            </tr>
                                        @endif
                                        <tr>
                                            <td>VO2 max (ml/kg/min)</td>
                                            <td>{{ $inputResultKebugaran }}</td>
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

        </div>
    </div>
@endsection
