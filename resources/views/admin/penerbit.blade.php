@extends('layouts.admin')
@section('header', 'Penerbit')

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.cs')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.cs')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.cs')}}">
@endpush

@section('content')
<component id="controller">
    <div class="card">
        <div class="card-header">
            <a href="#" @click="addData()" class="btn btn-sm btn-primary pull-right">Add Penerbit</a>
        </div>

        <div class="card-body">
            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Nama Penerbit</th>
                        <th>E-Mail</th>
                        <th>Telp.</th>
                        <th>Alamat</th>
                        <th class="text-right">Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <form method="POST" :action="actionUrl" autocomplete="off" @submit="submitForm($event, data.id)">
                    <div class="modal-header">

                        <h4 class="modal-title" v-if="!editStatus">Add Penerbit</h4>
                        <h4 class="modal-title" v-if="editStatus">Edit Penerbit</h4>

                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="_method" value="PUT" v-if="editStatus">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nama Penerbit</label>
                            <input type="text" class="form-control" placeholder="Nama Penerbit" :value="data.nama_penerbit" name="nama_penerbit" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">E-mail</label>
                            <input type="text" class="form-control" placeholder="E-mail" :value="data.email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Telp</label>
                            <input type="text" class="form-control" placeholder="Telp" :value="data.telp" name="telp" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <textarea class="form-control" placeholder="Alamat" :value="data.alamat" name="alamat" rows="5" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
     </div>
</component>
@endsection

@push('js')
<script type="text/javascript" src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script type="text/javascript">
    var actionUrl = '{{ url('data/penerbit')}}';
    var columns = [ 
        {data: 'nama_penerbit',class: 'text-center', orderable: true},
        {data: 'email',class: 'text-center', orderable: true},
        {data: 'telp',class: 'text-center', orderable: true},
        {data: 'alamat',class: 'text-center', orderable: true},

        {render: function(index, row, data, meta) {
            return ` <a href="#" class="btn btn-sm btn-warning" onclick="controller.editData(event,${meta.row})">Edit</a>
            <a href="#" class="btn btn-sm btn-danger" onclick="controller.deleteData(event, ${data.id})">Delete</a>`;
            },orderable: false, class: 'text-center'
        },
    ];
</script>
<script src="{{ asset('js/data.js') }}"></script>
@endpush