@extends('layouts.admin')
@section('title')
    Edit Guru
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
                                <h2 class="text-md text-highlight">Edit Guru</h2>
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
                                            <strong>Data - data Guru</strong>
                                        </div>
                                        <div class="card-body">
                                           <form action="{{ route('update-guru',$data->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label class="text-muted">Nama</label>
                                                        <input  type="text" id="name" name="name" value="{{ $data->name }}"  class="form-control" required>
                                                    </div>
                                                    
                                                    <div class="form-group col-md-6">
                                                        <label class="text-muted">NUPTK</label>
                                                        <input type="text" id="nuptk" name="nuptk" value="{{ $data->nuptk }}"  class="form-control" required>
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label class="text-muted">Tanggal Lahir</label>
                                                        <input type="date" id="date_of_birth" name="date_of_birth"  value="{{ $data->date_of_birth }}"  class="form-control" required>
                                                    </div>
                                                
                                                    <div class="form-group col-md-6">
                                                        <label class="text-muted">Jenis Klamin</label>
                                                        <select class="form-control" name="gender" id="gender" required>
                                                            <option  value="{{ $data->gender }}">{{ $data->gender }}</option>
                                                            <option value="PRIA" >Pria</option>
                                                            <option value="Wanita" >Wanita</option>


                                                        </select>
                                                    </div>

                                                    
                                                    <div class="form-group col-md-6">
                                                        <label class="text-muted">Role</label>
                                                        <input type="text" id="role" name="role" value="GURU" placeholder="GURU" readonly required class="form-control">
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label class="text-muted">Sekolah</label>
                                                        <select class="form-control" name="sekolah_id" id="sekolah_id" required>
                                                                    <option value="{{ $sekolahSekarang->id }}">{{ $sekolahSekarang->nama_sekolah }}</option>

                                                                @foreach ($sekolah as $item )
                                                                    <option  value="{{ $item->id }}">{{ $item->nama_sekolah }}</option>
                                                                @endforeach
                                                        </select>
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
