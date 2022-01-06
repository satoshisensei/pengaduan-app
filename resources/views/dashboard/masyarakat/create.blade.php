@extends('dashboard.layouts.main')

@section('title')
    Laporan | Create
@endsection

@section('container')
    <div class="container container-fluid mb-3 d-flex justify-content-center">
        <h2 class="h3 text-uppercase">Create Data</h2>
    </div>
    <div class="container container-fluid d-flex justify-content-center">
        <div class="col-md-8 ">
            <div class="portlet light bordered">
                    <div class="form-body">
                        <form action="/masyarakat" method="post">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                        <div class="mb-3">
                            <label for="nip" class="form-label">Nik</label>
                            <input type="text" class="form-control @error('nik')
                                is-invalid
                            @enderror" id="nik" name="nik" placeholder="Masukan Nik..." required value="{{ old('nik') }}">
                            @error('nik')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control @error('alamat')
                                is-invalid
                            @enderror" id="alamat" name="alamat" placeholder="Masukan Alamat..." required value="{{ old('alamat') }}">
                            @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="rt_id" class="form-label">Rt</label>
                            <select class="form-select" name="rt_id">
                                @foreach($rts as $rt)
                                    @if(old('rt_id') == $rt->id)
                                        <option value="{{ $rt->id }}" selected>{{ $rt->nomor }}</option>
                                    @else
                                        <option value="{{ $rt->id }}">{{ $rt->nomor }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('rt_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-center">
                            <a href="{{ url()->previous() }}" class="btn btn-primary me-md-2">Kembali</a>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
