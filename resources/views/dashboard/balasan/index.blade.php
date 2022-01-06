
@extends('dashboard.layouts.main')

@section('title')
    Respon | Index
@endsection

@section('container')
    @if(session('success'))
        <div class="alert alert-success container container-fluid" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="container container-fluid d-flex justify-content-beetwen">
        <a href="/balasan/create" class="btn btn-success mb-3 me-lg-3"><i class="fas fa-plus-square"></i></a>
    </div>
        <div class="container container-fluid">
            <table class="table table-responsive table-primary table-striped" id="myTable">
                <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($balasans as $balasan)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $balasan->laporan->masyarakat->nama }}</td>
                    <td>{{ $balasan->status->status }}</td>
                    <td>
                        <a href="/balasan/{{ $balasan->id }}" class="btn btn-info"><i class="fas fa-eye"></i></a>|
                        <a href="/balasan/{{ $balasan->id }}/edit" class="btn btn-warning"><i class="fas fa-table"></i></a>|
                        <form action="/balasan/{{ $balasan->id }}" method="post" class="d-inline">
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
            $('#balasan-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('balasan-data') !!}',
                columns: [
                    { data: 'status', name: 'status' },
                    { data: 'laporan', name: 'laporan' },
                ]
            });
        });
        </script>
        @endpush
@endsection
