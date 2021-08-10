@extends('layouts.admin')
@section('header', 'Peminjaman')

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.cs')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.cs')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.cs')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
<link rel="stylesheet" type="text/css" href="https://adminlte.io/themes/AdminLTE/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

<style type="text/css">
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: #007bff;
    }
</style>
@endpush

@section('content')
<component id="controller">
    <div class="card">
        <div class="card-header">

            <div class="row">
                <div class="col-md-7">
                    <a href="#" @click="addData()" class="btn btn-sm btn-primary pull-right">Tambah Transaksi</a>
                </div>

                <div class="col-md-2">
                    <select class="form-control" name="status">
                        <option value="0">Filter Status</option>
                        <option value="belum">Belum Dikembalikan</option>
                        <option value="sudah">Sudah Dikembalikan</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <span class="input-group-append">
                        <input type="text" name="tanggal" class="form-control pull-right datepicker mr-1" placeholder="Tanggal Pinjam">
                        <button type="button" class="btn btn-info btn-flat" onclick="resetDate()"><i class="fas fa-redo"></i></button>
                    </span>
                </div>
            </div>
        </div>

        <div class="card-body">
            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Nama Peminjam</th>
                        <th>Lama Pinjam(Hari)</th>
                        <th>Total Buku</th>
                        <th>Total Bayar</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <div class="modal fade" id="modal-default" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="form-horizontal" method="post" :action="actionUrl" autocomplete="off" @submit="submitForm($event, data.id)">

                    <input type="hidden" name="_method" value="PUT" name="" v-if="editStatus">

                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title" v-if="!editStatus">Tambah Data</h4>
                        <h4 class="modal-title" v-if="editStatus">Edit Data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Anggota</label>
                                <div class="col-sm-10">
                                    <select name="id_anggota" id="" class="form-control">
                                        <option value="">-- Pilih Anggota --</option>
                                        @foreach($data['anggota'] as $num => $anggota)
                                        <option :selected="data.id_anggota == {{ $anggota['id'] }} " value="{{ $anggota['id'] }}">{{ $anggota['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Tanggal</label>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <input type="text" class="form-control pull-right datepicker" name="tgl_pinjam" :value="data.tgl_pinjam">
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control pull-right datepicker" name="tgl_kembali" :value="data.tgl_kembali">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Buku</label>
                                <div class="col-sm-10">
                                    <select name="buku[]" class="form-control select2" id="select2-buku" multiple="multiple" data-placeholder="Pilih Buku" style="width: 100%;">
                                        @foreach($data['buku'] as $num => $buku)
                                        <option value="{{ $buku['id'] }}">{{ $buku['judul'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row" v-if="editStatus">
                                <label class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10">
                                    <input type="radio" value="1" name="status" :checked=" data.status == 1 "> Sudah kembali<br>
                                    <input type="radio" value="0" name="status" :checked=" data.status == 0 "> Belum dikembalikan
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-detail">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Detail Peminjaman</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="_method" value="PUT" v-if="editStatus">

                    <div class="form-group">
                        <label class="col-md-5">Nama Anggota</label>@{{ anggota.name }}
                    </div>
                    <div class="form-group">
                        <label class="col-md-5">Tanggal</label>@{{ data.tgl_pinjam }} s.d @{{ data.tgl_kembali }} (@{{ data.lama_pinjam }} Hari)
                    </div>
                    <div class="form-group">
                        <label class="col-md-5">Buku</label>
                        <ul>
                            <li v-for="buku in data.buku">
                                @{{ buku.judul }} (Rp. @{{ formatPrice(buku.harga_pinjam) }},- /hari)
                            </li>
                        </ul>
                    </div>
                    <div class="form-group">
                        <label class="col-md-5">Status</label>@{{ data.status == 0 ? 'Belum Dikembalikan' : 'Sudah Dikembalikan' }}
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</component>
@endsection

@push('js')
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

<script src="https://adminlte.io/themes/AdminLTE/bower_components/moment/min/moment.min.js"></script>
<script src="https://adminlte.io/themes/AdminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="https://adminlte.io/themes/AdminLTE/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<script type="text/javascript">
    $(function() {
        $('.select2').select2();
        $('.datepicker').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd'
        })
    });
    var actionUrl = '{{ url("data/peminjaman") }}';
    var columns = [{
            data: 'tgl_pinjam',
            class: 'text-center',
            orderable: true
        },
        {
            data: 'tgl_kembali',
            class: 'text-center',
            orderable: true
        },
        {
            render: function(index, row, data, meta) {
                return data.anggota.name;
            },
            orderable: false,
            width: '100px',
            class: 'text-center'
        },
        {
            data: 'lama_pinjam',
            class: 'text-center',
            orderable: true
        },
        {
            render: function(index, row, data, meta) {
                return data.buku.length;
            },
            orderable: false,
            width: '100px',
            class: 'text-center'
        },
        {
            data: 'total_bayar',
            class: 'text-center',
            orderable: true
        },
        {
            render: function(index, row, data, meta) {
                return data.status == 0 ? 'Belum dikembalikan' : 'Sudah dikembalikan';
            },
            orderable: false,
            width: '200px',
            class: 'text-center'
        },
        {
            render: function(index, row, data, meta) {
                return `
				<a href="#" class="btn btn-warning btn-sm" onclick="controller.editDataPeminjaman(event, ${meta.row})">
					Edit
				</a>
				<a href="#" class="btn btn-success btn-sm" onclick="controller.detailData(event, ${meta.row})">
					Detail
				</a>
				<a class="btn btn-danger btn-sm" onclick="controller.deleteData(event, ${data.id})">
					Delete
				</a>`;
            },
            orderable: false,
            width: '200px',
            class: 'text-center'
        },
    ];
</script>

<script src="{{ asset('js/data.js') }}"></script>
<script type="text/javascript">
    var status = $('select[name=status]').val();
    var tgl = $('input[name=tanggal]').val();
    $('select[name=status]').on('change', function() {
        status = $(this).val();
        if (status == 0) {
            controller.table.ajax.url(actionUrl + '?tgl=' + tgl).load();
        } else {
            controller.table.ajax.url(actionUrl + '?status=' + status + '&tgl=' + tgl).load();
        }
    });

    $('input[name=tanggal]').on('change', function() {
        tgl = $(this).val();
        controller.table.ajax.url(actionUrl + '?status=' + status + '&tgl=' + tgl).load();
    });

    function resetDate() {
        $('input[name=tanggal]').val('');
        controller.table.ajax.url(actionUrl).load();
    }
</script>
@endpush