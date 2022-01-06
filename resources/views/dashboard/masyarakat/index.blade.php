
@extends('dashboard.layouts.main')

@section('title')
    Pengadu | Index
@endsection

@section('container')
    @if(session('success'))
        <div class="alert alert-success container container-fluid" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="container container-fluid d-flex justify-content-beetwen">
        <a href="/masyarakat/create" class="btn btn-success mb-3 me-lg-3"><i class="fas fa-plus-square"></i></a>
    </div>
        <div class="container container-fluid">
            <table class="table table-responsive table-primary table-striped" id="myTable">
                <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Nik</th>
                    <th scope="col">Rt</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($masyarakats as $masyarakat)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $masyarakat->nama }}</td>
                    <td>{{ $masyarakat->nik }}</td>
                    <td>{{ $masyarakat->rt->nomor }}</td>
                    <td>{{ $masyarakat->alamat }}</td>
                    <td>
                        <a href="/masyarakat/{{ $masyarakat->id }}/edit" class="btn btn-warning"><i class="fas fa-table"></i></a>|
                        <form action="/masyarakat/{{ $masyarakat->id }}" method="post" class="d-inline">
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
            $('#masyarakat-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('masyarakat-data') !!}',
                columns: [
                    { data: 'nama', name: 'nama' },
                    { data: 'nik', name: 'nik' },
                    { data: 'rt', name: 'rt' },
                    { data: 'alamat', name: 'alamat' },
                ]
            });
        });
        </script>
        @endpush
@endsection
