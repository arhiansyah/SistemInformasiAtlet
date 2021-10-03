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
                        <div class="input-group mt-3">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-2">
                                        <a href="#">
                                            <button type="button" class="export-btn">
                                                <span class="button__text">Export</span>
                                                <span class="button__icon">
                                                    <ion-icon name="arrow-up"></ion-icon>
                                                </span>

                                            </button>
                                        </a>

                                        <button type="button" id="button-delete-all" disabled class="delete-btn"
                                            onclick="deleteTerpilih()">

                                            <span class="button__text"><i class="fas fa-trash    "
                                                    style="margin-right: 5px; margin-left: 5px;"></i>
                                                Delete</span>
                                        </button>

                                    </div>
                                    <div id="card-head" class="col-md-2">
                                        <a href="/create-atlet">
                                            <button type="button" class="btn-add">
                                                <span class="button__icon">
                                                    <ion-icon name="add-circle-outline"></ion-icon>
                                                </span>
                                                <span class="button__text">Tambah Data</span>
                                            </button>
                                        </a>
                                    </div>
                                    <div id="card-head2" class="col-md-2">
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
                                <div class="col-sm-2" style="margin-left: 15%;">
                                    <div class="form-group">
                                        <select class="form-control filter" id="Tahun-filter">
                                            <option value="0" selected disabled>Tahun</option>
                                            @foreach($tahuns as $thn)
                                            <option value="{{$thn->id}}">{{ $thn->tahun }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <select class="form-control filter" id="Lomba-filter">
                                            <option value="0" selected disabled>Kejuaraan</option>
                                            @foreach($lomba as $l)
                                            <option value="{{$l->id}}">{{ $l->nama_lomba }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <select class="form-control filter" id="Jenjang-filter">
                                            <option value="0" selected disabled>Jenjang Pend</option>
                                            @foreach($jenjangs as $j)
                                            <option value="{{$j->id}}">{{$j->jenjang}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <select class="form-control filter" id="Prestasi-filter">
                                            <option value="0" selected disabled>Prestasi</option>
                                            @foreach($prestasi as $prs)
                                            <option value="{{$prs->id}}">{{ $prs->prestasi }}</option>
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
                        <table class="table table-hover text-nowrap" id="myTable">
                            <thead>
                                <tr
                                    style="background-color: #238896; color: white; font-family: 'Lato', sans-serif; font-size: 1.4rem;">
                                    <th width="10px">
                                        <input type="checkbox" id="head-cb">
                                    </th>
                                    <th width="30px">No</th>
                                    <th width="70px">Nama</th>
                                    <th width="70px">Sekolah</th>
                                    <th width="70px">Cabor</th>
                                    <th width="70px">Kelas</th>
                                    <th width="70px">Tahun</th>
                                    <th width="70px">Prestasi</th>
                                    <th width="80px">Action</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
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
@section('js')
<script>
$(document).ready(function() {

    let tahun_nama = $("Tahun-filter").val()
    let lomba_nama = $("Lomba-filter").val()
    let jenjang_nama = $("Jenjang-filter").val()
    let prestasi_nama = $("Prestasi-filter").val()
    let cabor_nama = $("Cabor-filter").val()
    let checking = 0;
    const table = $('#myTable').DataTable({
        processing: true,
        serverSide: true,
        pageLength: 5,
        lengthMenu: [
            [5, 10, 25, 50, 100, 500],
            [5, 10, 25, 50, 100, 'all'],
        ],
        order: [
            [0, "desc"]
        ],
        bLengthChange: true,
        bFilter: true,
        bInfo: true,
        ajax: {
            url: "{{url('/atlet_data/{$id}')}}",
            type: "POST",
            data: function(d) {
                d._token = "{{csrf_token()}}",
                    d.tahun_nama = $("#Tahun-filter").val(),
                    d.lomba_nama = $("#Lomba-filter").val(),
                    d.jenjang_nama = $("#Jenjang-filter").val(),
                    d.prestasi_nama = $("#Prestasi-filter").val(),
                    d.cabor_nama = $("#Cabor-filter").val()
            }
        },
        columns: [{

                "sortable": false,
                "render": function(data, type, row, meta) {
                    return `<input type="checkbox" name="ids" class="cb-child" value="${row.id}">`;
                }
            },
            {

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
                    return row.sekolah
                }
            },
            {

                "render": function(data, type, row, meta) {
                    return row.cabor
                }
            },
            {

                "render": function(data, type, row, meta) {
                    return row.kelas
                }
            },
            {

                "render": function(data, type, row, meta) {
                    return row.tahun
                }
            },
            {

                "sortable": false,
                "render": function(data, type, row, meta) {
                    return row.prestasi
                }
            },
            {

                "sortable": false,
                "render": function(data, type, row, meta) {
                    let edit = `<div style="margin-top: -5px; display:inline;">
                        <a href="/atlet-edit/${row.id}"><img src="{{ url('')  }}/asset/img/icon/aksi/Edit.svg">
                        </a>
                    </div>`;
                    return edit +=
                        `<form style="width: 5px; height: 5px; margin-top: -35px;"
                            action="/delete-atlet/${row.id}" method="POST">
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
    $("#head-cb").on('click', function() {
        let isChecked = $("#head-cb").prop('checked')
        $(".cb-child").prop('checked', isChecked)
        $("#button-delete-all").prop('disabled', !isChecked)
        // if (isChecked == true) {
        //     $("#button-delete-all").prop('disabled', false)
        // } else {
        //     $("#button-delete-all").prop('disabled', true)
        // }
    })

    $("#myTable tbody").on('click', '.cb-child', function() {
        if ($(this).prop('checked') != true) {
            $("#head-cb").prop('checked', false)
        }

        let semua_checkbox = $("#myTable tbody .cb-child:checked")
        let button_delete_status = (semua_checkbox.length > 0)
        $("#button-delete-all").prop('disabled', !button_delete_status)
    })
});

function deleteTerpilih() {
    let checkbox_terpilih = $("#myTable tbody .cb-child:checked")
    let semua_id = []
    $.each(checkbox_terpilih, function(index, elm) {
        semua_id.push(elm.value)
    })
    $.ajax({
        url: "{{url('/delete-atlet-selected/{$id}')}}",
        type: 'DELETE',
        data: {
            _token: "{{csrf_token()}}",
            ids: semua_id
        },
        success: function(response) {
            $.each(semua_id, function(key, val) {
                $("{semua.id}" + val).destroy().back();
            })

        }
    })
    // console.log("HAHAHA")
}
</script>
@endsection