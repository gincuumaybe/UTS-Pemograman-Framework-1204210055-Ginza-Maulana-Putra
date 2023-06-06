@extends('layouts.app')
@section('content')
    <div class="container-sm my-5">
        <form action="{{ route('barangs.update', $barang->id) }}" method="POST">
            @csrf
            @method('put')
            <div class="row justify-content-center">
                <div class="p-5 bg-light rounded-3 border col-xl-6">
                    <div class="mb-3 text-center">
                        <i class="bi bi-pencil-fill fs-1"></i>
                        <h4>Edit Barang</h4>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="Kode_barang" class="form-label">Kode Barang</label>
                            <input class="form-control @error('Kode_barang') is-invalid @enderror" type="text" name="Kode_barang" id="Kode_barang" value="{{$barang -> kodeBarang }}" placeholder="Enter Kode Barang">
                            @error('Kode_barang')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="Nama_barang" class="form-label">Nama Barang</label>
                            <input class="form-control @error('Nama_barang') is-invalid @enderror" type="text" name="Nama_barang" id="Nama_barang" value="{{$barang -> namaBarang }}" placeholder="Enter Nama Barang">
                            @error('Nama_barang')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="Harga_barang" class="form-label">Harga Barang</label>
                            <input class="form-control @error('Harga_barang') is-invalid @enderror" type="text" name="Harga_barang" id="Harga_barang" value="{{ $barang -> hargaBarang }}" placeholder="Enter Harga Barang">
                            @error('Harga_barang')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="Deskripsi_barang" class="form-label">Deskripsi Barang</label>
                            <input class="form-control @error('Deskripsi_barang') is-invalid @enderror" type="text" name="Deskripsi_barang" id="Deskripsi_barang" value="{{ $barang -> deskripsiBarang }}" placeholder="Enter Deskripsi Barang">
                            @error('Deskripsi_barang')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="Satuan_barang" class="form-label">Satuan Barang</label>
                            <select name="satuan_id" id="satuan_id" class="form-select">
                                @php
                                    $selected = "";
                                    if ($errors->any())
                                        $selected = old('satuan_id');
                                    else
                                        $selected = $barang->satuan_id;
                                @endphp
                                @foreach ($satuans as $satuan)
                                <option value="{{ $satuan->id }}" {{ $selected == $satuan->id ? 'selected' : '' }}>{{ $satuan->namaSatuan }}</option>
                                @endforeach
                            </select>
                            @error('Satuan_barang')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>


                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 d-grid">
                            <a href="{{ route('barangs.index') }}" class="btn btn-outline-dark btn-lg mt-3"><i class="bi-arrow-left-circle me-2"></i> Cancel</a>
                        </div>
                        <div class="col-md-6 d-grid">
                            <button type="submit" class="btn btn-dark btn-lg mt-3"><i class="bi-check-circle me-2"></i> Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
