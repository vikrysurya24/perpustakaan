@extends('layouts.admin')
@section('header', 'Pengarang')

@push('css')
<style type="text/css">

</style>
@endpush

@section('content')
<component id="controller">
    <div class="row">
        <div class="col-md-12">
            <div class="card-header">
                <a href="#" @click="addData()" class="btn btn-sm btn-primary pull-right">Add Pengarang</a>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Nama Pengarang</th>
                            <th>E-Mail</th>
                            <th>Telp.</th>
                            <th>Alamat</th>
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_pengarang as $num => $pengarang)
                        <tr>
                            <td>{{ $num+1 }}.</td>
                            <td>{{ $pengarang->nama_pengarang}}</td>
                            <td>{{ $pengarang->email}}</td>
                            <td>{{ $pengarang->telp}}</td>
                            <td>{{ $pengarang->alamat}}</td>
                            <td class="text-right">
                                <a href="#" @click="editData({{ $pengarang }})" class="btn btn-sm btn-warning">Edit</a>
                                <a href="#" @click="deleteData({{ $pengarang->id }})" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-pengarang">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <form method="POST" :action="actionUrl" autocomplete="off">
                    <div class="modal-header">

                        <h4 class="modal-title" v-if="!editStatus">Add Pengarang</h4>
                        <h4 class="modal-title" v-if="editStatus">Edit Pengarang</h4>

                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="_method" value="PUT" v-if="editStatus">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nama Pengarang</label>
                            <input type="text" class="form-control" placeholder="Nama Pengarang" :value="data.nama_pengarang" name="nama_pengarang" required>
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

@push('js')
<script type="text/javascript">
    var controller = new Vue({
        el: '#controller',
        data: {
            editStatus: false,
            data: {},
            actionUrl: ''
        },
        mounted: function() {

        },
        methods: {
            addData() {
                this.editStatus = false;
                this.actionUrl = '{{url('data/pengarang')}}';
                this.data = {};
                $('#modal-pengarang').modal();
            },
            editData(pengarang) {
                this.editStatus = true;
                this.actionUrl = '{{url('data/pengarang')}}' + '/' + pengarang.id;
                this.data = pengarang;
                $('#modal-pengarang').modal();
            },
            deleteData(id) {
                console.log(id)
                this.actionUrl = '{{url('data/pengarang')}}';
                if (confirm('Apakah Anda Yakin Ingin Mengahapus Data Ini ?')) {
                    axios.post(this.actionUrl + '/' + id, {_method: 'DELETE'}).then(response => {
                        location.reload();
                    });
                }
            }
        }
    });
</script>
@endpush
@endsection