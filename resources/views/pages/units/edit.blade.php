@extends('app')
@section('title', 'Daftar Unit Area')
@section('content')
    <div class="page-header">
        <h3 class="fw-bold mb-3">Edit Unit Area</h3>

    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Edit Data Unit Area</div>
                </div>
                <div class="card-body">
                   <form action="{{ route('units.update',$unit->id)}}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="unit_name">Nama Unit</label>
                                <input type="text" class="form-control" name="unit_name"
                                    placeholder="Masukkan Nama Unit Area" required value="{{ $unit->unit_name}}" />
                                    @error('unit_name')
                                        <small class="text-danger">{{ message }}</small>
                                    @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <button type="reset" class="btn btn-danger">Cancel</button>
                        <a href="{{ route('units.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                   </form>
                </div>
            </div>
        </div>
    @endsection
