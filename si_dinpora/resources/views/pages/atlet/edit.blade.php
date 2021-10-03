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
                        <h4>Edit Data</h4>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <form class="form-horizontal" action="/update-atlet/{{$atlets->id}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Kejuaraan</label>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <select name="lomba_id" class="form-control">
                                                <option value="0" disabled="true" selected="true">-Kejuaraan-</option>
                                                @foreach($kejuaraan as $lomba)
                                                <option value="{{$lomba->id}}"
                                                    {{$lomba->id == $atlets->lomba_id ? 'selected' : ''}}>
                                                    {{$lomba->nama}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-5">
                                        <input type="text" value="{{old('nama') ?? $atlets->nama}}" class="form-control"
                                            name="nama" placeholder="masukkan nama lengkap">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Jenjang
                                        Pendidikan</label>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <select name="jenjang_id" data-width="100%"
                                                class="sekolahCategory form-control">
                                                <option value="0" disabled="true" selected="true">-Jenjang Pendidikan-
                                                </option>
                                                @foreach($jenjangs as $j)
                                                <option value="{{$j->id}}"
                                                    {{$j->id == $atlets->sekolah->jenjang_id ? 'selected' : ''}}>
                                                    {{$j->jenjang}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <label for="inputPassword3" class="col-sm-2 col-form-label"
                                        style="margin-right: -10%; margin-left: 5%;">Sekolah</label>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <select name="sekolah_id" data-width="100%" id="sekolahName_id"
                                                class="sekolahName form-control">
                                                <option value="{{$atlets->sekolah_id}}" disabled="true" selected="true">
                                                    {{$atlets->sekolah->sekolah}}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Cabang
                                        Olahraga</label>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <select name="cabor_id" class="caborCategory form-control">
                                                <option value="0" disabled="true" selected="true">-Cabang Olahraga-
                                                </option>
                                                @foreach($cabors as $c)
                                                <option value="{{$c->id}}"
                                                    {{$c->id == $atlets->cabor_id ? 'selected' : ''}}> {{ $c->cabor }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <label for="inputPassword3" class="col-sm-2 col-form-label"
                                        style="margin-right: -10%; margin-left: 3%;">Kelas
                                        Cabor</label>
                                    <div class="col-sm-3">
                                        <div class="form-group" style="padding-left: 20px;">
                                            <select name="kelas_cabor_id" class="kelas_caborName form-control">
                                                <option value="{{$atlets->kelas_cabor_id}}" disabled="true"
                                                    selected="true">{{$atlets->kelas_cabor->kelas}}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Tahun</label>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <select name="tahun_id" class="form-control">
                                                @foreach($tahuns as $tahun)
                                                <option value="{{$tahun->id}}"
                                                    {{$tahun->id == $atlets->tahun_id ? 'selected' : ''}}>
                                                    {{$tahun->tahun}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Prestasi</label>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <select name="prestasi_id" class="form-control">
                                                @foreach($prestasis as $prestasi)
                                                <option value="{{$prestasi->id}}"
                                                    {{$prestasi->id == $atlets->prestasi_id ? 'selected' : ''}}>
                                                    {{$prestasi->prestasi}}</option>
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