@extends('layouts.admin')
@section('title')
    Tambah Materi
@endsection
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
                                <h2 class="text-md text-highlight">Tambah Materi Video</h2>
                                <small class="text-muted">Silahkan Isi data dengan benar</small>
                            </div>
                        </div>
                    </div>

                    <div class="page-content page-container" id="page-content">
                        <div class="padding pt-0">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <strong>Data - data Materi</strong>
                                        </div>
                                        <div class="card-body">
                                            <form action="{{ route('create-materi') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <label class="text-muted">Judu</label>
                                                        <input  type="text" id="judul" name="judul"  class="form-control" required>
                                                    </div>
                                                    <div class="form-group col-md-12 mb-2">
                                                        <label class="text-muted">Deskripsi</label>
                                                        <textarea type="text" rows="5" class="form-control" name="deskripsi" placeholder="Silahkan Masukkan Deskripsi" required></textarea>
                                                    
                                                    </div>
                                                    
                                                    <div class="form-group col-md-12">
                                                        <label class="text-muted">URL Video</label>
                                                        <input type="text" id="url_video" name="url_video"  class="form-control" required>
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
@endsection
@push('addon-script')
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>

    <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'deskripsi' );
</script>
@endpush
