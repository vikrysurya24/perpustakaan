@extends('layouts.admin')
@section('header', 'Buku')

@push('css')
@endpush

@section('content')
<component id="controller">
    <div class="row">
        <div class="col-md-12">
            <div class="input-group mb-3">
                <div class="input-group-prepand">
                    <span class="input-group-text"><i class="fas fa-search p-1"></i></span>
                </div>
                <input type="text" v-model="search" class="form-control" autocomplete="off" placeholder="Cari berdasarkan Judul Buku">
            </div>
        </div>

        <div class="col-md-12 mb-3">
            <a href="#" v-on:click="addData()" class="btn btn-sm btn-primary pull-right">Add Buku</a>
        </div>

        <div class="col-md-4 col-sm-6 col-xs-12" v-for="buku in filteredList">
            <div class="info-box" v:on-click="editData(buku)">
                <div class="info-box-content">
                    <span class="info-box-text h5">@{{ buku.judul }} <small style="color: red;">(@{{ buku.qty_stok }})</small></span>
                    <span class="info-box-number">Rp. @{{ formatPrice(buku.harga_pinjam) }},-<small></small></span>
                    <br>
                    <button v-on:click="editData(buku)" type="button" class="btn btn-sm btn-warning font-weight-bold mb-2">Edit</button>
                    <button v-on:click="deleteData(buku.id)" type="button" class="btn btn-sm btn-danger font-weight-bold">Delete</button>
                </div>
            </div>
        </div>
    </div>

     <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" :action="actionUrl" autocomplete="off" @submit="submitForm($event, data.id)">
                    <div class="modal-header">

                        <h4 class="modal-title" v-if="!editStatus">Add Buku</h4>
                        <h4 class="modal-title" v-if="editStatus">Edit Buku</h4>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="_method" value="PUT" v-if="editStatus">
                        @csrf
                        <div class="form-group">
                            <label class="form-label">ISBN</label>
                            <input type="text" class="form-control" placeholder="ISBN" :value="data.isbn" name="isbn" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Judul Buku</label>
                            <input type="text" class="form-control" placeholder="Judul Buku" :value="data.judul" name="judul" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Tahun</label>
                            <input type="text" class="form-control" placeholder="Tahun" :value="data.tahun" name="tahun" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Penerbit</label>
                            <select name="id_penerbit" class="form-control">
                                @foreach($data['penerbit'] as $penerbit)
                                    <option value="{{ $penerbit->id }}" :selected="data.id_penerbit == {{ $penerbit['id'] }}">
                                        {{ $penerbit->nama_penerbit }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Pengarang</label>
                            <select name="id_pengarang" class="form-control">
                                @foreach($data['pengarang'] as $pengarang)
                                    <option value="{{ $pengarang->id }}" :selected="data.id_pengarang == {{ $pengarang['id'] }}">
                                        {{ $pengarang->nama_pengarang }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Katalog</label>
                            <select name="id_katalog" class="form-control">
                                @foreach($data['katalog'] as $katalog)
                                    <option value="{{ $katalog->id }}" :selected="data.id_katalog == {{ $katalog['id'] }}">
                                        {{ $katalog->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Qty Stok</label>
                            <input type="text" class="form-control" placeholder="Qty Stok" :value="data.qty_stok" name="qty_stok" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Harga Pinjam</label>
                            <input type="text" class="form-control" placeholder="Harga Pinjam" :value="data.harga_pinjam" name="harga_pinjam" required>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</component>
@endsection

@push('js')
<script type="text/javascript">
    var reloadUrl = '{{ url('buku') }}';
    var actionUrl = '{{ url('data/buku')}}';
    var app = new Vue({
        el: '#controller',
        data: {
            search: '',
            data_buku: [],
            data: {},
            actionUrl: actionUrl,
            editStatus: false,
        },
        mounted: function() {
            this.databuku();
        },
        methods: {
            databuku() {
                const _this = this;
                $.ajax({
                    url: actionUrl,
                    method: 'GET',
                    success: function(data) {
                        _this.data_buku = JSON.parse(data);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            },
             submitForm(event, id) {
                event.preventDefault();
                const _this = this;
                var actionUrl = ! this.editStatus ? this.actionUrl : this.actionUrl+'/'+id;
                axios.post(actionUrl, new FormData($(event.target)[0])).then(response => {
                    $('#modal-default').modal('hide')
                    location.reload(reloadUrl)
                })
            },
            addData() {
                this.editStatus = false;
                this.data = {};
                $('#modal-default').modal();
            },
            editData(buku) {
                this.data = buku;
                this.editStatus = true;
                $('#modal-default').modal();
            },
            deleteData(id) {
                if (confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ?')) {
                  axios.post(this.actionUrl+'/'+id, {_method: 'DELETE'}).then(response => {
                    alert('Data Berhasil Dihapus')
                    location.reload(reloadUrl)
                  })
                }
            },
            formatPrice(value) {
                let val = (value/1).toFixed(0).replace('.', ',')
                return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
            }, 
        },
        computed: {
            filteredList() {
                return this.data_buku.filter(buku => {
                return buku.judul.toLowerCase().includes(this.search.toLowerCase())
                })
            }
        }
    });
</script>
@endpush