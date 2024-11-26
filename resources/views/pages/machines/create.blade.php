@extends('app')
@section('title', 'Daftar Mesin')
@section('content')
<div class="page-header">
    <h3 class="fw-bold mb-3">Daftar Mesin</h3>

</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Tambah Data Mesin</div>
            </div>
            <div class="card-body">
                <form action="{{ route('machines.store')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="machine_code">Kode Mesin</label>
                                <input type="text" class="form-control" name="machine_code"
                                    placeholder="Masukkan Kode Mesin" style="text-transform: uppercase" required/>
                            </div>
                            @error('machine_code')
                            <small class="text-danger">{{ message }}</small>
                        @enderror
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="unit_id">Nama Unit</label>
                                <select class="form-select form-control" name="unit_id" required>
                                    <option value="">Pilih Unit Area</option>
                                    @foreach ($units as $item)
                                        <option value="{{ $item->id }}" {{ old('unit_id') == $item->id ? 'selected' : ''}}>
                                            {{ $item->unit_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('unit_name')
                                    <small class="text-danger">{{ message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="machine_type">Tipe Mesin</label>
                                <input type="text" class="form-control" name="machine_type"
                                    placeholder="Masukkan Tipe Mesin" value="{{ old('machine_type') }}" required/>
                            </div>
                            @error('machine_type')
                                <small class="text-danger">{{ message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="location">Lokasi</label>
                                <input type="text" class="form-control" name="location"
                                    placeholder="Masukkan Lokasi Mesin" value="{{ old('location') }}" required/>
                            </div>
                            @error('location')
                                <small class="text-danger">{{ message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Pilih Status</label>
                                <select class="form-select" name="status" required>
                                    <option value="aktif">Aktif</option>
                                    <option value="tidak aktif">Tidak Aktif</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <button type="reset" class="btn btn-danger">Cancel</button>
                        <a href="{{ route('machines.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
