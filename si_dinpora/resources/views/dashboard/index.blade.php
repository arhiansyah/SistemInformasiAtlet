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
<section class="content mt-3" style="margin-left: 7%;">
    <div class="container-fluid">
        @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
        @endif
        <!-- Main row -->
        <div class="row">
            <div class="col-sm-7">
                <div class="info-box">
                    <a href="{{ route('pages.atlet.index') }}"
                        style="text-decoration: none; color: #000; margin-right: 2%;">
                        <div class="col-sm-3" id="card-btn">
                            <div class="card mt-4">
                                <div class="card-body">
                                    <img src="{{ url('') }}/asset/img/icon/sportsman 1.svg" alt="">
                                    <h2>Atlet</h2>
                                </div>
                            </div>
                        </div>
                    </a>
                    <div class="col-sm-3" id="card-btn">
                        <a href="{{ route('pages.pelatih.index') }}"
                            style="text-decoration: none; color: #000; margin-right: 2%;">
                            <div class="card mt-4">
                                <div class="card-body">
                                    <img src="{{ url('') }}/asset/img/icon/Group.svg" alt="">
                                    <h2>Pelatih</h2>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-3" id="card-btn">
                        <a href="{{ route('pages.cabor.index') }}" style="text-decoration: none; color: #000;">
                            <div class="card mt-4">
                                <div class="card-body">
                                    <img src="{{ url('') }}/asset/img/icon/sports 2.svg" alt="">
                                    <h2>Cabor</h2>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-3" id="card-btn">
                        <div class="card mt-4">
                            <div class="card-body">
                                <img src="{{ url('') }}/asset/img/icon/badge 2.svg" alt="">
                                <h2>Prestasi</h2>
                            </div>
                        </div>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
                <div class="info-box">
                    <div class="col-sm-3 mt-2 p-2">
                        <div class="card-title">
                            <img src="{{ url('') }}/asset/img/icon/badge-list/sportsman 1 (1).svg"
                                style="margin-left: 5%; margin-top: 20%;">
                        </div>
                        <p class="card-title" style="margin-left: 17%;">Atlet</p>
                        <h1>202</h1>
                    </div>
                    <div class="col-sm-3 mt-2 p-2" style="margin-left: 10%;">
                        <div class="card-title">
                            <img src="{{ url('') }}/asset/img/icon/badge-list/strategy 4.svg"
                                style="margin-left: 5%; margin-top: 20%;">
                        </div>
                        <p class="card-title" style="margin-left: 15%;">Pelatih</p>
                        <h1>53</h1>
                    </div>
                    <div class="col-sm-3 mt-2 p-3" style="margin-left: 10%;">
                        <div class="card-title">
                            <img src="{{ url('') }}/asset/img/icon/badge-list/sports 3.svg"
                                style="margin-left: 2%; margin-top: 10%;">
                        </div>
                        <p class="card-title" style="margin-left: 5%; margin-top: -7%;">Cabor</p>
                        <h1>28</h1>
                    </div>
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-5">
                <div class="card" style="background-color: #238896;">
                    <div id="label-prestasi" class="card-body">
                        <h4 class="card-title">105</h4>
                        <img src="{{ url('') }}/asset/img/icon/badge 2.svg"
                            style="width: 25%; height: 90px; margin-left: 45%; margin-top: -1px;" alt="">
                        <h3>Total Prestasi</h3>
                    </div>
                    <div class="card-body" style="background-color: white; margin-top: 33px;">
                        <div class="jumlah-prestasi">
                            <p class="list-item card-title" style="margin-left: 10px; color: black;"><img
                                    src="{{ url('') }}/asset/img/icon/badge-rank/badge 2 (1).svg"
                                    style="margin-right: 15px;">Emas</p>
                            <p>63</p>
                            <p class="list-item card-title" style="margin-left: 10px; color: black;"><img
                                    src="{{ url('') }}/asset/img/icon/badge-rank/badge 3.svg"
                                    style="margin-right: 15px;">Perak</p>
                            <p>34</p>
                            <p class="list-item card-title" style="margin-left: 10px; color: black;"><img
                                    src="{{ url('') }}/asset/img/icon/badge-rank/badge 4.svg"
                                    style="margin-right: 15px;">Perunggu</p>
                            <p>8</p>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->

        </div>
        <!-- /.row (main row) -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="input-group mt-3">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <button class="btn btn-outline-secondary" type="button"
                                                    id="button-addon1"><i class="fas fa-search"></i></button>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Cari disini ...">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option value="default">Tahun</option>
                                                <option>2018</option>
                                                <option>2019</option>
                                                <option>2020</option>
                                                <option>2021</option>
                                                <option>2025</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option value="default">Kejuaraan</option>
                                                <option>PEPDA</option>
                                                <option>POPDA</option>
                                                <option>KARSIDENAN</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option value="default">Jenjang Pend</option>
                                                <option>SD</option>
                                                <option>SMP/MTS</option>
                                                <option>SMA/SMK</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option value="default">Cabor</option>
                                                <option>ATLETIK</option>
                                                <option>BOLA VOLI</option>
                                                <option>PENCAK SILAT</option>
                                                <option>TENIS MEJA</option>
                                                <option>BULU TANGKIS</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option value="default">Prestasi</option>
                                                <option>Juara 1</option>
                                                <option>Juara 2</option>
                                                <option>Juara 3</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr
                                    style="background-color: #238896; color: white; font-family: 'Lato', sans-serif; font-size: 1rem;">
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Sekolah</th>
                                    <th>Cabor</th>
                                    <th>Kelas</th>
                                    <th>Tahun</th>
                                    <th>Prestasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Linda Walter DVM</td>
                                    <td>SMAN 1 Banyumas</td>
                                    <td>Atletik</td>
                                    <td>Lari 100M</td>
                                    <td>2020</td>
                                    <td>Juara 2</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Doug Oberbrunner V</td>
                                    <td>SMPN 2 Purwokerto</td>
                                    <td>Bola Voli</td>
                                    <td>Voli Putra</td>
                                    <td>2018</td>
                                    <td>Juara 1</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>John Doe</td>
                                    <td>SDN 1 Purwokerto Timur</td>
                                    <td>Atletik</td>
                                    <td>Lari 100M</td>
                                    <td>2020</td>
                                    <td>Juara 1</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>John Doe</td>
                                    <td>SDN 1 Purwokerto Timur</td>
                                    <td>Atletik</td>
                                    <td>Lari 100M</td>
                                    <td>2020</td>
                                    <td>Juara 1</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>John Doe</td>
                                    <td>SDN 1 Purwokerto Timur</td>
                                    <td>Atletik</td>
                                    <td>Lari 100M</td>
                                    <td>2020</td>
                                    <td>Juara 1</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="row mt-3">
                            <div class="col-6" style="margin-left: 1%;">
                                <label style="font-size: medium; font-family: 'Lato', sans-serif;">Menampilkan
                                    <select size="1" name="tDisplay_length" aria-controls="tDisplay">
                                        <option value="5">5</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                        <option value="-1">All</option>
                                    </select>
                                    dari 215 data
                                </label>
                            </div>
                            <div class="col-3" style="margin-left: 245px;">
                                <a href=""> Selengkapnya buka menu Atlet <i class="fas fa-arrow-right    "></i></a>
                            </div>
                        </div>
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