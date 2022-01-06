@extends('dashboard.layouts.main')

@section('title')
    Pengadu | Edit
@endsection

@section('container')
    <div class="container container-fluid mb-3 d-flex justify-content-center">
        <h2 class="h3 text-uppercase">Edit Data</h2>
    </div>
    <div class="container container-fluid d-flex justify-content-center">
        <div class="col-md-8 ">
            <div class="portlet light bordered">
                    <div class="form-body">
                        <form action="/laporan/{{ $laporans[0]->id }}" method="post" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                        <div class="mb-3">
                            <label for="masyarakat" class="form-label">Nama Pengadu</label>
                            <select class="form-select" name="masyarakat">
                                @foreach($masyarakats as $masyarakat)
                                    @if(old('masyarakat', $laporans[0]->masyarakat_id) == $masyarakat->id)
                                        <option value="{{ $masyarakat->id }}" selected>{{ $masyarakat->nama }}</option>
                                    @else
                                        <option value="{{ $masyarakat->id }}">{{ $masyarakat->nama }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('masyarakat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="rt_id" class="form-label">Rt</label>
                            <select class="form-select" name="rt_id">
                                @foreach($rts as $rt)
                                    @if(old('rt_id',$laporans[0]->rt_id) == $rt->id)
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
                        <div class="mb-3">
                            <label for="tujuan" class="form-label">Tujuan</label>
                            <input type="text" class="form-control @error('tujuan')
                                is-invalid
                            @enderror" id="tujuan" name="tujuan" placeholder="Masukan Tujuan Pengaduan..." autofocus required value="{{ old('tujuan',$laporans[0]->tujuan) }}">
                            @error('tujuan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="anggaran" class="form-label">Sumber Anggaran</label>
                            <input type="text" class="form-control @error('anggaran')
                                is-invalid
                            @enderror" id="anggaran" name="anggaran" placeholder="Masukan Anggaran..." autofocus required value="{{ old('anggaran',$laporans[0]->anggaran) }}">
                            @error('anggaran')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="rincian" class="form-label">Rincian Anggaran</label>
                            <input id="rincian" type="hidden" name="rincian" value="{{ old('rincian',$laporans[0]->rincian) }}">
                            <trix-editor input="rincian"></trix-editor>
                            @error('rincian')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="total" class="form-label">Total Anggaran</label>
                            <input type="text" class="form-control @error('total')
                                is-invalid
                            @enderror" id="total" name="total" placeholder="Masukan Total Anggaran..." autofocus required value="{{ old('total',$laporans[0]->total) }}">
                            @error('total')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="file" class="form-label">Berkas <sup>optional</sup></label>
                            <input type="file" name="file" id="file" class="form-control-file" value="{{ old('file',$laporans[0]->file) }}">
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
