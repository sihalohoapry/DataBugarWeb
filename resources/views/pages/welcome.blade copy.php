<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Data Bugar</title>
    <meta name="description" content="Responsive, Bootstrap, BS4" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="icon" href="{{ asset('logo-databugar.png') }}">

    <!-- style -->
    @stack('styles')
    <!-- build:css ../dashboard/css/site.min.css -->
    <link rel="stylesheet" href="{{ asset('basik/assets/css/bootstrap.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('basik/assets/css/theme.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('basik/assets/css/style.css') }}" type="text/css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- endbuild -->
</head>
<style>
    body {
        background-color: #fffff;
    }

    .container-custom {
        position: absolute;
        width: 100%;
        top: 50%;
        left: 50%;
        /* bring your own prefixes */
        transform: translate(-50%, -50%);
    }
</style>

<body>
    <div id="content" class="flex container-custom ">
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

            <div class="page-content page-container " style="overflow: scroll; padding: " id="page-content">
                <div class="padding">
                    <div class="row">
                        <div class="col-md-12 mt-4">

                            <div class="card">
                                <div class="text-center">
                                    <img src="{{ asset('logo-databugar.png') }}" alt="..."> <span style="font-family: Georgia, 'Times New Roman', Times, serif;
                                                 font-size: 24px
                                                 ">DATA BUGAR</span>
                                </div>

                                <div class="card-body">
                                    <form action="{{ route('update-materi',$data->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-row">
                                            <div class="col-md-6 col-sm-12">

                                                <!-- Nav tabs -->
                                                <ul class="nav nav-pills">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" data-toggle="pill" href="#home">Push Up</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="pill" href="#menu1">Sit Up</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="pill" href="#menu2">Back Up</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="pill" href="#menu3">Squat Jump</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-toggle="pill" href="#menu4">Pull Up</a>
                                                    </li>
                                                </ul>

                                                <!-- Tab panes -->
                                                <div class="tab-content" style="height: 100%">
                                                    <div class="tab-pane container fade active" id="home" style="height: 100%;">
                                                        <iframe width="100%" height="100%" src="https://www.youtube.com/embed/{{ substr($data->url_video,17) }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

                                                    </div>
                                                    <div class="tab-pane container fade" style="height: 100%" id="menu1">...</div>
                                                    <div class="tab-pane container fade" id="menu2">...</div>
                                                    <div class="tab-pane container fade" id="menu3">...</div>
                                                    <div class="tab-pane container fade" id="menu4">...</div>

                                                </div>

                                                {{-- <object width="100%" height="100%" data="{{ $data->url_video }}" type="application/x-shockwave-flash">
                                                <param name="src" value="{{ $data->url_video }}" /></object> --}}
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="row">
                                                    <div class="col-12 mb-2">IMT</div>
                                                    <div class="form-group col-md-6">
                                                        <label class="text-muted">Umur</label>
                                                        <input type="number" id="berat" name="berat" class="form-control" required placeholder="16 tahun - 19 tahun">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="text-muted">Jenis Klamin</label>
                                                        <select class="form-control" name="jenis_klamin" id="jenis_klamin" required>
                                                            <option value="">Pilih Jenis Kelamin</option>
                                                            <option value="">Laki - Laki</option>
                                                            <option value="">Perempuan</option>

                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="text-muted">Berat Badan</label>
                                                        <input type="number" step="0.01" id="berat" name="berat" class="form-control" required placeholder="kg">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="text-muted">Tinggi Badan</label>
                                                        <input type="number" step="0.01" id="tinggi" name="tinggi" class="form-control" required placeholder="cm">
                                                    </div>
                                                    <div class="col-12 mt-3 mb-2">
                                                        <p>Tes Kekuatan</p>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="text-muted">Push Up</label>
                                                        <input type="number" step="0.01" id="pushup" name="pushup" class="form-control" required>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="text-muted">Sit Up</label>
                                                        <input type="number" step="0.01" id="situp" name="situp" class="form-control" required>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="text-muted">Back Up</label>
                                                        <input type="number" step="0.01" id="backup" name="backup" class="form-control" required>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="text-muted">Squat Jump</label>
                                                        <input type="number" step="0.01" id="squatjump" name="squatjump" class="form-control" required>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="text-muted">Pull Up</label>
                                                        <input type="number" step="0.01" id="pullup" name="pullup" class="form-control" required>
                                                    </div>



                                                    <div class="col-12 mt-3 mb-2">
                                                        <p>Tes Kebugaran</p>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label class="text-muted">Push Up</label>
                                                        <div class="row ml-2">
                                                            <div class="form-check col-md-6">
                                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                                                <label class="form-check-label" for="flexRadioDefault1">
                                                                    Cooper Test
                                                                </label>
                                                            </div>
                                                            <div class="form-check col-md-6">
                                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                                                <label class="form-check-label" for="flexRadioDefault2">
                                                                    Rookport Test
                                                                </label>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="text-muted">Waktu Lari</label>
                                                        <input type="number" step="0.01" id="waktu_lari" name="waktu_lari" class="form-control" required>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="text-muted">Detik</label>
                                                        <input type="number" step="0.01" id="detik" name="detik" class="form-control" required>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                        <button type="submit" class="btn btn-primary mt-5 float-right">Submit</button>
                                    </form>
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
</body>
<script>
    $(document).ready(function() {
        $(".nav-tabs a").click(function() {
            $(this).tab('show');
        });
    });
</script>
<script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('deskripsi');
</script>

</html>