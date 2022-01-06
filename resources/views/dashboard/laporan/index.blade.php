
@extends('dashboard.layouts.main')

@section('title')
    Laporan | Index
@endsection

@section('container')
    @if(session('success'))
        <div class="alert alert-success container container-fluid" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="container container-fluid d-flex justify-content-beetwen">
        <a href="/laporan/create" class="btn btn-success mb-3 me-lg-3"><i class="fas fa-plus-square"></i></a>
    </div>
        <div class="container container-fluid">
            <table class="table table-responsive table-primary table-striped" id="myTable">
                <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Rt</th>
                    <th scope="col">Tujuan Pengaduan</th>
                    <th scope="col">Total Anggaran</th>
                    <th scope="col">Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($laporans as $laporan)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $laporan->masyarakat->nama }}</td>
                    <td>{{ $laporan->rt->nomor }}</td>
                    <td>{{ $laporan->tujuan }}</td>
                    <td>{{ $laporan->total }}</td>
                    <td>
                        <a href="/laporan/{{ $laporan->id }}/edit" class="btn btn-warning"><i class="fas fa-table"></i></a>|
                        <form action="/laporan/{{ $laporan->id }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger border-0" onclick="confirm('Are you sure?')"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    @push('scripts')
        <script>
        $(function() {
            $('#laporan-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('laporan-data') !!}',
                columns: [
                    { data: 'masyarakat', name: 'masyarakat' },
                    { data: 'rt', name: 'rt' },
                    { data: 'tujuan', name: 'tujuan' },
                    { data: 'anggaran', name: 'anggaran' },
                    { data: 'rincian', name: 'rincian' },
                    { data: 'total', name: 'total' },
                    { data: 'file', name: 'file' },
                ]
            });
        });
        </script>
        @endpush
@endsection
