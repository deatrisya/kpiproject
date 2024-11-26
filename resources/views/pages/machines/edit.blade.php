@extends('app')
@section('title', 'Daftar Mesin')
@section('content')
<div class="page-header">
    <h3 class="fw-bold mb-3"> Edit Daftar Mesin</h3>

</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Edit Data Mesin</div>
            </div>
            <div class="card-body">
                <form action="{{ route('machines.update', $machine->id)}}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="machine_code">Kode Mesin</label>
                                <input type="text" class="form-control" name="machine_code"
                                    placeholder="Masukkan Kode Mesin" style="text-transform: uppercase" value="{{ $machine->machine_code }}" required/>
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
                                        <option value="{{ $item->id }}" {{ $item->id == $machine->unit_id ? 'selected' : ''}}>
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
                                <input type="text" class="form-control" name="machine_type" value="{{ $machine->machine_type }}"
                                    placeholder="Masukkan Tipe Mesin" required/>
                            </div>
                            @error('machine_type')
                                <small class="text-danger">{{ message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="location">Lokasi</label>
                                <input type="text" class="form-control" name="location" value="{{ $machine->location }}"
                                    placeholder="Masukkan Lokasi Mesin" required/>
                            </div>
                            @error('location')
                                <small class="text-danger">{{ message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Pilih Status</label>
                                <select class="form-select" name="status" required>
                                    <option value="aktif" {{ $machine->status == 'aktif' ? 'selected' : ""}}>Aktif</option>
                                    <option value="tidak aktif" {{ $machine->status == 'nonaktif' ? 'selected' : ""}}>Tidak Aktif</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <a href="{{ route('machines.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
