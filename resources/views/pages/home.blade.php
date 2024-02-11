@extends('layouts.admin')
@section('title')
    Dashboard
@endsection
@section('content')
    <!-- ############ Content START-->
    <div id="content" class="flex">
        <!-- ############ Main START-->
        <div>
            <div class="page-hero page-container" id="page-hero">
                <div class="padding d-flex pt-0">
                    <div class="page-title">
                        <h2 class="text-md text-highlight">Dashboard</h2>
                        <small class="text-muted">Selamat datang,
                            <strong>{{ Auth::user()->name }}</strong>
                        </small>
                    </div>
                    <div class="flex"></div>
                </div>
            </div>
            <div class="page-content page-container" id="page-content">
                <div class="padding pt-0">
                    @if (Auth::user()->role == 'ADMIN')
                        <div class="row row-sm sr">
                            <div class="col-md-4 d-flex">
                                <div class="card flex">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center text-hover-success">
                                            <div class="avatar w-56 m-2 no-shadow gd-primary">
                                                <i data-feather="users"></i>
                                            </div>
                                            <div class="px-4 flex">
                                                <div>User Terdaftar</div>
                                                <div class="text-success mt-2">
                                                    {{ $countSiswa }} siswa.
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 d-flex">
                                <div class="card flex">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center text-hover-success">
                                            <div class="avatar w-56 m-2 no-shadow gd-success">
                                                <i data-feather="users"></i>
                                            </div>
                                            <div class="px-4 flex">
                                                <div>Guru Terdaftar</div>
                                                <div class="text-success mt-2">
                                                    {{ $countGuru }} guru.
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- categories --}}
                            <div class="col-md-4 d-flex">
                                <div class="card flex">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center text-hover-success">
                                            <div class="avatar w-56 m-2 no-shadow gd-primary">
                                                <i data-feather="map"></i>
                                            </div>
                                            <div class="px-4 flex">
                                                <div>Kelas</div>
                                                <div class="text-success mt-2">
                                                    {{ $countKelas }} kelas.
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 d-flex">
                                <div class="card flex">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center text-hover-success">
                                            <div class="avatar w-56 m-2 no-shadow gd-primary">
                                                <i data-feather="monitor"></i>
                                            </div>
                                            <div class="px-4 flex">
                                                <div>Materi Video</div>
                                                <div class="text-success mt-2">
                                                    {{ $countMateri }} materi.
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endif

                    @if (Auth::user()->role == 'GURU')
                        <div class="row row-sm sr">
                            <div class="col-md-4 d-flex">
                                <div class="card flex">
                                    <a href="{{ route('kelas') }}">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center text-hover-success">
                                                <div class="avatar w-56 m-2 no-shadow gd-primary">
                                                    <i data-feather="users"></i>
                                                </div>
                                                <div class="px-4 flex">
                                                    <div style="text-decoration: none">Kelas</div>
                                                    <div class="text-success mt-2">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 d-flex">
                                <div class="card flex">
                                    <a href="{{ route('jadwal-tes') }}">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center text-hover-success">
                                                <div class="avatar w-56 m-2 no-shadow gd-success">
                                                    <i data-feather="users"></i>
                                                </div>
                                                <div class="px-4 flex">
                                                    <div>Jadwal Tes</div>
                                                </div>

                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            {{-- categories --}}
                            <div class="col-md-4 d-flex">
                                <div class="card flex">
                                    <a href="{{ route('siswa') }}">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center text-hover-success">
                                                <div class="avatar w-56 m-2 no-shadow gd-primary">
                                                    <i data-feather="map"></i>
                                                </div>
                                                <div class="px-4 flex">
                                                    <div>Siswa</div>
                                                    <div class="text-success mt-2">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 d-flex">
                                <div class="card flex">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center text-hover-success">
                                            <div class="avatar w-56 m-2 no-shadow gd-primary">
                                                <i data-feather="monitor"></i>
                                            </div>
                                            <div class="px-4 flex">
                                                <div>Raport</div>
                                                <div class="text-success mt-2">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endif

                    @if (Auth::user()->role == 'SISWA')
                        <div class="row row-sm sr">
                            <div class="col-md-4 d-flex">
                                <div class="card flex">
                                    <a href="{{ route('jadwal-tes-siswa') }}">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center text-hover-success">
                                                <div class="avatar w-56 m-2 no-shadow gd-primary">
                                                    <i data-feather="users"></i>
                                                </div>
                                                <div class="px-4 flex">
                                                    <div style="text-decoration: none">Jadwal Test</div>
                                                    <div class="text-success mt-2">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 d-flex">
                                <div class="card flex">
                                    <a href="">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center text-hover-success">
                                                <div class="avatar w-56 m-2 no-shadow gd-success">
                                                    <i data-feather="users"></i>
                                                </div>
                                                <div class="px-4 flex">
                                                    <div>Test Mandiri</div>
                                                </div>

                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 d-flex">
                                <div class="card flex">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center text-hover-success">
                                            <div class="avatar w-56 m-2 no-shadow gd-primary">
                                                <i data-feather="monitor"></i>
                                            </div>
                                            <div class="px-4 flex">
                                                <div>Raport</div>
                                                <div class="text-success mt-2">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endif
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
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>

    <script></script>
@endpush
