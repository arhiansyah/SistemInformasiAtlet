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
        <!-- Alert  -->
        @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @elseif(session()->has('danger'))
        <div class="alert alert-danger">
            {{ session('danger') }}
        </div>
        @endif
        <!-- <div class="container">
        </div> -->
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
                                        <a href="/create-cabor">
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
                                <div class="col-sm-2" style="margin-left: 80%;">
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
                        <table id="myTable" class="table table-hover text-wrap">
                            <thead>
                                <tr
                                    style="background-color: #238896; color: white; font-family: 'Lato', sans-serif; font-size: 1.4rem;">
                                    <th width="80px">No</th>
                                    <th width="300px">Cabor</th>
                                    <th width="100px">Kelas</th>
                                    <th width="100px">######</th>
                                </tr>
                            </thead>
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
@stop
@section('js')
<script>
$(document).ready(function() {

    let cabor_nama = $("Cabor-filter").val()
    const table = $('#myTable').DataTable({
        processing: true,
        serverSide: true,
        pageLength: 100,
        lengthMenu: [
            [5, 10, 25, 50, 100, -1],
            [5, 10, 25, 50, 100, 'all'],
        ],
        bLengthChange: true,
        bFilter: true,
        bInfo: true,
        ajax: {
            url: "{{url('/cabor_data/{$id}')}}",
            type: "POST",
            data: function(d) {
                d._token = "{{csrf_token()}}",
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
                    let edit = `<div style="margin-top: -5px; display:inline;">
                        <a href="/edit-cabor/${row.id}"><img src="{{ url('')  }}/asset/img/icon/aksi/Edit.svg">
                        </a>
                    </div>`;
                    return edit +=
                        `<form style="width: 10px; height: 10px; margin-top: -35px;"
                            action="/delete-cabor/${row.id}" method="POST">
                            <button type="submit"
                                style="margin-top: -5px; margin-left: 50px; border: none;"><img
                                src="{{ url('') }}/asset/img/icon/aksi/Delete.svg">
                            </button>
                            @method('delete')
                            @csrf 
                        </form>
                        
                        `;
                }
            },
            // {
            //     data: 'id',
            //     name: 'kelas_cabors.id'
            // },
            // {
            //     data: 'cabor',
            //     name: 'cabors.cabor'
            // },
            // {
            //     data: 'kelas',
            //     name: 'kelas_cabors.kelas'
            // },
            // {
            //     data: 'action',
            //     name: 'action'
            // }
        ]
    });
    $(".filter").on('change', function() {
        table.ajax.reload(null, false)
    });
});
</script>
@endsection