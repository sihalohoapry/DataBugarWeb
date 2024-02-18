    <div class="modal fade" id="MET" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Informasi Grading MET</h4>
                    <button type="button" class="btn btn-close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
                <button type="button" class="btn btn-warning" data-dismiss="modal">Tutup</button>

            </div>
        </div>
    </div>

    <div class="modal fade" id="Kebugaran" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Aktifitas Fisik Ringan</h4>
                    <button type="button" class="btn btn-close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="IMT" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Informasi Grading IMT</h4>
                    <button type="button" class="btn btn-close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card border-dark mb-3">
                                <div class="card-header">Grading IMT Pria (kg/m<SUP class="mt-4">2</SUP>)</div>
                                <div class="card-body text-dark">
                                    <h5 class="card-title">Usia 16 - 19 Tahun</h5>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>Obesitas</td>
                                                    <td>29,51 - 32,00</td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card border-dark mb-3">
                                <div class="card-header">Grading IMT Wanita (kg/m<SUP class="mt-4">2</SUP>)</div>
                                <div class="card-body text-dark">
                                    <h5 class="card-title">Dark card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the bulk of the card's content.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-warning" data-dismiss="modal">Tutup</button>

            </div>
        </div>
    </div>


    <div id="header" class="page-header ">
        <div class="navbar navbar-expand-lg">
            <!-- brand -->
            <a href="index.html" class="navbar-brand d-lg-none">

                <img src="{{ asset('logo-databugar.png') }}" alt="...">
            </a>
            <!-- / brand -->
            <!-- Navbar collapse -->
            <ul class="nav navbar-menu order-1 order-lg-2">
                <li class="nav-item dropdown">
                    <a class="nav-link px-2 btn btn-outline-success" data-toggle="dropdown">
                        <i data-feather="file"></i> Grading
                    </a>
                    <!-- ############ Setting START-->
                    <div class="dropdown-menu dropdown-menu-center mt-3 w animate fadeIn" style="margin-right: 50px">
                        <div class="setting px-3 mb-2">
                            <a href="" data-toggle="modal" data-target="#IMT" style="color: black">IMT</a>
                        </div>
                        <div class="setting px-3 mb-2"><a href="" data-toggle="modal" data-target="#MET"
                                style="color: black">MET</a>
                        </div>
                        <div class="setting px-3 mb-2"><a href="" data-toggle="modal" data-target="#Kebugaran"
                                style="color: black">KEBUGARAN</a>
                        </div>
                    </div>
                    <!-- ############ Setting END-->
                </li>
                <!-- Navarbar toggle btn -->

                <li class="nav-item d-lg-none">
                    <a class="nav-link px-1" data-toggle="modal" data-target="#aside">
                        <i data-feather="menu"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
