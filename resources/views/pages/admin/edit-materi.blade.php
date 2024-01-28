@extends('layouts.admin')
@section('title')
    Edit Materi
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
                                <h2 class="text-md text-highlight">Edit Materi</h2>
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
                                           <form action="{{ route('update-materi',$data->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-row">
                                                    <div class="col-md-6">
                                                        <iframe width="100%" height="100%" src="https://www.youtube.com/embed/{{ substr($data->url_video,17) }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                                        {{-- <object width="100%" height="100%" data="{{ $data->url_video }}" type="application/x-shockwave-flash"><param name="src" value="{{ $data->url_video }}" /></object> --}}
                                                    </div>
                                                    <div class="col-md-6">
                                                            <div class="form-group col-md-12">
                                                                <label class="text-muted">Judu</label>
                                                                <input  type="text" id="judul" name="judul"   class="form-control" required value="{{ $data->judul }}">
                                                            </div>
                                                            <div class="form-group col-md-12 mb-2">
                                                                <label class="text-muted">Deskripsi</label>
                                                                <textarea type="text" rows="5" class="form-control" name="deskripsi" placeholder="Silahkan Masukkan Deskripsi">{{ $data->deskripsi }}</textarea>
                                                            
                                                            </div>
                                                            
                                                            <div class="form-group col-md-12">
                                                                <label class="text-muted">URL Video</label>
                                                                <input type="text" id="url_video" name="url_video"  class="form-control" required value="{{ $data->url_video }}">
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
@endsection
@push('addon-script')
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>

    <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'deskripsi' );
</script>
@endpush