@extends('app')
@section('title','Daftar Mesin')
@section('content')
<div class="page-header">
    <h3 class="fw-bold mb-3">Daftar Mesin</h3>

</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Daftar Nama Mesin</div>
            </div>
            <div class="card-body">
                <a href="{{ route('machines.create') }}" class="btn btn-primary mb-4">+ Tambah Mesin</a>
                <div class="table-responsive">
                    <table class="table table-hover" id="machineData">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Unit Area</th>
                                <th>Kode Mesin</th>
                                <th>Tipe Mesin</th>
                                <th>Status</th>
                                <th>Lokasi</th>
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
        $('#machineData').DataTable({
            "processing": true,
            "serverSide": true,
            "responsive": true,
            "destroy": true,
            "ajax": {
                "url": base_url + "/machine-data",
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
                "data": "unit_id",
                "name": "units.unit_name"
            },
            {
                 "data": "machine_code"
            },
            {
                 "data": "machine_type"
            },
            {
                 "data": "status"
            },
            {
                 "data": "location"
            },
            {
                "data": "options"
            }
        ],
        });
    }

</script>
@endsection
