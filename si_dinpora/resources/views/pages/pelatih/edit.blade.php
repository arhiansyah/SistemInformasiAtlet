@extends('template.app')
@section('sidebar')
@include('template.sidebar')
@endsection

@section('content')
<!-- Content - Header -->
<section class="home-section">
    <div class="text">{{ $data['module']['name'] }}</div>
</section>
<!-- /.content-header -->
<!-- Main content -->
<section class="content mt-4" style="margin-left: 6%;">
    <div class="container-fluid">
        <!-- Main row -->
        <!-- /.row (main row) -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Data {{$data['module']['name']}}</h4>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <form class="form-horizontal" action="/update/pelatih/{{$pelatihs->id}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-5">
                                        <input type="text" value="{{old('nama') ?? $pelatihs->nama}}"
                                            class="form-control" name="nama" placeholder="masukkan nama lengkap">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Instansi</label>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <select class="form-control" name="instansi_id">
                                                <option value="0" selected disabled>Pilih Instansi</option>
                                                @foreach($instansis as $instansi)
                                                <option value="{{$instansi->id}}"
                                                    {{$instansi->id == $pelatihs->instansi_id ? 'selected' : ''}}>
                                                    {{$instansi->instansi}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Kejuaraan</label>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <select name="lomba_id" class="form-control">
                                                <option value="0" disabled="true" selected="true">-Kejuaraan-</option>
                                                @foreach($lombas as $l)
                                                <option value="{{$l->id}}"
                                                    {{$l->id == $pelatihs->lomba_id ? 'selected' : ''}}>
                                                    {{$l->nama_lomba}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Jenjang
                                        Pendidikan</label>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <select name="jenjang_id" class="form-control">
                                                <option value="0" disabled="true" selected="true">-Sekolah-</option>
                                                @foreach($jenjangs as $j)
                                                <option value="{{$j->id}}"
                                                    {{$j->id == $pelatihs->jenjang_id ? 'selected' : ''}}>
                                                    {{$j->jenjang}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Cabang Olahraga</label>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <select name="cabor_id" class="form-control">
                                                <option value="0" disabled="true" selected="true">-Cabor-</option>
                                                @foreach($cabors as $c)
                                                <option value="{{$c->id}}"
                                                    {{$c->id == $pelatihs->cabor_id ? 'selected' : ''}}>
                                                    {{$c->cabor}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" id="btn-submit" class="btn-save float-right"
                                    style="margin-left: 2%;">
                                    <span class="button__icon" style="margin-left: 2px;">
                                        <img src="{{url('')}}/asset/img/icon/Paper Download.svg" alt="">
                                    </span>
                                    <span class="button__text">Simpan</span>
                                </button>
                                <button type="submit" class="btn-cancel float-right">
                                    <span class="button__icon" style="margin-left: 2px;">
                                        <img src="{{url('')}}/asset/img/icon/Paper Fail.svg" alt="">
                                    </span>
                                    <span class="button__text">Cancel</span>
                                </button>
                            </div>
                            <!-- /.card-footer -->
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection