@extends('template.app')
@section('sidebar')
@include('template.sidebar')
@endsection

@section('content')

<div class="container mt-5">
    <table id="myTable" class="table table-hover text-nowrap">
        <thead>
            <tr style="background-color: #238896; color: white; font-family: 'Lato', sans-serif; font-size: 1.4rem;">
                <th width="80px">No</th>
                <th width="300px">Cabor</th>
                <th width="100px">Kelas</th>
                <th width="150px">Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

@stop