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
                        <div class="row">Tambah Data</div>
                        <!-- /.card-body -->
                    </div>
                    <div class="card-body">
                        <form action="/action">
                            <div class="row">
                                <div class="col-md-2"><label for="cars">Cabang Olahraga:</label></div>
                                <div class="col-md-2"><select class="form-control" name="cabor" id="cabor">
                                        <option value="-">Pilih cabang olahraga</option>
                                        <option value="Atletik">Atletik</option>
                                        <option value="Panahan">Panahan</option>
                                        <option value="Bola Voli">Bola Voli</option>
                                    </select>
                                </div>
                                <div class="col-md-8">
                                    <button type="button" id="btn-submit" class="btn-save" data-bs-toggle="modal"
                                        data-bs-target="#tambahCaborModal" data-bs-whatever="@mdo">
                                        <span class="button__text">Tambah Cabor</span>
                                    </button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2 mt-4"><label for="cars">Kelas:</label></div>
                                <div class="col-md-6 mt-4">
                                    <input type="text" class="form-control" placeholder="Masukkan kelas cabor">
                                </div>
                            </div>
                        </form>
                        <div class="row justify-content-end mt-5">
                            <div class="col-md-2">
                                <button type="submit" class="btn-cancel float-right" style="margin-right: -85px;">
                                    <span class="button__icon" style="margin-left: 2px;">
                                        <img src="{{url('')}}/asset/img/icon/Paper Fail.svg" alt="">
                                    </span>
                                    <span class="button__text">Cancel</span>
                                </button>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" id="btn-submit" class="btn-save float-right">
                                    <span class="button__icon" style="margin-left: 2px;">
                                        <img src="{{url('')}}/asset/img/icon/Paper Download.svg" alt="">
                                    </span>
                                    <span class="button__text">Simpan</span>
                                </button>
                            </div>
                        </div>
                    </div>



                    <!-- /.card -->
                </div>
            </div>
        </div><!-- /.container-fluid -->

        <div class="modal fade" id="tambahCaborModal" tabindex="-1" aria-labelledby="tambahCaborModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahCaborModalLabel" style="font-family: Lato; font-weight: bold">
                            Tambah Cabang Olahraga</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label" style="font-family: Lato;">Cabang
                                    Olahraga</label>
                                <input type="text" class="form-control" id="cabor"
                                    placeholder="Masukkan Cabang Olahraga">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn-tambah">Tambah</button>
                    </div>
                </div>
            </div>
        </div>
        <!--Modal-->
</section>
<!-- /.content -->
@endsection