@extends('dashboard.layouts.main')

@section('title')
    Respon | Show
@endsection

@section('container')
<div class="container container-fluid mb-3 d-flex justify-content-center">
    <h2 class="h3 text-uppercase">Data Laporan</h2>
</div>
<div class="container container-fluid">
    <table class="table table-responsive table-primary table-striped">
    <tbody>
    <tr>
        <th scope="row">File</th>
        <td>{{ $laporans[0]->file }}</td>
    </tr>
    </tbody>
    </table>
</div>
<div class="container container-fluid d-flex justify-content-end">
    <a href="/pegawai" class="btn btn-danger">Back</a>
</div>

@endsection
