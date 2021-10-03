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
                        <div class="input-group mt-3 mb-">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-lg-2" id="card-head3">
                                        <a href="#">
                                            <button type="button" class="export-btn">
                                                <span class="button__text">Export</span>
                                                <span class="button__icon">
                                                    <ion-icon name="arrow-up"></ion-icon>
                                                </span>
                                            </button>
                                        </a>
                                    </div>
                                    <div id="card-head" class="col-lg-2" style="margin-left: 50%;">
                                        <a href="/create-pelatih">
                                            <button type="button" class="btn-add">
                                                <span class="button__icon">
                                                    <ion-icon name="add-circle-outline"></ion-icon>
                                                </span>
                                                <span class="button__text">Tambah Data</span>
                                            </button>
                                        </a>
                                    </div>
                                    <div id="card-head2" class="col-lg-2">
                                        <button id="filter-btn" onclick="showHide()" type="button" class="btn-filter">
                                            <span id="button__icon">
                                                <ion-icon name="filter-outline"></ion-icon>
                                            </span>
                                            <span id="button__text">Filter</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="filter" class="row" style="background: rgb(169, 197, 48, 0.1);">
                        <div class="col-md-12 mt-4">
                            <div class="row">
                                <div class="col-sm-2" style="margin-left: 32%;">
                                    <div class="form-group">
                                        <select class="form-control filter" id="Lomba-filter">
                                            <option value="default" selected disabled>-Kejuaraan-</option>
                                            @foreach($lombas as $l)
                                            <option value="{{$l->id}}">{{ $l->nama_lomba  }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <select class="form-control filter" id="Instansi-filter">
                                            <option value="default" selected disabled>-Instansi-</option>
                                            @foreach($instansis as $instansi)
                                            <option value="{{$instansi->id}}"> {{ $instansi->instansi  }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <select class="form-control filter" id="Jenjang-filter">
                                            <option value="0" selected disabled>-Jenjang Pend-</option>
                                            @foreach($jenjangs as $j)
                                            <option value="{{$j->id}}"> {{ $j->jenjang }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <select id="Cabor-filter" class="form-control filter">
                                            <option value="default" selected disabled>Cabor</option>
                                            @foreach($cabors as $c)
                                            <option value="{{ $c->id }}"> {{ $c->cabor  }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                        <table id="myTable" class="table table-hover text-nowrap">
                            <thead>
                                <tr
                                    style="background-color: #238896; color: white; font-family: 'Lato', sans-serif; font-size: 1rem;">
                                    <th width="20px">No</th>
                                    <th width="50px">Nama</th>
                                    <th width="50px">Instansi</th>
                                    <th width="50px">Tingkat Kejuaraan</th>
                                    <th width="50px">Jenis Perlombaan</th>
                                    <th width="50px">Cabor</th>
                                    <th width="100px">Action</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
@section('js')
<script>
$(document).ready(function() {

    let lomba_nama = $("Lomba-filter").val()
    let instansi_nama = $("Instansi-filter").val()
    let jenjang_nama = $("Jenjang-filter").val()
    let cabor_nama = $("Cabor-filter").val()
    const table = $('#myTable').DataTable({
        processing: true,
        serverSide: true,
        pageLength: 5,
        lengthMenu: [
            [5, 10, 25, 50, 100, 500],
            [5, 10, 25, 50, 100, 'all'],
        ],
        bLengthChange: true,
        bFilter: true,
        bInfo: true,
        ajax: {
            url: "{{url('/pelatih_data/{$id}')}}",
            type: "POST",
            data: function(d) {
                d._token = "{{csrf_token()}}",
                    d.lomba_nama = $("#Lomba-filter").val(),
                    d.instansi_nama = $("#Instansi-filter").val(),
                    d.jenjang_nama = $("#Jenjang-filter").val(),
                    d.cabor_nama = $("#Cabor-filter").val()
            }
        },
        columns: [{
                "render": function(data, type, row, meta) {
                    return row.id
                }
            },
            {
                "render": function(data, type, row, meta) {
                    return row.nama
                }
            },
            {
                "render": function(data, type, row, meta) {
                    return row.instansi
                }
            },
            {
                "render": function(data, type, row, meta) {
                    return row.nama_lomba
                }
            },
            {
                "render": function(data, type, row, meta) {
                    return row.jenjang
                }
            },
            {
                "render": function(data, type, row, meta) {
                    return row.cabor
                }
            },
            {
                "render": function(data, type, row, meta) {
                    let edit = `<div style="margin-top: -5px; display:inline;">
                        <a href="/pelatih-edit/${row.id}"><img src="{{ url('')  }}/asset/img/icon/aksi/Edit.svg">
                        </a>
                    </div>`;
                    return edit +=
                        `<form style="width: 5px; height: 5px; margin-top: -35px;"
                            action="/delete-pelatih/${row.id}" method="POST">
                            <button type="submit"
                                style="margin-top: -5px; margin-left: 40px; border: none;"><img
                                src="{{ url('') }}/asset/img/icon/aksi/Delete.svg">
                            </button>
                            @method('delete')
                            @csrf 
                        </form>
                        
                        `;
                }
            },
        ]
    });
    $(".filter").on('change', function() {
        table.ajax.reload(null, false)
    });
});
</script>
@endsection