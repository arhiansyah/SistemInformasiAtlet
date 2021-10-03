@extends('template.app')
@section('sidebar')
@include('template.sidebar')
@endsection
@section('css')
@stop
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
                        <div class="row">Edit Profil</div>
                        <!-- /.card-body -->
                    </div>
                    <div class="card-body">
                        <form action="/action">
                            <div class="d-flex align-items-center ">
                                <div class="col-md-2">
                                    <img class="rounded-circle" width="150px"
                                        src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-2 mt-1"><label for="profil">Username:</label></div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="username"
                                                placeholder="Username" value="admin">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2 mt-3"><label for="profil">Password:</label></div>
                                        <div class="col-md-4 mt-2"><input type="password" class="form-control"
                                                placeholder="password" name="password" value="123">
                                        </div>
                                    </div>

                                    <div class="row justify-content-end mt-2">
                                        <div class="col-md-2">
                                            <button type="button" class="btn-cancel" style="width: 100%;">
                                                <span class="button__text">Batal</span></button>
                                        </div>

                                        <div class="col-md-2">
                                            <button type="button" class="btn-save" style="width: 100%;">
                                                <span class="button__text">Simpan</span>
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div><!-- /.card -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

<section class="content mt-1" style="margin-left: 6%;">
    <div class="container-fluid">
        <!-- Main row -->
        <!-- /.row (main row) -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">Kelola Akun Pengguna</div>
                    </div>
                    <div class="row justify-content-end mt-4">
                        <div class="col-md-2 mr-4 mb-4">
                            <button type="button" class="btn-save" style="width: 100%;">
                                <span class="button__icon">
                                    <ion-icon name="add-circle-outline"></ion-icon>
                                </span>
                                <span class="button__text">Tambah Pengguna</span>
                            </button>
                        </div>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr
                                    style="background-color: #238896; color: white; font-family: 'Lato', sans-serif; font-size: 1.4rem;">
                                    <th width="80px">No</th>
                                    <th width="200px">Username</th>
                                    <th>Password</th>
                                    <th width="50px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($admins as $admin)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$admin->username}}</td>
                                    <td><i class="fa fa-key" aria-hidden="true"></i>{{$admin->password }}</td>
                                    <td><a href=""><img src="{{ url('') }}/asset/img/icon/aksi/Edit.svg"
                                                style="margin-right: 5%;"><img
                                                src="{{ url('') }}/asset/img/icon/aksi/Delete.svg"></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-12 mt-4">
                                <div class="row">
                                    <div class="col-6" style="margin-left: 3%;">
                                        <label
                                            style="font-size: 15px; font-weight: 100; font-family: 'Lato', sans-serif;">Menampilkan
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
                                    <!-- Pagination -->
                                    <div class="col-4 d-flex justify-content-end">
                                        <nav aria-label="Page navigation example">
                                            <ul class="pagination">
                                                <li class="page-item">
                                                    <a class="page-link" href="#" aria-label="Previous">
                                                        <span aria-hidden="true">&laquo;</span>
                                                    </a>
                                                </li>
                                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                <li class="page-item">
                                                    <a class="page-link" href="#" aria-label="Next">
                                                        <span aria-hidden="true">&raquo;</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
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

@stop