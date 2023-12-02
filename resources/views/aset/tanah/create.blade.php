@extends('layouts.master')
@section('content')
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">Tambah Aset Tanah</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Beranda</a></li>
                    <li class="breadcrumb-item active">Tambah Aset Tanah</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="card-body">
                    <form action="{{ route('tanah.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="justify-center card-title">Data Tanah</h5>
                                <div class="form-group">
                                    <label>Status Tanah</label>
                                    @php
                                        // Simpan nilai status aset sebelumnya
                                        $oldStatusAset = old('id_status_aset', $status_aset[0]->id_status_aset);
                                    @endphp
                                    <select name="id_status_aset"
                                        class="form-select @error('status_aset') is-invalid @enderror" id="id_status_aset">
                                        @foreach ($status_aset as $row)
                                            <option value="{{ $row->id_status_aset }}"
                                                {{ $row->id_status_aset == $oldStatusAset ? 'selected' : '' }}>
                                                {{ $row->status_aset }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('status_aset')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Kode Tanah</label>
                                    <input type="text" class="form-control @error('kode_aset') is-invalid @enderror"
                                        name="kode_aset" value="{{ $kode_tanah }}" readonly>
                                    @error('kode_aset')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Inventarisir</label>
                                    <input type="date"
                                        class="form-control @error('tanggal_inventarisir') is-invalid @enderror"
                                        name="tanggal_inventarisir" value="{{ \Carbon\Carbon::now()->toDateString() }}"
                                        value="{{ old('tanggal_inventarisir') }}" autofocus>
                                    @error('tanggal_inventarisir')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                        name="nama" value="{{ old('nama') }}" autocomplete="off" autofocus>
                                    @error('nama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Luas (m<sup>2</sup>)</label>
                                    <input type="number" class="form-control @error('luas') is-invalid @enderror"
                                        name="luas" value="{{ old('luas') }}" autocomplete="off" autofocus>
                                    @error('luas')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Letak Tanah</label>
                                    <input type="text" class="form-control @error('letak_tanah') is-invalid @enderror"
                                        name="letak_tanah" value="{{ old('letak_tanah') }}" autocomplete="off" autofocus>
                                    @error('letak_tanah')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h5 class="card-title">Sertifikat dan Kegunaan</h5>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Hak</label>
                                            <select class="form-control form-select @error('hak') is-invalid @enderror"
                                                name="hak" autocomplete="off" autofocus>
                                                <option value="Hak Pakai" @if (old('hak') == 'Hak Pakai') selected @endif>
                                                    Hak Pakai</option>
                                                <option value="Hak Milik" @if (old('hak') == 'Hak Milik') selected @endif>
                                                    Hak Milik</option>
                                                <option value="Hak Guna Usaha"
                                                    @if (old('hak') == 'Hak Guna Usaha') selected @endif>Hak Guna Usaha
                                                </option>
                                                <option value="Hak Guna Bangunan"
                                                    @if (old('hak') == 'Hak Guna Bangunan') selected @endif>Hak Guna Bangunan
                                                </option>
                                                <option value="Hak Sewa" @if (old('hak') == 'Hak Sewa') selected @endif>
                                                    Hak Sewa</option>
                                            </select>
                                            @error('hak')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tanggal Sertifikat</label>
                                            <input type="date" name="tanggal_sertifikat"
                                                value="{{ old('tanggal_sertifikat') }}"
                                                class="form-control @error('tanggal_sertifikat') is-invalid @enderror"
                                                autocomplete="off" autofocus>
                                            @error('tanggal_sertifikat')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nomor Sertifikat</label>
                                            <input type="text" name="no_sertifikat" value="{{ old('no_sertifikat') }}"
                                                class="form-control @error('no_sertifikat') is-invalid @enderror"
                                                autocomplete="off" autofocus>
                                            @error('no_sertifikat')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Penggunaan</label>
                                            <input type="text" name="penggunaan" value="{{ old('penggunaan') }}"
                                                class="form-control @error('penggunaan') is-invalid @enderror"
                                                autocomplete="off" autofocus>
                                            @error('penggunaan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Harga</label>
                                            <input type="number" name="harga" value="{{ old('harga') }}"
                                                class="form-control @error('harga') is-invalid @enderror"
                                                autocomplete="off" autofocus>
                                            @error('harga')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Keterangan</label>
                                            <textarea name="keterangan" rows="4" cols="4"
                                                class="form-control @error('keterangan') is-invalid @enderror" placeholder="Masukkan Keterangan...">{{ old('keterangan') }}</textarea>
                                            @error('keterangan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        @if (Session::has('success'))
            toastr.options = {
                "progressBar": true,
                "closeButton": true,
            }
            toastr.error("{{ Session::get('success') }}", 'Gagal!', {
                timeOut: 5000,
            });
        @endif
    </script>
@endpush
