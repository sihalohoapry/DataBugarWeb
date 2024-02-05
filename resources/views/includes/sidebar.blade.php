<div id="aside" class="page-sidenav no-shrink bg-light nav-dropdown fade" aria-hidden="true">
    <div class="sidenav h-100 bg-light modal-dialog">
        <!-- sidenav top -->
        <div class="navbar">
            <!-- brand -->
            <a href="{{ route('home') }}" class="navbar-brand ">
                <img src="{{ asset('logo-databugar.png') }}" alt="logo"> Data Bugar

            </a>
            <!-- / brand -->
            <!-- / brand -->
        </div>
        <!-- Flex nav content -->
        <div class="flex scrollable hover">
            <div class="nav-active-text-primary" data-nav>
                <ul class="nav bg">
                    <li>
                        <a href="{{ route('home') }}">
                            <span class="nav-icon"><i data-feather='monitor'></i></span>
                            <span class="nav-text {{ request()->is('home*') ? 'text-primary' : '' }}">Dashboard</span>
                        </a>

                    </li>
                    <li>
                        <a href="{{ route('guru') }}">
                            <span class="nav-icon"><i data-feather='list'></i></span>
                            <span class="nav-text {{ request()->is('guru*') ? 'text-primary' : 'none' }}">Guru</span>
                        </a>

                    </li>
                    <li>
                        <a href="{{ route('sekolah') }}" class="">
                            <span class="nav-icon"><i data-feather='list'></i></span>
                            <span class="nav-text {{ request()->is('sekolah*') ? 'text-primary' : '' }}">Sekolah</span>
                        </a>

                    </li>
                    @if (Auth::user()->role == 'GURU')
                        <li>
                            <a href="{{ route('kelas') }}" class="">
                                <span class="nav-icon"><i data-feather='list'></i></span>
                                <span class="nav-text {{ request()->is('kelas*') ? 'text-primary' : '' }}">Kelas</span>
                            </a>

                        </li>
                    @endif
                    <li>
                        <a href="{{ route('materi') }}" class="">
                            <span class="nav-icon"><i data-feather='list'></i></span>
                            <span class="nav-text {{ request()->is('materi*') ? 'text-primary' : '' }}">Materi
                                Video</span>

                        </a>

                    </li>
                    <li>
                        <a href="{{ route('result-imt') }}" class="">
                            <span class="nav-icon"><i data-feather='list'></i></span>
                            <span class="nav-text {{ request()->is('result-imt*') ? 'text-primary' : '' }}">Result
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
                    <li>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                            <span class="nav-icon text-success"><i data-feather='arrow-up-right'></i></span>
                            <span class="nav-text">Keluar</span>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</div>
