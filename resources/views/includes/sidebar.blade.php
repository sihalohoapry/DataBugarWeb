        <div class="modal fade" id="ModalLogout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Anda yakin ingin keluar dari aplikasi?</h4>
                        <button type="button" class="btn btn-close" data-dismiss="modal">

                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Ya</button>
                        </form>

                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div id="aside" class="page-sidenav no-shrink bg-light nav-dropdown fade" aria-hidden="true">
            <div class="sidenav h-100 bg-light modal-dialog">
                <!-- sidenav top -->
                <div class="navbar">
                    <!-- brand -->
                    <div>
                        <a href="{{ route('dashboard') }}" class="navbar-brand " style="color: black">
                            <img src="{{ asset('logo-databugar.png') }}" alt="logo"> Data Bugar
                            <SUP>+</SUP>

                        </a>
                        <p class="ml-3 mt-2"> {{ Auth::user()->name }}</p>
                    </div>
                    <!-- / brand -->
                    <!-- / brand -->
                </div>
                <!-- Flex nav content -->
                <div class="flex scrollable hover">
                    <div class="nav-active-text-primary" data-nav>
                        <ul class="nav bg">
                            <li>
                                <a href="{{ route('dashboard') }}">
                                    <span class="nav-icon"><i data-feather='monitor'></i></span>
                                    <span
                                        class="nav-text {{ request()->is('dashboard*') ? 'text-primary' : '' }}">Home</span>
                                </a>

                            </li>
                            @if (Auth::user()->role == 'ADMIN')
                                <li>
                                    <a href="{{ route('guru') }}">
                                        <span class="nav-icon"><i data-feather='list'></i></span>
                                        <span
                                            class="nav-text {{ request()->is('guru*') ? 'text-primary' : 'none' }}">Guru</span>
                                    </a>

                                </li>
                                <li>
                                    <a href="{{ route('sekolah') }}" class="">
                                        <span class="nav-icon"><i data-feather='list'></i></span>
                                        <span
                                            class="nav-text {{ request()->is('sekolah*') ? 'text-primary' : '' }}">Sekolah</span>
                                    </a>

                                </li>
                                <li>
                                    <a href="{{ route('materi') }}" class="">
                                        <span class="nav-icon"><i data-feather='list'></i></span>
                                        <span
                                            class="nav-text {{ request()->is('materi*') ? 'text-primary' : '' }}">Materi
                                            Video</span>

                                    </a>

                                </li>
                                <li>
                                    <a href="{{ route('result-imt') }}" class="">
                                        <span class="nav-icon"><i data-feather='list'></i></span>
                                        <span
                                            class="nav-text {{ request()->is('result-imt*') ? 'text-primary' : '' }}">Result
                                            IMT</span>

                                    </a>

                                </li>
                                <li>
                                    <a href="{{ route('result-kebugaran') }}" class="">
                                        <span class="nav-icon"><i data-feather='list'></i></span>
                                        <span
                                            class="nav-text {{ request()->is('result-kebugaran*') ? 'text-primary' : '' }}">Result
                                            Kebugaran</span>

                                    </a>

                                </li>
                            @endif
                            @if (Auth::user()->role == 'GURU')
                                <li>
                                    <a href="{{ route('kelas') }}" class="">
                                        <span class="nav-icon"><i data-feather='list'></i></span>
                                        <span
                                            class="nav-text {{ request()->is('kelas*') ? 'text-primary' : '' }}">Kelas</span>
                                    </a>

                                </li>
                                <li>
                                    <a href="{{ route('siswa') }}" class="">
                                        <span class="nav-icon"><i data-feather='list'></i></span>
                                        <span
                                            class="nav-text {{ request()->is('siswa*') ? 'text-primary' : '' }}">Siswa</span>
                                    </a>

                                </li>
                                <li>
                                    <a href="{{ route('jadwal-tes') }}" class="">
                                        <span class="nav-icon"><i data-feather='list'></i></span>
                                        <span
                                            class="nav-text {{ request()->is('jadwal-tes*') ? 'text-primary' : '' }}">Jadwal
                                            Tes</span>
                                    </a>

                                </li>
                            @endif

                            @if (Auth::user()->role == 'SISWA')
                                <li>
                                    <a href="{{ route('jadwal-tes-siswa') }}">

                                        <span class="nav-icon"><i data-feather='list'></i></span>
                                        <span
                                            class="nav-text {{ request()->is('jadwal-tes-siswa*') ? 'text-primary' : '' }}">Jadwal
                                            Test</span>
                                    </a>

                                </li>
                                <li>
                                    <a href="{{ route('siswa') }}" class="">
                                        <span class="nav-icon"><i data-feather='list'></i></span>
                                        <span class="nav-text {{ request()->is('siswa*') ? 'text-primary' : '' }}">Test
                                            Mandiri</span>
                                    </a>

                                </li>
                                <li>
                                    <a href="{{ route('jadwal-tes') }}" class="">
                                        <span class="nav-icon"><i data-feather='list'></i></span>
                                        <span
                                            class="nav-text {{ request()->is('') ? 'text-primary' : '' }}">Raport</span>
                                    </a>

                                </li>
                            @endif

                            <li>
                                <a href="" data-toggle="modal" data-target="#ModalLogout">
                                    <span class="nav-icon text-success"><i data-feather='arrow-up-right'></i></span>
                                    <span class="nav-text">Keluar</span>
                                </a>


                                {{-- <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                            <span class="nav-icon text-success"><i data-feather='arrow-up-right'></i></span>
                            <span class="nav-text">Keluar</span>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form> --}}

                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
