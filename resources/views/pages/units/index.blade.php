@extends('app')
@section('title','Unit Area')
@section('content')
<div class="page-header">
    <h3 class="fw-bold mb-3">Daftar Unit Area</h3>

</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Unit Area</div>
            </div>
            <div class="card-body">
                <a href="{{ route('units.create') }}" class="btn btn-primary mb-4">+ Tambah Unit Area</a>
                <div class="table-responsive">
                    <table class="table table-hover" id="unitData">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Unit</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('main-js')
<script>
    setTable();

    function setTable(params) {
        $('#unitData').DataTable({
            "processing": true,
            "serverSide": true,
            "responsive": true,
            "destroy": true,
            "ajax": {
                "url": base_url + "/unit-data",
                "dataType": "json",
                "type": "post",
                "data": {
                    _token: web_token,
                }
            },
            "columns" : [{
                "data": "DT_RowIndex",
                "name": "id"
            },
            {
                 "data": "unit_name"
            },
            {
                "data": "options"
            }
        ],
        });
    }

</script>
@endsection
