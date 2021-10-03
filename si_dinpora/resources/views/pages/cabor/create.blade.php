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
                        <h4>Tambah Data {{$data['module']['name']}}</h4>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <form class="form-horizontal" action="/cabor-store" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Cabang Olahraga</label>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <select name="cabor_id"
                                                class="form-control @error('cabor_id') is-invalid @enderror">
                                                <option value="0" disabled="true" selected="true">-Cabor-</option>
                                                @foreach($cabors as $c)
                                                <option value="{{$c->id}}"
                                                    {{$c->id == old('cabor_id') ? 'selected' : ''}}>
                                                    {{$c->cabor}}</option>
                                                @endforeach
                                            </select>
                                            @error('cabor_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <button type="submit" id="btn-submit" class="btn-save" data-bs-toggle="modal"
                                            data-bs-target="#tambahCaborModal" data-bs-whatever="@mdo">
                                            <span class="button__text">Tambah Cabor</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Kelas Cabor</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control @error('kelas') is-invalid @enderror"
                                            name="kelas" placeholder="masukkan kelas cabor" value="{{old('kelas')}}">
                                        @error('kelas')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
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
    <!-- Modal start -->
    <div class="modal fade" id="tambahCaborModal" tabindex="-1" aria-labelledby="tambahCaborModalLabel"
        aria-hidden="true">
        <form action="/caborModal-store" method="POST">
            @csrf
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahCaborModalLabel" style="font-family: Lato; font-weight: bold">
                            Tambah Cabang Olahraga</h5>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                            aria-label="Close">X</button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label" style="font-family: Lato;">Cabang
                                Olahraga</label>
                            <input type="text" class="form-control" name="cabor" id="cabor"
                                placeholder="Masukkan Cabang Olahraga">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="btn-submit" class="btn-save" data-bs-toggle="modal"
                            data-bs-target="#tambahCaborModal" data-bs-whatever="@mdo">
                            <span class="button__text">Add Data</span>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- Modal End -->
</section>
<!-- /.content -->
@endsection